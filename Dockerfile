FROM php:8.2-apache

# Install dependencies
RUN apt-get update --fix-missing && apt-get install -y \
    software-properties-common \
    git curl unzip libicu-dev \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy project files into container
COPY . /var/www/html

# Set proper permissions for writable directory
RUN chown -R www-data:www-data /var/www/html/writable
RUN chmod -R 755 /var/www/html/writable

# Enable Apache mod_rewrite
RUN a2enmod rewrite