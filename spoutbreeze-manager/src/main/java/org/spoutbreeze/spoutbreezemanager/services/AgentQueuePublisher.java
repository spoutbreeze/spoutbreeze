package org.spoutbreeze.spoutbreezemanager.services;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.spoutbreezemanager.models.BroadcastMessage;
import org.springframework.amqp.core.AmqpAdmin;
import org.springframework.amqp.core.AmqpTemplate;
import org.springframework.amqp.core.Binding;
import org.springframework.amqp.core.Queue;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class AgentQueuePublisher {

    private static final Logger logger = LoggerFactory.getLogger(AgentQueuePublisher.class);

    @Autowired
    private AmqpAdmin amqpAdmin;

    @Autowired
    private AmqpTemplate amqpTemplate;

    /**
     * publishes the message to the agents queue.
     * @param broadcastMessage the message to be published.
     */
    public void publishMessage(final BroadcastMessage broadcastMessage, final Agent agent) {
        final String queueName = getQueueName(agent);
        createQueue(queueName);

        //send the message
        amqpTemplate.convertAndSend(queueName, broadcastMessage);
    }

    /**
     * the queue name follows the convention of "queue-agent_name-agent-id"
     * @param agent the agent
     * @return the queue name
     */
    private String getQueueName(final Agent agent) {
        if (agent == null) {
            logger.error("the agent provided to publish message is null", agent);
        }
        final String queueName = "queue-" + agent.name + "-" + agent.id;
        return queueName;
    }


    private void createQueue(String queueName) {
        Queue queue = new Queue(queueName, false, false, false);
        Binding binding = new Binding(queueName, Binding.DestinationType.QUEUE, null, queueName, null);
        amqpAdmin.declareQueue(queue);
        amqpAdmin.declareBinding(binding);
    }

}
