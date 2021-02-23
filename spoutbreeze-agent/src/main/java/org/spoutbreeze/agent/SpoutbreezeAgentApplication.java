package org.spoutbreeze.agent;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.agent.video.VideoBroadcaster;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ConfigurableApplicationContext;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.scheduling.annotation.EnableScheduling;

@SpringBootApplication
@EnableScheduling
@ComponentScan("module-service")
public class SpoutbreezeAgentApplication {

    @Autowired
    @Qualifier("videoBroadcaster")
    private static VideoBroadcaster videoBroadcaster;

    private static final Logger logger = LoggerFactory.getLogger(SpoutbreezeAgentApplication.class);

    public static void main(String[] args) {
        ConfigurableApplicationContext ctx = SpringApplication.run(SpoutbreezeAgentApplication.class, args);

        logger.info("SpoutBreeze Agent Java Application Started");

        videoBroadcaster = new VideoBroadcaster();

        videoBroadcaster.broacast();
    }
}
