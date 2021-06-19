#!/bin/bash

java -jar -Xms64m -Xmx128m -XX:+HeapDumpOnOutOfMemoryError -XX:HeapDumpPath=/var/log/spoutbreeze-manager /usr/share/spoutbreeze-manager/spoutbreeze-manager.jar
