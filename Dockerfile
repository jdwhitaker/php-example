FROM php:8.1-apache
RUN pecl install xdebug-3.1.4 && docker-php-ext-enable xdebug
RUN docker-php-ext-install mysqli
COPY src/ /var/www/html/
COPY ./debug-php.ini /tmp/
RUN cp /tmp/debug-php.ini $PHP_INI_DIR/conf.d/