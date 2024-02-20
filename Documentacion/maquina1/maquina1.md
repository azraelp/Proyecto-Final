# Info Maquina 1
Esta maquina va ser diseñanada para explotar la vulneravilidad ***A05:2021 - Configuración de Seguridad Incorrecta***.


# Objetivo y plantemiento
Para ello va a alojar varios servidores, ftp,ssh y un apache que va a alojar un wordpres. El servidor ftp va a ser eccecible de manera anonima, y en el se encontraran las credneciales para acceder al wordpres desde el cual se podra conseguir una reverse shell al servidor como el usuaio www-data. Desde el usuario www-data no sera posible acceder como root, primero tendras que hacer movimiento lateral hacia otro usuairo local desde el cual si se podra acceder como root.


## Configuración del entorno
Para ello, vamos a crear un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que vamos a utilizar son:

- **FTP**: *vsftpd* version 3.0.3 --> Para transferencia de archivos.
- **SSH**: *OpenSSH 9.6p1* --> Para acceso remoto seguro.
- **HTTP**: *Apache 2.4.58* --> Para el servidor web.
 
## Pasos a seguir

1. **Instalación de Docker**
2. 


