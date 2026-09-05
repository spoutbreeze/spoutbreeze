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

import org.junit.jupiter.api.Test;
import org.spoutbreeze.interactor.chat.TwitchIrcClient;

import java.util.Optional;

import static org.assertj.core.api.Assertions.assertThat;

class TwitchIrcClientParseTest {
    @Test
    void parsesPrivmsgWithTagsAndDisplayName() {
        Optional<TwitchIrcClient.ChatMessage> message = TwitchIrcClient.parsePrivmsg(
                "@badge-info=;badges=broadcaster/1;color=#0000FF;display-name=Ghazi;emotes=;mod=1"
                        + " :ghazitriki!ghazitriki@ghazitriki.tmi.twitch.tv PRIVMSG #ghazitriki :Hello from chat");

        assertThat(message).isPresent();
        assertThat(message.get().user()).isEqualTo("Ghazi");
        assertThat(message.get().text()).isEqualTo("Hello from chat");
    }

    @Test
    void parsesPrivmsgWithoutTags() {
        Optional<TwitchIrcClient.ChatMessage> message = TwitchIrcClient.parsePrivmsg(
                ":viewer123!viewer123@viewer123.tmi.twitch.tv PRIVMSG #channel :plain hello");

        assertThat(message).isPresent();
        assertThat(message.get().user()).isEqualTo("viewer123");
        assertThat(message.get().text()).isEqualTo("plain hello");
    }

    @Test
    void ignoresNonPrivmsgLines() {
        assertThat(TwitchIrcClient.parsePrivmsg(":tmi.twitch.tv JOIN #channel")).isEmpty();
        assertThat(TwitchIrcClient.parsePrivmsg("@ban-duration=1 :tmi.twitch.tv CLEARCHAT #channel")).isEmpty();
        assertThat(TwitchIrcClient.parsePrivmsg(null)).isEmpty();
        assertThat(TwitchIrcClient.parsePrivmsg("@tags-only")).isEmpty();
    }

    @Test
    void detectsPing() {
        assertThat(TwitchIrcClient.isPing("PING :tmi.twitch.tv")).isTrue();
        assertThat(TwitchIrcClient.isPing(":nick!user@host PRIVMSG #c :PING")).isFalse();
    }
}
