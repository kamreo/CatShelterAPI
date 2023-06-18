# Set the entry point
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

# Copy the application code
COPY . .

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

# Make load-service.sh executable
RUN chmod +x scripts/load-service.sh

# Set the entry point
CMD ./scripts/load-service.sh db:3306 -- php artisan migrate && php artisan serve --host=0.0.0.0 --port=8000
