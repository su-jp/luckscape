FROM php:8.2-apache

# Install dependencies
RUN apt-get update --fix-missing && apt-get install -y \
    software-properties-common \
    git curl unzip libicu-dev \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
