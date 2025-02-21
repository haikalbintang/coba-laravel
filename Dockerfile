FROM php:8.2-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    unzip \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql mbstring opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files
COPY composer.json composer.lock ./

# Install dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Copy the application
COPY . .

# Generate application key
RUN php artisan key:generate

# Run database migrations
RUN php artisan migrate --force

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]