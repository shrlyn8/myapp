FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Run migrations automatically
RUN php artisan migrate --force || true

EXPOSE 8080

CMD php -S 0.0.0.0:$PORT -t public
RUN php artisan config:clear && php artisan cache:clear