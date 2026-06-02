FROM php:8.3-fpm
RUN apt-get update && apt-get install -y git unzip libzip-dev libpng-dev libonig-dev libxml2-dev zip zlib1g-dev
RUN docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www/html
COPY . /var/www/html
RUN composer install --prefer-dist --no-dev --optimize-autoloader
CMD php artisan serve --host=0.0.0.0 --port=8000
