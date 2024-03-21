# Dockerfile para el servicio Web con PHP
FROM php:7.4-apache
WORKDIR /var/www/html

# Copia los archivos de la web al contenedor
COPY ./php /var/www/html/

# Instala las extensiones de PHP necesarias
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Habilita el módulo de Apache rewrite
RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]
