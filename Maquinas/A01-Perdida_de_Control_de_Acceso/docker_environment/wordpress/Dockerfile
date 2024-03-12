FROM ubuntu:latest
RUN apt update -y
RUN apt install zip -y

# Copia el archivo de dump de la base de datos guardado en ASSets a la imagen
COPY ../Assets/ddbb/wordpress.sql /tmp/wordpress.sql
COPY ../Assets/ddbb/web.sql /tmp/web.sql

# Copia los datos del wordpress a la imagen
COPY ../Assets/wordpress/wordpress.zip /tmp/

# Copia el php wp-cli
COPY ./wp-cli.phar /usr/local/bin/wp
RUN chmod +x /usr/local/bin/wp

# Descomprime el zip
RUN mkdir -p /var/www/html
RUN unzip /tmp/wordpress.zip -d /var/www/html/

# Restaurar el dump a la BBDD
RUN wp db import /tmp/wordpress.sql --path=/var/www/html --allow-root
RUN wp db import /tmp/web.sql --path=/var/www/html --allow-root

# Limpiamos el sistema una vez terminados.
RUN rm -rf /tmp/wordpress.zip
RUN rm -rf /tmp/wordpress.sql
