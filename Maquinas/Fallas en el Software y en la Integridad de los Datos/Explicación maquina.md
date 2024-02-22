# **Maquina: Fallas en el Software y en la Integridad de los Datos**

## Objetivo
Esta maquina esta especificamente diseñada para explotar la vulnerabilidad ***A08:2021 – Fallas en el Software y en la Integridad de los Datos*** y otras vulnerabilidades.

## Planteamiento
Para cumplir con este objetivo, la maquina alojará varios servicios como **ftp**, **ssh**, **mysql** y **apache** que alojará la plataforma de **CubeCart**.
Estos servicios se encontrarán expuestos externamente para que cuando el atacante realice un reconocimiento pueda detectarlos.

El servicio **ftp** podrá ser accesible de forma anónima y en el se podra ver una imagen de una **Basket**, de esta forma se le dará una pista al atacante.

El servicio de **ssh** no tendrá ninguna función más que despistar al atacante.

El servicio de **mysql** tendrá la función de almacenar usuarios en la BBDD.

El servicio de apache alojará la plataforma de **CubeCart** que es una plataforma para montar negocios de tiendas online. 
Esta plataforma de **CubeCart** dispondrá de la **versión 5.0**, la cual es vulnerable a la vulnerabilidad de **Fallas en el Software y en la Integridad de los Datos**, 
especificamente al **CVE-2013-1465**. 

Esta vulnerabilidad consiste en abusar del metodo basket() definido en cubecart.class.php, en donde la entrada del usuario pasada a
través del parámetro $_POST['shipping'] no se depura correctamente antes de ser utilizado en unserialize().
Enviando de un objeto "Config" serializado especialmente diseñado, un atacante podría ser capaz de cambiar los configuración de la aplicación con valores arbitrarios, 
lo que puede hacer que la aplicación sea vulnerable a ataques maliciosos como Cross-Site Scripting, SQL Injection o RCE.

A través de esta vulnerabilidad se puede derivar a un RCE que ejecute una reverse shell al equipo del atacante obteniendo acceso al sistema como www-data.

Una vez se ha obtenido acceso a la maquina se deberá pivotar a otro usuario, para pivotar a este usuario se tendrá almacenadas las credenciales de este usuario en un fichero protegido con contraseña dentro de /var/www/html/creds.txt.zip.

Este fichero protegido con contraseña se podrá crackear con el diccionario de rockyou.txt y una vez se tenga la contraseña se podrá pivotar de usuario.

En este nuevo usuario se podrá visualizar la flag de user.txt dentro de /home/usuario/.

Este nuevo usuario tendrá un permiso de SUID en algun binario que tenga como propietario a root, de esta forma el usuario podrá abusar de este permiso SUID y escalar privilegios al usuario root,
comprometiendo totalmente la maquina y disponiendo de permisos y acceso total.

Obteniendo el acceso a root podremos visualizar la flag de root.txt dentro de /root/.

## Configuración del entorno
Para configurar el entorno utilizaremos un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que utilizaremos son:

- **FTP**: *vsftpd* version 3.0.3 --> Para transferencia de archivos.
- **SSH**: *OpenSSH 9.6p1* --> Para acceso remoto seguro.
- **HTTP**: *Apache 2.4.58* --> Para el servidor web.
- **MySQL**: *MySQL 2.1.0* --> Para las bases de datos
 
## Pasos a seguir

1. **Instalación de Docker**
2. **Creacion del Dockerfile**
3. **Verificación de contenedor Docker**
4. **Primeras pruebas de Docker**
5. **Configuración de la maquina y paquetes**
6. **Testeo de vulnerabilidades**
7. **Aplicar mejoras y corregir errores/problemas**
8. **Volver a testear las vulnerabilidades**
9. **Redactar el reporte y documentación final**
