FROM ubuntu:latest

# Copia el archivo de dump de la base de datos guardado en ASSets a la imagen
COPY ./Assets/ddbb/wordpress.sql /tmp/wordpress.sql

# Copia los datos del wordpress a la imagen
COPY ./Assets/wordpress/wordpress.zip /tmp/

# Descomprime el zip
RUN unzip /tmp/wordpress.zip -d /var/www/html/

# Restaurar el dump a la BBDD
RUN wp db import /tmp/wordpress.sql --path=/var/www/html --allow-root

# Limpiamos el sistema una vez terminados.
RUN rm -rf /tmp/wordpress.zip
RUN rm -rf /tmp/wordpress.sql