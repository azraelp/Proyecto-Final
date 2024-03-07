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



En el servidor web habrá alojado una página web centrada en la apicultura, dando información de todo tipo. 
Aquí pude ver una vista previa del sitio [sitio](https://pro2y38.000webhostapp.com/).
También habrá bastantes pistas, así como un archivo notas.md el cual se encotrara como un comentario en un archivo css y tendra el siguiente contenido:

![](/Assets/robots.png)

La foto que se menciona estará colgada en el servidor web. La foto es la siguiente:

![](/Assets/foton.jpeg)

Esta imagen va a contener un archivo ZIP incrustado en ella, para ello hemos usado el comando **steghide** de Linux.

Steghide, una herramienta de estenografía, oculta datos dentro de imágenes digitales utilizando técnicas sofisticadas. Funciona al incrustar datos en bits menos significativos de los píxeles de la imagen, lo que permite que la información permanezca oculta a simple vista. Estos datos pueden ser extraídos posteriormente utilizando la misma herramienta y una contraseña proporcionada durante el proceso de ocultación.


*Para poder ocultar el ZIP tenemos que tener en cuenta que la imagen debe ser en formato .jpg*

![](/Assets/steg.png)

Una vez hecho esto, ya tenemos el ZIP incrustado en la imagen y para extraerlo usamos la misma herramienta pero con otro comando:

![](/Assets/stegextarct.png)

Dentro de él hay un archivo que contiene lo siguiente: 

![](/Assets/zip.png)

Aquí se puede ver la ruta /wcontrol, que es un panel de control de página web. Al acceder al panel de control, se abre un panel de inicio de sesión:

![](/Assets/login.png)


*Este es el código:*

![](/Assets/code-login.png)

Este panel de login tiene varias funciones:

- Control de inicio de sesión
    - Usuario y contraseña
    - Limitar intentos (Evitar fuerza bruta)
- Control de sesiones para la página

Dentro del panel hay varias páginas:

1. Dashboard

![](/Assets/dashboard.png)

En este dashboard se pueden observar varias cosas:

- Los recursos que se están consumiendo, que son valores random obtenidos con JavaScript
- Un menú lateral con distintos apartados, el cual se mantiene en toda la web.

Para la gestión de sesiones, lo que hemos hecho es incluir el siguiente código en todas las páginas de la web, para evitar que se pueda acceder a ellas si no se ha iniciado sesión.

![](/Assets/sesiones.png)


2. Usuarios

![](/Assets/usuaris.png)

En este panel se puede ver los usuairos que hay registrados en la pagina.  


## Servidor SSH

Para lograr la configuración del servidor ssh deseado, lo primero que tenemos que hacer es generar un par de llaves. Guardaremos las llaves en la ubicación por defecto, y le pondremos un passphrase a la clave privada para tener una capa más de seguridad a la hora de conectarnos a la máquina vía ssh.

![](/Assets/configuracion_ssh_1.PNG)

Una vez hemos generado las llaves ssh, meteremos el contenido de la llave pública dentro de authorized_keys, de esta forma, todo aquel que tenga la llave privada y tenga el passphrase podra iniciar sesión en la máquina.

![](/Assets/configuracion_ssh_2.PNG)

Por último le damos permisos de lectura a la llave privada, y lectura y ejecución a la carpeta .ssh del usuario en cuestión.

![](/Assets/configuracion_ssh_3.PNG)

## Walkthrough

![](/Assets/2024-03-07_18-19.png)