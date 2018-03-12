release: php bin/console doctrine:schema:update --force
web: $(composer config bin-dir)/heroku-php-nginx -C nginx.conf public/
