# **Máquina: Diseño Inseguro**

## Objetivo
Esta máquina está específicamente diseñada para explotar la vulnerabilidad ***A04:2021 - Diseño Inseguro*** y otras vulnerabilidades.

## Planteamiento
Para cumplir con este objetivo, la máquina alojará varios servicios como **FTP**, **SSH**, **MySQL** y **Apache**.

Estos servicios se encontrarán expuestos externamente para que cuando el atacante realice un reconocimiento pueda detectarlos.

El servicio **FTP** podrá ser accesible de forma anónima donde se encontrar un fichero con el contenido de varias contraseñas (Para depistar) y de esta forma se le dará una pista al atacante. Y dentro de ese fichero contendrá la contraseña del otro usuario FTP codificada.

El servicio de **SSH** no tendrá ninguna función más que despistar al atacante.

El servicio de **MySQL** tendrá la función de almacenar usuarios en la BBDD.


El servicio de apache alojará nuestra misma pagina web que es una web de **fans de la serie de los originales**. Dicha web será vulnerable a la vuelnerabilidad **Diseño Inseguro**, que será la **CVE-xxx-xxx**.

Una vez que el atacante haya hecho escaneo de puerto encontrar varios servicio entre ellos el servicio **FTP**. El atacante podrá acceder de forma anonima donde se encontrar un fichero con el contenido de varias contraseñas(Para depistar) y se le dará una pista al atacante. A parte el fichero en contendra unzip o otro fichero, que se podrá ver con la herramienta **binwalk**, dentro de ese fichero o unzip contendra la contraseña del **usuario FTP codificada o cifrada**. Ya que el atacante sabes previamente que usuarios hay podrá intentar acceder.

Una vez que el atcante haya hecho el escaneo de puerto encontrar varios ervicio entre ellos el servicio **FTP**
El atacante podrá acceder de forma anonimadonde se encontrar un fichero con una conversación entre el usuario FTP y el administrador. El atacante al no saber que usuario hay en a maquina hara un enumeración para ver que usuario hay que la maquina y quien es el posible **usuario FTP**.

A raiz de eso, el atacante tendrá que usar la herramienta hydra una vez que haya encontrado el **usuario FTP**, para intentar hacer fuerza bruta con el fichero **rockyou.txt**.

Una vez haya podido adivinar la contraseña con hydra y el atacante entre con el usuario **Elijah** tendrá que investigar que carpeta tiene los permiso para poder subir fichero y con ello una **reverse shell**.

Una vez que el atacante haya podido entrar mediante **reverse shell**, entrá como **www-data** una vez dentro tienes que encontrar un fichero con el nombre x que contedrá contraseña para despitar y una pista de la contraseña para que pueda decifrar la contraseña del usuario **Marcel**.

Una vez que le atacante entre con el usuario **Marcel en el home/marcel/** encontrará la primera flag, dentro del fichero abra otro fichero que contendrá la contraseña cifrada en diferentes codificaciones y cifrados. Dicho usuario está retringio lo que puede hacer. EL atacante tendrá que investigar como poder extrager el fichero que esta encondido en la flag.

Ya decifrada la contraseña y una vez se accedan como el usuario caroline el atacante tendrá que buscar el permisos SUID para poder excalar a privilegio a root una vez que sea root encontrará la segunda flag **/root/**

Una vez que puedan acceder al usuario FTP, el atacante tendra que decubrir en que carpeta puede subir**ficheros**.

Una vez que el atacante pueda hacer mediante una **reverse shell** como **www-data**. EL atacante tendrá que buscar una pista para poder acceder con un usuario en especifico que contendrá la primera flag ubicada /home/nombre_de_usuario/ y también tendrá que buscar la contraseña que contedrá la contraseña cifra y codificada con pista que se a encotrado previamente.

El atacante una vez que acceda con el usuario que contenta la flag a ver que el usuario encuestión no puede hacer muchas cosas. El atacante tendrá que hacer pivoting a otro usuario para que con dicho usuario pueda excalar a root y encontrar la siguiente flag en /root/.


## Configuración del entorno
Para configurar el entorno utilizaremos un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que utilizaremos son:

- **FTP**: *vsftpd* version 3.0.3 --> Para transferencia de archivos.
- **SSH**: *OpenSSH 9.6p1* --> Para acceso remoto seguro.
- **HTTP**: *Apache 2.4.58* --> Para el servidor web.
- **MySQL**: *MySQL 2.1.0* --> Para las bases de datos
 
## Pasos a seguir

1. **Instalación de Docker**
2. **Creación del Dockerfile**
3. **Verificación de contenedor Docker**
4. **Primeras pruebas de Docker**
5. **Configuración de la máquina y paquetes**
6. **Testeo de vulnerabilidades**
7. **Aplicar mejoras y corregir errores/problemas**
8. **Volver a testear las vulnerabilidades**
9. **Redactar el reporte y documentación final**
