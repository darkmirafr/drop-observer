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
docker-compose exec --user=application web composer install
```

**4.** Done

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
