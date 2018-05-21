[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4caef27a-276c-4cbf-99a8-6176f51e819a/big.png)](https://insight.sensiolabs.com/projects/4caef27a-276c-4cbf-99a8-6176f51e819a)

`Travis CI`
[![Build Status](https://travis-ci.org/Darkmira/drop-observer.svg?branch=develop)](https://travis-ci.org/Darkmira/drop-observer)

`Codacy`
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/3ce7e103844f4d59b7467946f8c83f9b)](https://www.codacy.com/app/cvilleger/drop-observer?utm_source=github.com&utm_medium=referral&utm_content=Darkmira/drop-observer&utm_campaign=Badge_Coverage)

`Scrutinizer`
[![Build Status](https://scrutinizer-ci.com/g/Darkmira/drop-observer/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/Darkmira/drop-observer/build-status/develop)
[![Code Coverage](https://scrutinizer-ci.com/g/Darkmira/drop-observer/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/Darkmira/drop-observer/?branch=develop)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Darkmira/drop-observer/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Darkmira/drop-observer/?branch=develop)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Darkmira/drop-observer/badges/code-intelligence.svg?b=develop)](https://scrutinizer-ci.com/code-intelligence)

`Docker`
[![](https://images.microbadger.com/badges/image/cvilleger/drop-observer.svg)](https://microbadger.com/images/cvilleger/drop-observer)

`Codefresh`
[![Codefresh build status]( https://g.codefresh.io/api/badges/build?repoOwner=Darkmira&repoName=drop-observer&branch=develop&pipelineName=drop-observer&accountName=cvilleger&type=cf-2)]( https://g.codefresh.io/repositories/Darkmira/drop-observer/builds?filter=trigger:build;branch:develop;service:5ae7046a1042630001422a1b~drop-observer)

`Heroku`
[![Heroku](https://heroku-badge.herokuapp.com/?app=drop-observer&style=flat&svg=1)](https://drop-observer.herokuapp.com/)

`Semaphore`
[![Build Status](https://semaphoreci.com/api/v1/cvilleger/drop-observer/branches/develop/badge.svg)](https://semaphoreci.com/cvilleger/drop-observer)

[![Generic badge](https://img.shields.io/badge/Powered%20by-Love-red.svg)](https://www.darkmira.fr/)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/Darkmira/drop-observer/pulse/monthly)

# DROP obServer 
DROP obServer project is part of the DROP project.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

- [Docker CE](https://www.docker.com/community-edition)

### Install

**1.** Copy `.env.dist` to `.env`

```
cp .env.dist .env
```

**2.** Copy `docker-compose.override.yml.dist` to `docker-compose.override.yml`

```
cp docker-compose.override.yml.dist docker-compose.override.yml
```

**3.** Builds, (re)creates and starts containers in the background

```
docker-compose up -d
```

**4.** Install dependencies

```
docker-compose exec --user=application web composer install
```

**5.** Drop, create and update your database

```
docker-compose exec web php bin/console doctrine:database:drop --force
docker-compose exec web php bin/console doctrine:database:create
docker-compose exec web php bin/console doctrine:schema:update --force
```

**6.** Done

Web
```
http://localhost
```

phpMyAdmin
```
http://localhost:8080
```

## Deployment

### Prerequisites

What things you need to install the software and how to install them

- [PHP 7.1](http://php.net/downloads.php)
- [MariaDB 10.2](https://mariadb.org/download/)

### Install

// TODO

### Update

// TODO
