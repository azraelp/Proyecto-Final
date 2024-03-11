# Dockerfile para el servicio Crontab
FROM ubuntu:latest

RUN apt-get update && apt-get install -y cron

# Copia el archivo de crontab al contenedor
COPY crontab /etc/cron.d/my-crontab

# Da permisos de ejecución al archivo de crontab y crea el log
RUN chmod 0644 /etc/cron.d/my-crontab \
    && touch /var/log/cron.log

# Ejecuta el comando en el arranque del contenedor
CMD cron && tail -f /var/log/cron.log
