FROM php:8.2-fpm

# Pasang dependensi sistem & ekstensi PHP modern yang dibutuhkan Laravel 10
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Pasang ekstensi PHP (Laravel 10 butuh pdo_mysql, mbstring, exif, pcntl)
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Pasang Composer versi terbaru (v2)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Tentukan direktori kerja
WORKDIR /var/www

# Salin source code
COPY . /var/www

# Atur hak akses permission untuk storage dan bootstrap/cache khas Laravel modern
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
