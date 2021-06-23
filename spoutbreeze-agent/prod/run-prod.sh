#!/bin/bash

java -jar -Xms64m -Xmx128m -XX:+HeapDumpOnOutOfMemoryError -XX:HeapDumpPath=/var/log/spoutbreeze-agent /usr/share/spoutbreeze-agent/spoutbreeze-agent.jar
