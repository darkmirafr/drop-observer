FROM webdevops/php-nginx:7.2

WORKDIR /app

# Needed to fetch development branches
ADD . /app

ENV WEB_DOCUMENT_ROOT=/app/public
ENV WEB_DOCUMENT_INDEX=index.php
ENV PHP_DATE_TIMEZONE="Europe/Paris"
ENV PHP_MAX_EXECUTION_TIME=60
ENV PHP_DISPLAY_ERRORS=0
ENV APP_ENV=prod

RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-progress

RUN rm -rf var/cache/*
RUN chown -R application. var/
