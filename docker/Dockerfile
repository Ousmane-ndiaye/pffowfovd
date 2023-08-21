# Utilisez l'image officielle PHP 7.1
FROM php:7.1-apache

# Installe les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installer Composer
RUN apt-get update && apt-get install -y wget \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Copie du code source de Symfony dans le conteneur
COPY . .

# Démarrer le serveur Symfony
CMD ["php", "bin/console", "server:run", "0.0.0.0:8000"]