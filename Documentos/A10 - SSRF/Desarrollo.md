# Introducción
Para desarrollar el contenedor Docker, se ha tenido en cuenta que debe ser vulnerable al ataque A10:2021 - SSRF. Para que nuestro contenedor sea vulnerable, deberá alojar una página web que permita al usuario hacer una consulta de stock sobre ciertos productos. El objetivo del atacante será capturar esta petición y forjar una nueva que le permita acceder a un recurso interno del servidor.

# Desarrollo del contenedor
El contenedor Docker estará basado en Ubuntu 22.04.3 LTS Server y tendrá instalados los siguientes programas:
* Wireshark, el cual nos permitirá realizar una captura de red mientras se ejecuta el ataque. Esta captura será analizada posteriormente.
* Apache, nos permitirá tener un servidor web alojado en Docker donde se podrá realizar el ataque SSRF.
* X11, esta utilidad nos permite utilizar Wireshark de forma gráfica desde el contenedor Docker.
* PHP, proporciona capacidades para ejecutar y administrar scripts y aplicaciones PHP en el contenedor. Junto con otros paquetes relacionados como php-cli y php-fpm.
* VIM/NANO, editores de texto.
* Python, servira como vector de entrada a la hora de realizar el escalado de privilegios.

El Dockerfile que generará el contenedor es el siguiente:
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/dockerfile.png)\
En la primera linea se especifica que imagen se usara para montar el conetendor, despues se realiza una actualizacion de paquetes y se instalan las utilidades necesarias para realizar el ataque SSRF, el parametro **DEBIAN_FRONTEND=noninteractive** se utiliza para que a la hora de instalar los paquetes no aparezca ningun prompt y que se aplique la opcion perdeterminada a la hora de configurar los paquetes en la instalacion, la ultima linea **rm -rf /var/lib/apt/lists/** eliminara los archivos temporales que ya no son necesarios después de la instalación de los paquetes, de esta forma se optimiza el espacio del contenedor. A continuacion se crea el directorio sshd dentro de /var/run, esto se realiza de forma autoamtica a la hora de poner en marcha el servicio SSH sin embargo es mejor crearlo antes de poner en marcha el servicio por si se necesita de antemano. A continuacion se establece que la variable de entorno **DISPLAY** apunte al display de la maquina anfitriona, esto nos servira para poder usar wireshark de forma grafica. Por ultimo se abren los puertos necesarios para los servicios SSH y apache y se ponen en marcha dichos servicios.

Para crear el contenedor docker usando el dockerfile se usara la opción **build**
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/docker-build.png)
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/docker-build-2.png)


Para poder realizar el escalado de privilegios se le aplicara el permiso SUID que permite a los usuarios ejecutar un archivo con los privilegios del propietario del archivo. De esta forma el usuario Paco podra acceder como root.
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/suid_python3.png)

# CTF
Una vez se accede con el usuario Paco, buscaremos el programa que tenga el permiso SUID. \
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/find_4000_paco.png) \
Podemos ver que el progrgrama python cuenta con el permiso SUID, aprovechando esta vulnerabilidad podremos acceder al usuario **root** 
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/root_paco.png)


# Problemas encontrados en el desarollo
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/error-display.png) \
Una vez accediamos al contenedor se intenta ejecutar Wireshark de forma fallida, ya que no se puede conectar a ninguna GUI para solucionar este problema se especifico la variable de enterno **DISPLAY** para que fuera la misma que la de la maquina local ademas se especifico que las aplicaciones locales tuvieran acceso al servidor de ventanas X con el comando **xhost +local:**
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/localhostx.png) 
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/error-dumpcap-child.png)
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/error-dumpcap-capabilities.png)


# Desarrollo de las webs
**Web login** <br>
Se ha realizado un login para la página web que sufrirá la vulnerabilidad de ssrf. Para la creación de la página, hemos utilizado únicamente HTML y CSS. No es una página funcional porque por ahí no se realizara el ataque, solo será una página donde no se podrá interactuar.
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/login-SSRF.png)

**Web tienda** <br>
Se realizó una búsqueda de información del ataque ssrf para ver que páginas eran más comunes en este tipo de ataque. Habiendo buscado varias fuentes de información, sacamos que unas de las páginas que más sufren de eso son tiendas que comprueban el stock de un producto.

Así que con esta información decidimos montar una web sencilla, usando html y JavaScript. En esta web pondremos que tipo de producto quiere el usuario. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-2.png)

Y una vez que lo haya seleccionado y le dé al botón de verificar las existencias, mostrará la cantidad de existencias el cual es un número random creado por JavaScript. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-3.png)

Se intentó a ver si podía sacar la API de la web mediante la verificación de existencias y vimos que el buirp suite no recogía nada. Buscamos información y vimos que lo estábamos haciéndolo mal. <br>
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zomeño)/Assets/Img/tiendaweb-4.png)

Así que se hizo, creó otra versión de la web para que obtuviera los datos de la base de datos. Se ha creado el HTML para mostrar los datos y el PHP para hacer la conexión con la base de datos. <br>
![]()
