package org.spoutbreeze.agent.services;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.amqp.core.Message;
import org.springframework.stereotype.Component;

@Component
public class AgentQueueListener implements AgentQueueMessageListener {

    static final Logger LOGGER = LoggerFactory.getLogger(AgentQueueListener.class);

    public void receiveMessage(Message message) {
        if (message != null)
            LOGGER.info("the message obtained on " + "is " + message);
    }

}
