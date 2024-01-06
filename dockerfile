# Use official base image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install required software (e.g., curl)
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get install -y libpq-dev libzip-dev \
    && docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#COPY . /var/www/html
#RUN composer dump-autoload
#Após inicializar o container rodar o comando composer dump-load no terminal do container

# Change permissions
RUN chown -R www-data:www-data /var/www/html

# Set user
USER www-data

# Expose ports
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]