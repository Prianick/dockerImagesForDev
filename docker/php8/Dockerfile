FROM php:8.2-fpm

WORKDIR /app/www/html

RUN apt update && apt install -y iputils-ping procps nano
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -i 's/^;error_log = php_errors.log/error_log = php_errors.log/' $PHP_INI_DIR/php.ini
