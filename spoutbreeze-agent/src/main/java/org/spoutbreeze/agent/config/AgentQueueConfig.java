package org.spoutbreeze.agent.config;

import com.rabbitmq.http.client.Client;
import com.rabbitmq.http.client.ClientParameters;
import org.spoutbreeze.agent.services.AgentQueueListener;
import org.springframework.amqp.core.MessageListener;
import org.springframework.amqp.rabbit.connection.ConnectionFactory;
import org.springframework.amqp.rabbit.listener.SimpleMessageListenerContainer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.core.env.Environment;

import java.util.List;
import java.util.stream.Collectors;

@Configuration
public class AgentQueueConfig extends QueueListenerConfig {

    @Autowired
    private AgentQueueListener agentQueueListener;

    @Autowired
    private Environment environment;

    @Bean
    SimpleMessageListenerContainer container(ConnectionFactory connectionFactory) throws Exception {
        SimpleMessageListenerContainer container = new SimpleMessageListenerContainer();
        container.setConnectionFactory(connectionFactory);
        container.addQueueNames(getQueues().toArray(new String[0]));
        container.setMessageListener(getMessageListener());
        return container;
    }

    @Bean
    public MessageListener getMessageListener() {
        return (message) -> agentQueueListener.receiveMessage(message);
    }

    @Bean
    public List<String> getQueues() throws Exception {
        String url = "http://" + environment.getProperty("spring.rabbitmq.host") + ":" + 15672 + "/api";
        final Client client = new Client(new ClientParameters()
                .url(url)
                .username(environment.getProperty("spring.rabbitmq.username"))
                .password(environment.getProperty("spring.rabbitmq.password"))
        );

        return client.getQueues().stream().map(queueInfo -> queueInfo.getName()).collect(Collectors.toList());
    }
}
