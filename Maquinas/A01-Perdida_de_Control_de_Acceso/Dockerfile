FROM wordpress:latest

# Instalación de herramientas necesarias
RUN apt-get update && \
    apt-get install -y mariadb-client \
    curl \
    unzip

# Establece las variables de entorno para configurar la base de datos
ENV WORDPRESS_DB_HOST=localhost
ENV WORDPRESS_DB_NAME=wordpress
ENV WORDPRESS_DB_USER=wordpress
ENV WORDPRESS_DB_PASSWORD=wpassword

# Copia el archivo de dump de la base de datos guardado en ASSets a la imagen
COPY ./Assets/db-data/wordpress.sql /tmp/wordpress.sql

# Copia los datos del wordpress a la imagen
COPY ./Assets/wordpress/wordpress.zip /tmp/

# Descomprime el zip
RUN unzip /tmp/wordpress.zip -d /var/www/html/

# Restaurar el dump a la BBDD
RUN wp db import /tmp/wordpress.sql --path=/var/www/html --allow-root

# Exponemos los puertos para el wordpress
EXPOSE 80

# Limpiamos el sistema una vez terminados.
RUN rm -rf /tmp/wordpress.zip
RUN rm -rf /tmp/wordpress.sql