# LARAVEL
# https://bitpress.io/simple-approach-using-docker-with-php/
FROM php:apache

MAINTAINER David Silva

RUN apt-get update && apt-get upgrade -y

RUN apt-get install git zip unzip -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php');" \
  && mv composer.phar /usr/local/bin/composer

WORKDIR /backend

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /backend \
  && a2enmod rewrite \
  && mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# PHP needed extensions
RUN sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/g' /usr/local/etc/php/php.ini
