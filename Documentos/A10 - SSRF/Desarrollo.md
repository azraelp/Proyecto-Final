# Introducción
Para desarrollar el contenedor Docker, se ha tenido en cuenta que debe ser vulnerable al ataque A10:2021 - SSRF. Para que nuestro contenedor sea vulnerable, deberá alojar una página web que permita al usuario hacer una consulta de stock sobre ciertos productos. El objetivo del atacante será capturar esta petición y forjar una nueva que le permita acceder a un recurso interno del servidor.

# Desarrollo del contenedor
El contenedor Docker estará basado en Ubuntu 22.04.3 LTS Server y tendrá instalados los siguientes programas:
* Wireshark, el cual nos permitirá realizar una captura de red mientras se ejecuta el ataque. Esta captura será analizada posteriormente.
* Apache, nos permitirá tener un servidor web alojado en Docker donde se podrá realizar el ataque SSRF.
* X11, esta utilidad nos permite utilizar Wireshark de forma gráfica desde el contenedor Docker.
* PHP, proporciona capacidades para ejecutar y administrar scripts y aplicaciones PHP en el contenedor. Junto con otros paquetes relacionados como php-cli y php-fpm.
* VIM/NANO, editores de texto.

El Dockerfile que generará el contenedor es el siguiente:
![](https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo5(Eloi-Alan-Fernando-Jose-Zome%C3%B1o)/Assets/Img/dockerfile.png)

