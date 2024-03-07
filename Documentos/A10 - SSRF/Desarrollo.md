# **Índice**

<span style="color:black;">1. [ Introducción](#introducción)</span><br>
<span style="color:black;">2. [ Desarrollo del contenedor](#Desarrollo)</span><br>
<span style="color:black;">3. [ Configuración de usuarios](#ConfUsers)</span><br>
<span style="color:black;">4. [ Desarrollo de Apache y configuraciones SSRF](#Apache)</span><br>
<span style="color:black;">5. [ Configuración del servidor SSH](#confSSH)</span><br>
<span style="color:black;">6. [ Desarrollo de las webs](#Desarrollo-webs)</span><br>
<span style="color:black;">7. [ Problemas encontrados en el desarrollo](#Problemas)</span><br>
---

<br>

<h1 name="introducción">1. Introducción</h1>
Para desarrollar el contenedor Docker, se ha tenido en cuenta que debe ser vulnerable al ataque A10:2021 - SSRF. Para que nuestro contenedor sea vulnerable, deberá alojar una página web que permita al usuario hacer una consulta de stock sobre ciertos productos. El objetivo del atacante será capturar esta petición y forjar una nueva que le permita acceder a un recurso interno del servidor.


<h1 name="Desarrollo">2. Desarrollo del contenedor</h1>
El contenedor Docker estará basado en Ubuntu 22.04.3 LTS Server y tendrá instalados los siguientes programas:
* Wireshark, el cual nos permitirá realizar una captura de red mientras se ejecuta el ataque. Esta captura será analizada posteriormente.
* Apache, nos permitirá tener un servidor web alojado en Docker donde se podrá realizar el ataque SSRF.
* X11, esta utilidad nos permite utilizar Wireshark de forma gráfica desde el contenedor Docker.
* PHP, proporciona capacidades para ejecutar y administrar scripts y aplicaciones PHP en el contenedor. Junto con otros paquetes relacionados como php-cli y php-fpm.
* VIM/NANO, editores de texto.
* Python, servirá como vector de entrada a la hora de realizar el escalado de privilegios.

El Dockerfile que generará el contenedor es el siguiente:
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/dockerfile.png)\
En la primera línea se específica que imagen se usará para montar el contenedor, después se realiza una actualización de paquetes y se instalan las utilidades necesarias para realizar el ataque SSRF, el parámetro **DEBIAN_FRONTEND=noninteractive** se utiliza para que a la hora de instalar los paquetes no aparezca ningún prompt y que se aplique la opción predeterminada a la hora de configurar los paquetes en la instalación, la última línea **rm -rf /var/lib/apt/lists/** eliminará los archivos temporales que ya no son necesarios después de la instalación de los paquetes, de esta forma se optimiza el espacio del contenedor. A continuación se crea el directorio sshd dentro de /var/run, esto se realiza de forma automática a la hora de poner en marcha el servicio SSH sin embargo es mejor crearlo antes de poner en marcha el servicio por si se necesita de antemano. A continuación se establece que la variable de entorno **DISPLAY** apunte al display de la máquina anfitrión, esto nos servirá para poder usar Wireshark de forma gráfica. Por último se abren los puertos necesarios para los servicios SSH y Apache y se ponen en marcha dichos servicios.

Para crear el contenedor Docker usando el dockerfile se usará la opción **build**
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/docker-build.png)
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/docker-build-2.png)


Para poder realizar el escalado de privilegios se le aplicara el permiso SUID que permite a los usuarios ejecutar un archivo con los privilegios del propietario del archivo. De esta forma el usuario Paco podrá acceder como root. \
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/suid_python3.png)
<br>

<h1 name="Apache">3. Configuración de usuarios</h1>

<h1 name="Apache">4. Desarrollo de Apache y configuraciones SSRF</h1>

Configuración del archivo /etc/apache2/apache2.conf
<br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/apache2.conf.png)
<br>
Será necesario habilitar el módulo headers con el comando:
> sudo a2enmod headers.load && sudo service apache2 reload
<br>
La parte esencial en SSRF es poder acceder a recursos inaccesibles como un cliente normal, ya sea un servicio específico, otro host de la red u otros. Nosotros optamos por habilitar un puerto extra, así que para eso teníamos que modificar el archivo /etc/apache2/ports.conf y añadir el puerto específico.
<br>

![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/ports.conf.png)
<br>
El siguiente paso a seguir era crear un site específico para nuestra página web oculta del puerto 5000. Así que copiamos el archivo 000-default.conf, ubicado en la ruta /etc/apache2/sites-available, el cual se encarga de guardar la configuración de la página predeterminada de apache (/var/www/html) y creamos el archivo con otro nombre.
> cp 000-default.conf server.com.conf

Una vez tengamos el archivo de configuración del site pasamos a editarlo (con vim) y modificaremos los siguientes valores:
Cambiaremos la primera linea del archivo de <VirtualHost *:80> por <VirtualHost *:5000> para que este site sea accesible desde el puerto 5000.
Cambiaremos el DocumentRoot por la ruta donde estarán los archivos de la web. **DocumentRoot /var/www/server**
Añadiremos la líneas **ServerName** y **ServerAlias** con los valores convenientes del dominio. En este caso dejaremos localhost.
También hemos configurado directivas extras para poder filtrar el acceso a esta página y mostrar un mensaje de acceso denegado a usuarios que accedan desde el exterior.
Únicamente se podrá acceder al recurso original de este puerto si el acceso viene de localhost.

<br>

![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/server.com.conf.png)
<br>

Ahora ya que tenemos toda la configuración falta habilitar el mod que utilizamos para crear la directiva, este mod es el rewrite de Apache
> sudo a2enmod rewrite.load && sudo service apache2 restart

Y por último tenemos que habilitar el site que hemos creado desde 0. Para ello:
> sudo a2ensite server.com.conf && sudo service apache2 reload

Y a partir de ahora, siempre que hagamos un cambio en este archivo tendríamos que deshabilitar y habilitar el site de nuevo, y posteriormente recargar el servidor de Apache para aplicar los cambios correctamente.
> sudo a2dissite server.com.conf sudo a2ensite server.com.conf && sudo service apache2 reload



<h1 name="confSSH">5. Configuración del servidor SSH</h1>

**Preparación de usuarios** <br>
Se ha creado un directorio con el nombre de sshkeys_user con una configuración específica. El directorio tendrá los permisos de leer y escribir para el usuario root, mientras que el grupo dbAdmin solo tendrá permisos de lectura. Además dentro de este grupo estará guardado el usuario Francisca. 

Se han generado las claves ssh para el usuario Francisca, también se han generado la clave pública (id_rsa.pub) y la clave privada (id_rsa). Estas claves estarán guardadas dentro de la carpeta ssh (/home/ssh/).




<h1 name="Desarrollo-webs">6. Desarrollo de las webs</h1>

**Web login** <br>
Se ha realizado un login falso para la página web. Para la creación de la página, hemos utilizado únicamente HTML y CSS. No es una página funcional porque por ahí no se realizara el ataque, solo será una página donde no se podrá interactuar.
<br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/login-SSRF.png)

**Web principal**<br>
Se ha realizado una página web que simula ser un validador de ULRs, la información recogida por el formulario es tratada y procesada por una función php vulnerable.
<br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/web-principal.png)
<br>

**Web secundaria**<br>
También se ha desarrollado una página web secundaria en otro puerto diferente. Esta web ofrece cierta información, es una web oculta para cualquier cliente que no esté en la red privada. 
<br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/endesarrollo.png)
<br>

**Acceso denegado a la web secundaria**<br>
Si intentamos acceder a este puerto secundario web, nos saltará un mensaje diciendo que el acceso es prohibido:
<br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/accesoprohibido.png)
<br>



<h1 name="Problemas">7. Problemas encontrados en el desarrollo</h1>

Una vez accedíamos al contenedor se intenta ejecutar Wireshark de forma fallida, ya que no se puede conectar a ninguna GUI para solucionar este problema se específico la variable de entorno **DISPLAY** para que fuera la misma que la de la máquina local ademas se específico que las aplicaciones locales tuvieran acceso al servidor de ventanas X con el comando **xhost +local:**
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/error-display.png) \
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/localhostx.png) \
El motivo por el cual surgía este error era que el propio Wireshark no contaba con los permisos suficientes para poder ejecutarse, al añadirle permisos de ejecución con  **chmod** se ejecuta el programa.
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/error-dumpcap-child.png) \
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/lswireshark.png) \
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/chmod700.png) \
En este caso el error se producía debido a que el Docker no contaba con las capabilites necesarias que le otorgan permisos para poder realizar las capturas de tráfico. Esto se solucionó especificando las capabilites necesarias al hacer la puesta en marcha del Docker, **--cap-add=NET_ADMIN --cap-add=NET_RAW** \ 
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/error-dumpcap-capabilities.png) \
<br>
Hicimos el desarrollo de 2 páginas web, con la intención de realizar un ataque SSRF desde la URL en el navegador cliente. Al ver que no funcionaba, optamos por ver la consola del navegador (F12). Fue en ese punto cuando vimos que el propio navegador aplica una política la cual bloquea este tipo de acciones que se ejecutan al hacer un SSRF.

![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/SameOriginPolicy.png) 
<br>

También probamos a instalar una versión anterior de Apache para aprovechar una vulnerabilidad de SSRF (CVE-2021-44224) [Vulnerabilidad](https://www.cybersecurity-help.cz/vulnerabilities/59057/)
Esta vulnerabilidad podía explotarse entre las versiones de Apache 2.4.7 - 2.4.51. El contenedor contaba con la versión de Apache 2.4.52, así que desinstalamos el Apache con purge, remove y autoremove. Y una vez con todas las carpetas totalmente exterminadas decidimos a descargar el paquete de Apache vulnerable a SSRF. Para eso antes debíamos instalar ciertos paquetes y dependencias, wget para poder descargar el paquete. Las dependencias necesarias fueron: libapr1-dev, libaprutil1-dev, libpcre3-dev, gcc y make. Una vez acabamos de seguir los pasos de instalación del paquete. Al ejecutar apache2 -v obteníamos la misma versión que anteriormente habíamos desinstalado (2.4.52). Hubo varios intentos con nuevos contenedores para poder instalar la versión de Apache vulnerable (2.4.7), pero no hubo forma de hacer esto efectivo.

Para poder realizar el escalado a root se ha utilizado la vulnerabilidad path hijacking, en un principio se intentó hacer de una forma simple utilizando un script básico de bash, el cual se usaría para que el atacante cambiase la variable de entorno **PATH** para ejecutar su cat y no el comando. Después de añadir el SUID al script se ejecutaba pero no con los permisos de usuario, pero se ejecutaba con el usuario básico Francisca. 
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/scriptbash.png) 
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/scriptbashsuid.png) 
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/whoamifrancisca.png) 
<br>

**Web tienda** <br>
Se realizó una búsqueda de información del ataque SSRF para ver que páginas eran más comunes en este tipo de ataque. Habiendo buscado varias fuentes de información, sacamos que unas de las páginas que más sufren de eso son tiendas que comprueban el stock de un producto.

Así que con esta información decidimos montar una web sencilla, utilizando HTML y JavaScript. En esta web pondremos que tipo de producto quiere el usuario. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-2.png)

Y una vez que lo haya seleccionado y le dé al botón de verificar las existencias, mostrará la cantidad de existencias el cual es un número random creado por JavaScript. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-3.png)

Se intentó a ver si podía sacar la API de la web mediante la verificación de existencias y vimos que el Burpsuite no recogía nada. Buscamos información y vimos que lo estábamos haciéndolo mal. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-4.png)

Así que se hizo, creó otra versión de la web para que obtuviera los datos de la base de datos. Se ha creado el HTML para mostrar los datos y el PHP para hacer la conexión con la base de datos. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-5.png)
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-6.png)

Pero como vemos en el Burpsuite no detecta la API <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-7.png)

Tras varios intentos sin éxito, decidimos enfocarlo de otra manera. Y hacer una página parecida a "VirusTotal". En esta página habrá un campo que es donde se insertará la URL de cualquier web. 

