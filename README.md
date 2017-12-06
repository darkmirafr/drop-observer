[![Build Status](https://travis-ci.org/Darkmira/drop-observer.svg?branch=develop)](https://travis-ci.org/Darkmira/drop-observer)
  
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/46356d02-f97a-4f9c-80d2-634380693915/big.png)](https://insight.sensiolabs.com/projects/46356d02-f97a-4f9c-80d2-634380693915)
# DROP obServer 
DROP obServer project is part of the DROP project.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

- PHP 7.1.4 or newer

### Installing

**1.** Build app

```
composer install
```

**2.** Update your SQLite database

```
php bin/console doctrine:schema:update --force
```

**3.** Launch app

```
php bin/console server:start
```

## Deployment

TODO
