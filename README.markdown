# SpoutBreeze

SpoutBreeze is an open source webinar platform designed based on BigBlueButton that makes reaching a larger audience
possible.

## Build status


[![Commons Library Build Status](https://jenkins.spoutbreeze.org/buildStatus/icon?job=spoutbreeze-commons&subject=[Java]%20Commons%20Library&status=%20(${displayName})%20-%20master%20-%20${duration})](https://spoutbreeze.org)
[![Manager Build Status](https://jenkins.spoutbreeze.org/buildStatus/icon?job=spoutbreeze-manager&subject=[Java]%20Manager&status=%20(${displayName})%20-%20master%20-%20${duration})](https://spoutbreeze.org)
[![Agent Build Status](https://jenkins.spoutbreeze.org/buildStatus/icon?job=spoutbreeze-agent&subject=[Java]%20Agent&status=%20(${displayName})%20-%20master%20-%20${duration})](https://spoutbreeze.org)
[![Interactor Library Build Status](https://jenkins.spoutbreeze.org/buildStatus/icon?job=spoutbreeze-interactor&subject=[Java]%20Interactor&status=%20(${displayName})%20-%20master%20-%20${duration})](https://spoutbreeze.org)
[![Selenoid Broadcaster](https://jenkins.spoutbreeze.org/buildStatus/icon?job=spoutbreeze-broadcaster&subject=[Docker]%20Selenoid%20Broadcaster&status=%20(${displayName})%20-%20master%20-%20${duration})](https://spoutbreeze.org)

[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=spoutbreeze_spoutbreeze&metric=security_rating)](https://sonarcloud.io/dashboard?id=spoutbreeze_spoutbreeze)


## Social Media

[![Twitter](https://img.shields.io/badge/twitter-@SpoutBreeze-blue.svg?style=flat)](https://twitter.com/spoutbreeze)

[![LinkedIn](https://img.shields.io/badge/linkedin-@SpoutBreeze-blue.svg?style=flat)](https://www.linkedin.com/products/riadvice-spoutbreeze/)

## Getting started

The main goal of the first versio we want to release is to be able to stream a BigBlueButton meeting to some selected media servers. The requirements will expand later.

## Install

SpoutBreeze is a set components divided in 2 groups. A first set of components installable into a BigBlueButton server and a second set installable into another standalone server. The install happens on a Ubuntu 18.04 LTS.

To install the SpoutBreeze server components: 
```bash
wget -qO- https://ubuntu.sputbreeze.org/install.sh | bash -s --
```

To install the BigBlueButton server components: 
```bash
wget -qO- https://ubuntu.sputbreeze.org/install-bbb.sh | bash -s --
```

## Community

All the project community is gathered in Github Discussions https://github.com/spoutbreeze/spoutbreeze/discussions


https://jenkins.spoutbreeze.org/job/spoutbreeze-agent/badge/icon?style=flat-square&subject=spoutbreeze-agent

https://jenkins.spoutbreeze.org/buildStatus/?job=spoutbreeze-commons
