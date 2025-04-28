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

# Apache DocumentRoot 변경
ENV APACHE_DOCUMENT_ROOT=/var/www/html/luckscape/public

RUN sed -i 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files into container
COPY . /var/www/html

# Set proper permissions for writable directory
RUN chown -R www-data:www-data /var/www/html/luckscape/writable
RUN chmod -R 755 /var/www/html/luckscape/writable