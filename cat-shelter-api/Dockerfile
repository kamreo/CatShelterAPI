# Use the official PHP 8.2 image as the base image
FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application code
COPY . .

# Generate the autoload files and complete Composer setup
RUN composer dump-autoload --no-scripts --optimize
RUN composer install --no-scripts

# Set the entry point
CMD php artisan serve --host=0.0.0.0 --port=8000
