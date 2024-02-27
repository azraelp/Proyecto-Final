## Objetivo Maquina 1
Esta maquina va ser diseñanada para explotar la vulneravilidad ***A05:2021 - Configuración de Seguridad Incorrecta***.

## Plantemiento
Para ello va a alojar varios servidores, ftp,ssh y un apache que va a alojar un wordpres. El servidor ftp va a ser accesible de manera anónima, y en el se encontrarán las credenciales para acceder al wordpres desde el cual se podrá conseguir una reverse shell al servidor como el usuario www-data. Desde el usuario www-data no será posible acceder como root, primero tendrás que hacer movimiento lateral hacia otro usuario local desde el cual sí se podrá acceder como root. 


## Configuración del entorno
Para ello, vamos a crear un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que vamos a utilizar son:

![](/Assets/M1.0.png)

- **FTP**: *vsftpd* version 3.0.3 --> Para transferencia de archivos.
- **SSH**: *OpenSSH 9.6p1* --> Para acceso remoto seguro.
- **HTTP**: *Apache 2.4.58* --> Para el servidor web.
 
# Configuracion de los servidores

## Servidor FTP

El servidor FTP tendra la sigiente estrucutra de archvios.

![](/Assets/rutasftp.png)

Dentro del archvio creds.txt habran una credenciales cifradas que te permitiran acceder al panel de control de la pagina web.

## Servidor Web

En el sitio web habran bastantes pistas, y la mayor parte de la ctf.
En primer lugar habra un archvio robots.txt con el siguiente contenido:

![](/Assets/robots.png)

La foto que se menciona estara colgada en el servidor web. La foto es la siguiente:
![](/Assets/foton.jpeg)

Esta imagen va a contener un archivo zip incrustada en ella, para ello hemos usado un pequeño programa que hemos encontrado en python.

En el servidor web habra alojada una pagina web centrada en la apicultura, dando informacion de todo tipo. 
Aquí pude ver una vista previa del sitio [sitio](https://pro2y38.000webhostapp.com/).
A parte del sitio de apicultura tambien habra un panel de control para la pagina web, el panel será el siguiente:


## Servidor SSH

Para lograr la configuración del servidor ssh deseado, lo primero que tenemos que hacer es generar un par de llaves

![](/Assets/configuracion_ssh_1.png)

Una vez hemos generado las llaves ssh, meteremos el contenido de la llave pública dentro de authorized_keys

![](Assets/configuracion_ssh_2.png)

Por ultimo le damos permisos de lectura y ejecución a la carpeta .ssh del usuario en cuestion

![](Assets/configuracion_ssh_3.png)