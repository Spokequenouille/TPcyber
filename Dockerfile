FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
RUN mkdir /var/www/html/uploads/
RUN chmod -R 777 /var/www/html/uploads