# SpoutBreeze open source platform - https://www.spoutbreeze.org/
#
# Copyright (c) 2021-2026 RIADVICE SUARL.
#
# This program is free software: you can redistribute it and/or modify it under the
# terms of the GNU Affero General Public License as published by the Free Software
# Foundation, either version 3 of the License, or (at your option) any later version.
#
# SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
# WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
# PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License along
# with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.

FROM gradle:9.7.1-jdk25 AS build
WORKDIR /src

COPY settings.gradle.kts .
COPY spoutbreeze-commons spoutbreeze-commons
COPY spoutbreeze-manager spoutbreeze-manager
COPY spoutbreeze-agent spoutbreeze-agent
COPY spoutbreeze-interactor spoutbreeze-interactor

RUN --mount=type=cache,target=/home/gradle/.gradle \
    gradle --no-daemon :spoutbreeze-manager:shadowJar :spoutbreeze-agent:shadowJar :spoutbreeze-interactor:shadowJar -x test

FROM eclipse-temurin:25-jre-noble AS manager
WORKDIR /app
COPY --from=build /src/spoutbreeze-manager/build/libs/*-all.jar app.jar
EXPOSE 21020
ENTRYPOINT ["java", "-jar", "app.jar"]

FROM eclipse-temurin:25-jre-noble AS agent
WORKDIR /app
COPY --from=build /src/spoutbreeze-agent/build/libs/*-all.jar app.jar
EXPOSE 21030
ENTRYPOINT ["java", "-jar", "app.jar"]

FROM eclipse-temurin:25-jre-noble AS interactor
WORKDIR /app
COPY --from=build /src/spoutbreeze-interactor/build/libs/*-all.jar app.jar
EXPOSE 8081
ENTRYPOINT ["java", "-jar", "app.jar"]
