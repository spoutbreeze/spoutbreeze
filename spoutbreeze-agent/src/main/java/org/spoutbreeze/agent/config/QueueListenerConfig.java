package org.spoutbreeze.agent.config;

import org.spoutbreeze.agent.services.AgentQueueMessageListener;
import org.springframework.amqp.core.AmqpAdmin;
import org.springframework.amqp.core.DirectExchange;
import org.springframework.amqp.rabbit.connection.ConnectionFactory;
import org.springframework.amqp.rabbit.core.RabbitAdmin;
import org.springframework.amqp.rabbit.listener.adapter.MessageListenerAdapter;
import org.springframework.amqp.support.converter.Jackson2JsonMessageConverter;
import org.springframework.amqp.support.converter.MessageConverter;
import org.springframework.context.annotation.Bean;

public class QueueListenerConfig {
    static final String directExchangeName = "spoutbreeze";

    @Bean
    DirectExchange exchange() {
        return new DirectExchange(directExchangeName, true, false);
    }

    @Bean
    MessageListenerAdapter listenerAdapter(AgentQueueMessageListener receiver) {
        return new MessageListenerAdapter(receiver, "receiveMessage");
    }

    @Bean
    public MessageConverter jsonMessageConverter() {
        return new Jackson2JsonMessageConverter();
    }

    @Bean
    public AmqpAdmin getAmqpAdmin(ConnectionFactory connectionFactory) {
        return new RabbitAdmin(connectionFactory);
    }
}
