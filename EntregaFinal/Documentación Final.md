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

- Instalacion de docker a nuestro sistema Ubuntu.
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
  
