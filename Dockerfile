FROM php:8.2-fpm
WORKDIR /var/www

# Trocar para usuário root antes de instalar pacotes
USER root
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql gd mbstring

# Retornar ao usuário padrão do contêiner
USER www-data
