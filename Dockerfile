FROM php:8.4-apache

WORKDIR /var/www/html

COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
