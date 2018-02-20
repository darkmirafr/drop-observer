[![SensioLabsInsight](https://insight.sensiolabs.com/projects/46356d02-f97a-4f9c-80d2-634380693915/big.png)](https://insight.sensiolabs.com/projects/46356d02-f97a-4f9c-80d2-634380693915)
  
[![Build Status](https://travis-ci.org/Darkmira/drop-observer.svg?branch=develop)](https://travis-ci.org/Darkmira/drop-observer)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/3ce7e103844f4d59b7467946f8c83f9b)](https://www.codacy.com/app/cvilleger/drop-observer?utm_source=github.com&utm_medium=referral&utm_content=Darkmira/drop-observer&utm_campaign=Badge_Coverage)
[![Dependency Status](https://beta.gemnasium.com/badges/github.com/Darkmira/drop-observer.svg)](https://beta.gemnasium.com/projects/github.com/Darkmira/drop-observer)
![Heroku](https://heroku-badge.herokuapp.com/?app=drop-observer&style=flat&svg=1)
  
![Generic badge](https://img.shields.io/badge/Powered%20by-Love-red.svg)
![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)

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
