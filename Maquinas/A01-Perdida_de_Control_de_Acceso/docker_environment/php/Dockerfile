# Dockerfile para el servicio Web con PHP
FROM php:7.4-apache

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql wp-cli

# Habilita el módulo de Apache rewrite
RUN a2enmod rewrite

# Copia los archivos de la web al contenedor
COPY ./php /var/www/html/

EXPOSE 80

CMD ["apache2-foreground"]
