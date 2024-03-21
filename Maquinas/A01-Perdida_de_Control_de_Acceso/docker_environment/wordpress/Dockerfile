FROM wordpress:latest

RUN apt update -y && apt install zip -y

# Copia el php wp-cli
COPY ./wp-cli.phar /usr/local/bin/wp
RUN chmod +x /usr/local/bin/wp

# Copia el archivo de dump de la base de datos guardado en ASSets a la imagen
COPY ./Assets/ddbb/wordpress.sql /tmp/wordpress.sql
COPY ./Assets/ddbb/web.sql /tmp/web.sql

# Copia los datos del wordpress a la imagen
COPY ./wordpress.zip /tmp/

# Descomprime el zip
RUN mkdir -p /var/www/html
RUN unzip /tmp/wordpress.zip -d /var/www/html/

# Restaurar el dump a la BBDD
RUN mysql -uroot -psecret database < /tmp/wordpress.sql
RUN mysql -uroot -psecret database < /tmp/web.sql

# Limpiamos el sistema una vez terminados.
RUN rm -rf /tmp/wordpress.zip
RUN rm -rf /tmp/wordpress.sql
