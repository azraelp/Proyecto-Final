FROM wordpress:latest

RUN apt update -y && apt install mysql-community-client unzip zip -y

# create folder webapp
RUN mkdir -p /var/www/html

# Copia el php wp-cli
COPY .wordpress/wp-cli.phar /usr/local/bin/
RUN chmod +x /usr/local/bin/wp-cli.phar

# Copia el archivo de dump de la base de datos guardado en ASSets a la imagen
COPY ./Assets/database/wordpress.sql /tmp/
COPY ./Assets/database/web.sql /tmp/

# Copia los datos del wordpress a la imagen
COPY ./wordpress/wordpress.zip /tmp/

# Descomprime el zip
RUN unzip /tmp/wordpress.zip -d /var/www/html/

# Restaurar el dump a la BBDD
RUN mysql -uroot -p12345 wordpress < /tmp/wordpress.sql
RUN mysql -uroot -p12345 wordpress < /tmp/web.sql

# Limpiamos el sistema una vez terminados.
RUN rm -rf /tmp/wordpress.zip
RUN rm -rf /tmp/wordpress.sql
