/*
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021-2026 RIADVICE SUARL.
 *
 * This program is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Affero General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License along
 * with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
 */
package org.spoutbreeze.interactor.chat;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.Writer;
import java.net.Socket;
import java.nio.charset.StandardCharsets;
import java.util.Optional;
import java.util.function.Consumer;
import javax.net.ssl.SSLSocketFactory;

/**
 * Twitch chat over IRC/TLS (irc.chat.twitch.tv:6697). Twitch requires an
 * OAuth chat token even for reading; the operator supplies one with the
 * chat:read scope. Parsing is factored out for unit testing.
 */
public class TwitchIrcClient {
    public record ChatMessage(String user, String text) {}

    static final String HOST = "irc.chat.twitch.tv";
    static final int PORT = 6697;

    private final String token;
    private final String nick;
    private final String channel;
    private final Consumer<ChatMessage> listener;

    private Socket socket;
    private BufferedReader in;
    private Writer out;
    private volatile boolean running;

    public TwitchIrcClient(String token, String nick, String channel, Consumer<ChatMessage> listener) {
        this.token = token;
        this.nick = nick;
        this.channel = channel;
        this.listener = listener;
    }

    public void connect() throws IOException {
        socket = SSLSocketFactory.getDefault().createSocket(HOST, PORT);
        in = new BufferedReader(new InputStreamReader(socket.getInputStream(), StandardCharsets.UTF_8));
        out = new OutputStreamWriter(socket.getOutputStream(), StandardCharsets.UTF_8);
        send("CAP REQ :twitch.tv/tags twitch.tv/commands");
        send("PASS oauth:" + token);
        send("NICK " + nick.toLowerCase());
        send("JOIN #" + channel.toLowerCase());
    }

    /** Blocks reading one line at a time until the connection drops. */
    public void runLoop() throws IOException {
        running = true;
        while (running) {
            String line = in.readLine();
            if (line == null) {
                return;
            }
            if (isPing(line)) {
                send("PONG :tmi.twitch.tv");
                continue;
            }
            parsePrivmsg(line).ifPresent(listener);
        }
    }

    public void close() {
        running = false;
        try {
            if (socket != null) {
                socket.close();
            }
        } catch (IOException ignored) {
            // closing a dead socket is fine
        }
    }

    private void send(String command) throws IOException {
        out.write(command + "\r\n");
        out.flush();
    }

    static boolean isPing(String line) {
        return line.startsWith("PING");
    }

    /**
     * Extracts the sender and text from a PRIVMSG line, tolerating the IRCv3
     * tag block ("@display-name=… :nick!user@host PRIVMSG #chan :text").
     */
    static Optional<ChatMessage> parsePrivmsg(String line) {
        if (line == null) {
            return Optional.empty();
        }
        String rest = line;
        String displayName = null;
        if (rest.startsWith("@")) {
            int space = rest.indexOf(' ');
            if (space < 0) {
                return Optional.empty();
            }
            String tags = rest.substring(1, space);
            rest = rest.substring(space + 1);
            displayName = extractDisplayName(tags);
        }
        int privmsg = rest.indexOf(" PRIVMSG ");
        if (privmsg < 1) {
            return Optional.empty();
        }
        String prefix = rest.substring(1, privmsg);
        String tail = rest.substring(privmsg + " PRIVMSG ".length());
        int colon = tail.indexOf(':');
        if (colon < 0) {
            return Optional.empty();
        }
        String text = tail.substring(colon + 1);
        String user = displayName != null && !displayName.isBlank()
                ? displayName
                : prefix.split("!")[0];
        return Optional.of(new ChatMessage(user, text));
    }

    private static String extractDisplayName(String tags) {
        for (String tag : tags.split(";")) {
            if (tag.startsWith("display-name=")) {
                return tag.substring("display-name=".length());
            }
        }
        return null;
    }
}
