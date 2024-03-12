#!/bin/bash

# Iniciar el servicio de MySQL
service mysql start

# Iniciar el servicio de WordPress
service wordpress start

# Iniciar el servicio SSHD
service ssh start

# Iniciar el servicio VSFTP
service vsftpd start

# Iniciar el servicio de cron
service cron start

# Iniciar el entorno personalizado de PHP
service php7.4-fpm start

# Mantener el contenedor en ejecución si no hay un proceso principal en primer plano
tail -f /dev/null
