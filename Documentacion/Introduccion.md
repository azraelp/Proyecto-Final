# Índice

1. [Introducción](#introducción)
2. [Inyección](#inyección)
    - [Descripción de diferentes tipos de ataques de inyección](#descripción-de-diferentes-tipos-de-ataques-de-inyección)
    - [Medidas para prevenir ataques de inyección](#medidas-para-prevenir-ataques-de-inyección)
3. [Fallas de Identificación y Autenticación](#fallas-de-identificación-y-autenticación)
    - [Causas comunes de fallas de identificación y autenticación](#causas-comunes-de-fallas-de-identificación-y-autenticación)
    - [Medidas para mitigar fallas de identificación y autenticación](#medidas-para-mitigar-fallas-de-identificación-y-autenticación)
4. [Mariadb](#mariadb)
    - [Características de Mariadb](#características-de-mariadb)
    - [Ventajas y desventajas de usar Mariadb](#ventajas-y-desventajas-de-usar-mariadb)
5. [Docker](#docker)
    - [Características de Docker](#características-de-docker)
    - [Ventajas y desventajas de usar Docker](#ventajas-y-desventajas-de-usar-docker)
6. [Contenedor Numero 1 Inyección](#contenedor-numero-1-inyección)
    - [Desarrollo de la Vulnerabilidad Principal](#desarrollo-de-la-vulnerabilidad-principal)
    - [Vulnerabilidades CVE Extra](#Vulnerabilidades-cve-extra)
    - [Desarrollo de las Vulnerabilidades Extra](#desarrollo-de-las-vulnerabilidades-extra)
    - [Proceso de explotación de las vulnerabilidades](#proceso-de-explotación-de-las-vulnerabilidades)
    - [Análisis del Contenedor una vez Explotado](#análisis-del-contenedor-una-vez-explotado)
    - [Herramientas Empleadas](#herramientas-empleadas)
7. [Contenedor Numero 2 Fallas de Identificación y Autenticación](#contenedor-numero-2-fallas-de-identificación-y-autenticación)
    - [Desarrollo de la Vulnerabilidad Principal](#desarrollo-de-la-vulnerabilidad-principal)
    - [Vulnerabilidades CVE Extra](#vulnerabilidades-cve-extra)
    - [Desarrollo de las Vulnerabilidades Extra](#desarrollo-de-las-vulnerabilidades-extra)
    - [Proceso de explotación de las vulnerabilidades](#proceso-de-explotación-de-las-vulnerabilidades)
    - [Análisis del Contenedor una vez Explotado](#análisis-del-contenedor-una-vez-explotado)
    - [Herramientas Empleadas](#herramientas-empleadas)



# Introducción
En el siguiente documento se explicará la creación de un contenedor en Docker con los siguientes riesgos del OWASP TOP 10:

- **A03:2021 - Inyección**
- **A07:2021 - Fallas de Identificación y Autenticación**

A continuación se explicarán en profundidad los riesgos mencionados, cómo explotarla y cómo mitigarla.

# Inyección	

Es un riesgo que implica la posibilidad de inserción de código malicioso en una entrada de datos para manipular el comportamiento de un sistema y obtener acceso no autorizado o realizar acciones no deseadas.
<p align="center">
<img  alt="drawing" width=600" height="200" src="https://www.indusface.com/wp-content/uploads/2019/08/OWASP-Part1-4.png" />
</p>

## Descripción de diferentes tipos de ataques de inyección:

- **SQL Injection:** Se insertan comandos SQL maliciosos en las entradas de datos de una aplicación web. Esto permite a los atacantes poder manipular las peticiones hechas a la base de datos, obteniendo, modificando o eliminando información y datos confidenciales.

- **XSS:** Este tipo de ataque implica la inserción de scripts maliciosos en páginas web accesibles por otros usuarios.

- **Command Injection:** Los atacantes insertan comandos del sistema operativo en entradas de datos de aplicaciones para ejecutar comandos arbitrarios en el servidor. 

- **LDAP:** Los atacantes pueden manipular consultas LDAP para obtener acceso no autorizado a la información para realizar acciones no deseadas en el sistema.

- **XPath Injection:** Se dirige a sistemas que utilizan expresiones XPath para realizar consultas en documentos XML.

## Medidas para prevenir ataques de inyección:

Para prevenir los ataques de inyección podemos emplear las siguientes medidas:

- **Validación de Entradas de Usuario:** Valida y filtra todas las entradas de usuario.

- **Parámetros Preparados:** Utiliza parámetros preparados o consultas parametrizadas en lugar de concatenar cadenas para construir consultas SQL.

- **Escapado de Caracteres:** Escapa los caracteres especiales antes de incluirlos en consultas SQL u otras estructuras de lenguajes de programación para evitar que sean interpretados como parte de un comando malicioso.

- **Validación de Datos de Formulario:** Valida y filtra los datos de los formularios antes de procesarlos en el servidor. 

- **Limitar Privilegios:** Limita los permisos de las cuentas de usuario y servicios para que tengan los privilegios mínimos necesarios para realizar sus funciones.

- **Actualizaciones y Parches:** Mantén actualizados todos los software y frameworks utilizados en tu aplicación para asegurarte de que se hayan corregido las vulnerabilidades conocidas.

- **Seguridad en la Capa de Red:** Utiliza firewalls y sistemas de detección de intrusiones para monitorear y filtrar el tráfico malicioso que podría contener intentos de ataques de inyección.

- **Educación y Concienciación:** Capacita a los desarrolladores, administradores de sistemas y usuarios finales sobre las mejores prácticas de seguridad.

# Fallas de Identificación y Autenticación

Las fallas de identificación y autenticación son un riesgo relacionado con la gestión de credenciales de usuario y los procesos de verificación de identidad en sistemas informáticos. Estas fallas pueden permitir a los atacantes acceder de forma no autorizada a sistemas, datos o recursos protegidos.
<p align="center">
<img  alt="drawing" width="250" height="200" src="https://www.grupocibernos.com/hubfs/blog-error%20de%20autenticaci%C3%B3n.jpg" />
</p>

## Causas comunes de fallas de identificación y autenticación

- **Contraseñas Débiles:** Las contraseñas débiles, como "123456" o "password", son vulnerables.

- **Falta de Autenticación Multifactor (MFA):** La autenticación multifactor agrega una capa adicional de seguridad al requerir que los usuarios proporcionen más de un factor de autenticación para verificar su identidad.

- **Reutilización de Contraseñas:** Si los usuarios utilizan la misma contraseña para múltiples servicios, el compromiso de una sola cuenta puede poner en riesgo todas las demás cuentas asociadas con esa contraseña.

- **Falta de Protección contra Ataques de Fuerza Bruta:** Los ataques de fuerza bruta intentan adivinar las contraseñas probando una gran cantidad de combinaciones posibles. 

- **Ataques de Phishing:** Los ataques de phishing utilizan técnicas de ingeniería social para engañar a los usuarios y hacer que divulguen sus credenciales de inicio de sesión.

- **Falta de Monitoreo y Detección de Anomalías:** La falta de sistemas de monitoreo y detección de anomalías puede hacer que las actividades de autenticación maliciosas pasen desapercibidas, permitiendo que los atacantes accedan a sistemas sin ser detectados.

- **Falta de Educación del Usuario:** Los usuarios pueden no estar al tanto de las mejores prácticas de seguridad, como la importancia de utilizar contraseñas seguras y no compartir sus credenciales con otros.

 ## Medidas para mitigar fallas de identificación y autenticación:

- **Contraseñas Seguras:** Establecer requisitos mínimos de complejidad de contraseña (longitud, caracteres especiales, combinación de letras mayúsculas y minúsculas, etc.) y educar a los usuarios sobre la importancia de evitar contraseñas fáciles de adivinar.

- **Autenticación Multifactor:** Implementa la autenticación multifactor para agregar una capa adicional de seguridad.
  
- **Gestión de Sesiones:** Implementa mecanismos para gestionar adecuadamente las sesiones de usuario, como tiempos de expiración de sesión, cierre de sesión automático después de períodos de inactividad.
  
- **Protección contra Ataques de Fuerza Bruta:** Bloqueo de cuentas después de varios intentos de inicio de sesión fallidos, implementación de reCAPTCHA o CAPTCHA.

- **Monitoreo de Actividad de Usuario:** Implementa sistemas de monitoreo para detectar y responder a actividades de usuario anómalas o maliciosas..

- **Educación del Usuario:** Educa a los usuarios sobre prácticas seguras de autenticación, como no compartir contraseñas, evitar el uso de la misma contraseña.

- **Actualizaciones y Parches:** Mantén actualizados los sistemas y aplicaciones para asegurarte de que se hayan corregido las vulnerabilidades conocidas relacionadas con la autenticación y la gestión de identidades.
# Mariadb

 **¿Qué es Mariadb?**


 <p align="center">
<img  alt="drawing" width="320" height="200" src="https://www.wpsysadmin.com/wp-content/uploads/2021/07/mariadb.png" />
</p>
  ## Características de Mariadb
## Ventajas y desventajas de usar Mariadb

# Docker

 **¿Qué es Docker?**

Docker es una plataforma de código abierto diseñada para facilitar la creación, implementación y ejecución de aplicaciones dentro de contenedores. Los contenedores son entornos de software ligeros y portátiles que encapsulan todo lo necesario para que una aplicación se ejecute, incluidas las bibliotecas, dependencias y otros componentes, lo que les permite funcionar de manera consistente en cualquier entorno.
<p align="center">
<img  alt="drawing" width="320" height="200" src="https://d1.awsstatic.com/acs/characters/Logos/Docker-Logo_Horizontel_279x131.b8a5c41e56b77706656d61080f6a0217a3ba356d.png" />
</p>

  ## Características de Docker

- **Portabilidad:** El contenedor Docker podremos desplegarlo en cualquier otro sistema que soporte esta tecnología.

- **Ligereza:** Los contenedores Docker son ligeros y rápidos de crear, iniciar y detener, ya que comparten el núcleo del sistema operativo del host y utilizan recursos de manera eficiente.

- **Consistencia:** Docker garantiza que las aplicaciones se ejecuten de manera consistente en cualquier entorno, eliminando problemas de compatibilidad y dependencias.

- **Aislamiento:** Cada contenedor tiene su propio sistema de archivos, espacio de nombres de red y espacio de nombres de   proceso, lo que evita conflictos entre aplicaciones y garantiza la seguridad de la aplicación.
 
- **Escalabilidad:** Docker facilita la escalabilidad horizontal de las aplicaciones mediante la implementación de múltiples contenedores que se ejecutan en clústeres de hosts Docker, lo que permite distribuir la carga de trabajo y mejorar el rendimiento de la aplicación.
 
- **Facilidad de uso:** Docker proporciona una interfaz de línea de comandos intuitiva y herramientas de gestión como Docker Compose, que simplifican la creación, ejecución y gestión de contenedores y aplicaciones.
 
- **Reutilización de Imágenes:** Docker utiliza un modelo de imágenes y contenedores que fomenta la reutilización y compartición de imágenes de aplicaciones entre desarrolladores y equipos.

## Ventajas y desventajas de usar Docker

 **Ventajas:**

- **Portabilidad:** Los contenedores Docker proporcionan una forma fácil y rápida de empaquetar una aplicación y todas sus dependencias en un entorno aislado.

- **Eficiencia de Recursos:** Los contenedores Docker comparten el mismo kernel del sistema operativo del host, lo que los hace ligeros y rápidos de crear, iniciar y detener.

- **Aislamiento:** Docker proporciona un alto nivel de aislamiento entre contenedores, lo que significa que cada contenedor tiene su propio sistema de archivos, espacio de nombres de red y espacio de nombres de proceso. 

- **Escalabilidad:** Docker facilita la escalabilidad horizontal de las aplicaciones mediante la implementación de múltiples contenedores que se ejecutan en clústeres de hosts Docker. Esto permite distribuir la carga de trabajo y escalar la aplicación de manera eficiente según las necesidades de demanda.

- **Facilidad de Uso:** Docker proporciona una interfaz de línea de comandos intuitiva y herramientas de gestión como Docker Compose, que simplifican la creación, ejecución y gestión de contenedores y aplicaciones. Esto hace que sea fácil para los desarrolladores y los equipos de operaciones trabajar con contenedores y mantener aplicaciones en producción.

**Desventajas:** 

- **Comunidad Fragmentada:** Aunque Docker es una plataforma de código abierto con una gran comunidad de usuarios y contribuidores, la rápida evolución de la tecnología de contenedores ha dado lugar a la aparición de múltiples estándares y herramientas de orquestación, lo que puede llevar a una fragmentación y falta de estandarización en el ecosistema de contenedores.

- **Seguridad:** Aunque Docker proporciona un alto nivel de aislamiento entre contenedores, aún existen posibles vulnerabilidades de seguridad, especialmente si no se siguen las mejores prácticas de seguridad al crear y configurar imágenes de contenedores o al exponer servicios a través de redes públicas.

- **Rendimiento:** Aunque los contenedores Docker son ligeros y eficientes en recursos, puede haber un pequeño costo de rendimiento asociado con la virtualización a nivel de contenedor en comparación con la ejecución de aplicaciones directamente en el sistema operativo host.

# Contenedor Numero 1 Inyección

El sistema operativo utilizado para el desarrollo de este primer contenedor es Ubuntu Server XX. La vulnerabilidad elegida ha sido SQL Injection. Es por ello que el desarrollo de esta estará basado en un formulario cuyos campos serán vulnerables a este tipo de ataque. 

<p align="center">
<img  alt="drawing" width="350" height="200" src="https://blogs.zeiss.com/digital-innovation/de/wp-content/uploads/sites/2/2020/05/201909_Security_SQL-Injection_1.png" />
</p>

## Desarrollo de la Vulnerabilidad Principal 

En primer lugar desarrollamos un formulario de inicio de sesión con su respectivo validador (en PHP). Este será el encargado de lanzar _query_ a la base de datos para verificar si las credenciales introducidas por el cliente forman parte de un usuario válido. Este código no sanitiza la entrada obtenida, es por ello que es vulnerable a un ataque de inyección SQL.

En segundo lugar instalamos MariaDB para gestionar las bases de datos que estarán conectadas al formulario. 

## Vulnerabilidades CVE Extra

## Desarrollo de las Vulnerabilidades Extra

## Proceso de explotación de las vulnerabilidades 

## Análisis del Contenedor una vez Explotado 

### Herramientas Empleadas 
-docker checkpoint

-Docker Forensics Toolkit 

-OWASP ZAP
# Contenedor Numero 2 Fallas de Identificación y Autenticación

## Desarrollo de la Vulnerabilidad Principal

## Desarrollo de las Vulnerabilidades Extra 

## Vulnerabilidades CVE Extra 

## Proceso de explotación de las vulnerabilidades 

## Análisis del Contenedor una vez Explotado
### Herramientas Empleadas
