[![Build Status](https://travis-ci.org/Darkmira/drop-observer.svg?branch=develop)](https://travis-ci.org/Darkmira/drop-observer)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/3ce7e103844f4d59b7467946f8c83f9b)](https://www.codacy.com/app/cvilleger/drop-observer?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Darkmira/drop-observer&amp;utm_campaign=Badge_Grade)
[![BCH compliance](https://bettercodehub.com/edge/badge/Darkmira/drop-observer?branch=develop)](https://bettercodehub.com/)
[![Dependency Status](https://beta.gemnasium.com/badges/github.com/Darkmira/drop-observer.svg)](https://beta.gemnasium.com/projects/github.com/Darkmira/drop-observer)
  
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/46356d02-f97a-4f9c-80d2-634380693915/big.png)](https://insight.sensiolabs.com/projects/46356d02-f97a-4f9c-80d2-634380693915)

# DROP obServer 
DROP obServer project is part of the DROP project.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

- [Docker CE](https://www.docker.com/community-edition)

### Install

**1.** Copy .env.dist to .env

```
cp .env.dist .env
```

**2.** Builds, (re)creates and starts containers in the background

```
docker-compose up -d
```

**3.** Install dependencies

```
docker-compose exec web composer install
```

**4.** Update your SQLite database

```
docker-compose exec web php bin/console doctrine:schema:update --force
```

**5.** Done

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
