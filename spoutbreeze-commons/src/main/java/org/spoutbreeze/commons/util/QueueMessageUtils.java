package org.spoutbreeze.commons.util;

import com.fasterxml.jackson.databind.ObjectMapper;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.springframework.lang.Nullable;

import java.io.IOException;

public class QueueMessageUtils {

    /**
     * marshalls the byte[] message
     * @param message the message
     * @return the marshalled object
     */
    @Nullable
    public static BroadcastMessage getBroadcastMessage(final byte[] message) {
        final ObjectMapper objectMapper = new ObjectMapper();

        try {
            final BroadcastMessage broadcastMessage = objectMapper.readValue(message, BroadcastMessage.class);
            return broadcastMessage;
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

}
