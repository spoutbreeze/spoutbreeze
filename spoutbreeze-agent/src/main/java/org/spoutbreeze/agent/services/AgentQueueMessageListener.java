package org.spoutbreeze.agent.services;

import org.springframework.amqp.core.Message;

public interface AgentQueueMessageListener {

    void receiveMessage(Message message);

}
