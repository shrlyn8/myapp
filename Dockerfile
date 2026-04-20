FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project FIRST
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# 🔥 CRITICAL FIX
RUN rm -f bootstrap/cache/config.php
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

# Start server
CMD php -S 0.0.0.0:$PORT -t public