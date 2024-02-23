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
