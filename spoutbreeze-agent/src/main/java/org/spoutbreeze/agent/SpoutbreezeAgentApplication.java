/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

package org.spoutbreeze.agent;

import java.net.MalformedURLException;
import java.net.SocketException;
import java.net.UnknownHostException;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.agent.video.BroadcastFinder;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.ExitCodeGenerator;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.domain.EntityScan;
import org.springframework.context.ConfigurableApplicationContext;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.data.jpa.repository.config.EnableJpaRepositories;
import org.springframework.scheduling.annotation.EnableScheduling;

@SpringBootApplication
@EnableScheduling
@EntityScan("org.spoutbreeze.commons.*")
@EnableJpaRepositories(basePackages = {"org.spoutbreeze.commons.*"})
public class SpoutbreezeAgentApplication {

    private static final Logger logger = LoggerFactory.getLogger(SpoutbreezeAgentApplication.class);

    @Autowired
    @Qualifier("broadcastFinder")
    private static BroadcastFinder broadcastFinder;

    public static void main(String[] args)
            throws MalformedURLException, InterruptedException, UnknownHostException, SocketException {
        ConfigurableApplicationContext ctx = SpringApplication.run(SpoutbreezeAgentApplication.class, args);
        logger.info("SpoutBreeze Agent Java Application Started");

        Runtime.getRuntime().addShutdownHook(new Thread() {
            public void run() {
                logger.info(
                        "Received a instruction to shutdown the application. A graceful shutdown is going to be attempted.");
                while (broadcastFinder.isBroadcasting()) {
                    try {
                        Thread.sleep(5000);
                    } catch (InterruptedException e) {
                        logger.error("Cannot put exit thread on sleep", e);
                    }
                }
                int exitCode = SpringApplication.exit(ctx, new ExitCodeGenerator() {
                    @Override
                    public int getExitCode() {
                        logger.info("Shutting down the server application.");
                        // no errors
                        return 0;
                    }
                });

                System.exit(exitCode);
            }
        });
    }
}
