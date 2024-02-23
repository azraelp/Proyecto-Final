## Introducción
Para desarrollar el contenedor Docker, se ha tenido en cuenta que debe ser vulnerable al ataque A10:2021 - SSRF. Para que nuestro contenedor sea vulnerable, deberá alojar una página web que permita al usuario hacer una consulta de stock sobre ciertos productos. El objetivo del atacante será capturar esta petición y forjar una nueva que le permita acceder a un recurso interno del servidor.

## Desarrollo del contenedor
El contenedor docker estara basado en Ubuntu 22.04.3 LTS Server, y tendra instalados los siguientes programas:
* Wireshark, el cual nos permitira realizar una captura de red mientras se ejecuta el ataque, esta captura sera analizada posteriormente. 
* Apache, nos permitira tener un servidor web alojado en docker donde se podra realizar el ataque SSRF.
* X11, esta utilidad nos permite poder utilizar Wireshark de forma grafica desde el contenedor docker.
* PHP,  proporciona capacidades para ejecutar y administrar scripts y aplicaciones PHP en el contenedor. Junto con otros paquetes relacionados como php-cli y php-fpm.
* VIM/NANO, editores de texto.

El dockerfile que generara el contenedor es el siguiente
![](/Assets/dockerfile.png)

