package org.spoutbreeze.agent.services;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.agent.video.VideoBroadcaster;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.repository.AgentRepository;
import org.spoutbreeze.commons.repository.BroadcastRepository;
import org.spoutbreeze.commons.util.QueueMessageUtils;
import org.springframework.amqp.core.Message;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class AgentQueueListener implements AgentQueueMessageListener {

    static final Logger LOGGER = LoggerFactory.getLogger(AgentQueueListener.class);

    @Autowired
    private BroadcastRepository broadcastRepository;

    @Autowired
    private AgentRepository agentRepository;

    @Autowired
    private VideoBroadcaster videoBroadcaster;

    /**
     * receives the message from the queue
     * @param message the message
     */
    public void receiveMessage(Message message) {
        if (message == null) {
            return;
        }

        LOGGER.info("the message obtained on " + "is " + message);

        final BroadcastMessage broadcastMessage = QueueMessageUtils.getBroadcastMessage(message.getBody());

        startABroadcastSession(broadcastMessage);

        updateAgentInBroadcastTable(broadcastMessage);

        updateBroadcastStatus(broadcastMessage);

    }


    /**
     * updates the agent in the broadcast table
     * @param broadcastMessage the message
     */
    public void updateAgentInBroadcastTable(final BroadcastMessage broadcastMessage) {
        final String agentId = broadcastMessage.getAgentId();
        final Long broadCastId = broadcastMessage.getId();

        final Broadcast broadcast = broadcastRepository
                .findById(broadCastId)
                .orElseThrow(() -> new RuntimeException("No broadcast found for the id : " + broadCastId));

        broadcast.agent = agentRepository
                .findById(Long.parseLong(agentId))
                .orElseThrow(() -> new RuntimeException("no agent with id " + agentId));

        broadcastRepository.save(broadcast);
    }

    /**
     * starts the selenoid session and saves the sessionId
     * @param broadcastMessage the message
     */
    public void startABroadcastSession(final BroadcastMessage broadcastMessage) {
        final String sessionId = videoBroadcaster.broacast();

        final Broadcast broadcast = broadcastRepository
                .findById(broadcastMessage.getId())
                .orElseThrow(() -> new RuntimeException("No broadcast found for the id : " + broadcastMessage.getId()));

        broadcast.selenoid_id = sessionId;

        broadcastRepository.save(broadcast);
    }

    /**
     * update the broadcast status
     * @param broadcastMessage the broadcast message
     */
    public void updateBroadcastStatus(final BroadcastMessage broadcastMessage) {
        final Broadcast broadcast =
                broadcastRepository.findById(broadcastMessage.getId())
                        .orElseThrow(() -> new RuntimeException("no broadcast with id " + broadcastMessage.getId()));

        broadcast.status = BroadcastStatus.LIVE;

        broadcastRepository.save(broadcast);
    }
}
