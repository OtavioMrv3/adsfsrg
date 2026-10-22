FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

ENV PORT=10000

RUN sed -i 's/80/${PORT}/' /etc/apache2/ports.conf \
    && sed -i 's/:80>/:${PORT}>/' /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html/

EXPOSE 10000
