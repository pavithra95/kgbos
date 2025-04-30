# Use official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev npm \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel app files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy existing application environment variables
COPY .env.example .env

# Generate Laravel application key
RUN php artisan key:generate

# Install Node dependencies and build assets


# Set correct permissions
RUN chown -R www-data:www-data /var/www

# Expose port for Laravel dev server
EXPOSE 8000

# Start Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8000
