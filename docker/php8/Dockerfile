FROM php:8.2-fpm

WORKDIR /app/www/html

RUN apt update && apt install -y iputils-ping procps nano libpq-dev
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-enable pdo_pgsql \
    && docker-php-ext-install pgsql \
    && docker-php-ext-enable pgsql

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -i 's/^;error_log = php_errors.log/error_log = \/var\/log\/php\/php-error.log/' $PHP_INI_DIR/php.ini
