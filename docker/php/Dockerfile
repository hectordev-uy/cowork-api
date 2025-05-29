FROM php:8.3-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    zip \
    curl \
    git \
    nano \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear y establecer directorio de trabajo
WORKDIR /var/www

# Copiar los archivos del proyecto (Laravel debe estar ya instalado en la raíz del proyecto)
COPY . .

# Establecer permisos para Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Exponer puerto (opcional, PHP-FPM usa 9000 internamente)
EXPOSE 9000

# Comando por defecto
CMD ["php-fpm"]
