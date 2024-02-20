# ﻿Planificación Proyecto Final


En el proyecto se deberán crear 2 máquinas en docker con vuestras respectivas vulnerabilidades de OWASP Top 10 web en cada, cada máquina deberá disponer de diferentes vulnerabilidades en general, los CVE’s de estas siendo de 2023 para adelante, no se permiten CVE’s anteriores.


Se debe documentar como explotar y analizar la máquina, por lo que esta deberá tener las herramientas que creáis necesarias para poder realizar el análisis.


Se deben entregar 2 versiones de cada máquina, una en estado inicial para ser explotada, y otra ya explotada para realizar la investigación, todo esto en docker.

### Las vulnerabilidades que tenemos son las siguientes: 
* ## A04:2021 - Diseño Inseguro:
  
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

11. Desactualización de Dependencias:

      **Descripción:** Uso de bibliotecas o frameworks desactualizados y vulnerables.
    
      **Problema de Seguridad:** Puede permitir a los atacantes aprovechar vulnerabilidades conocidas en las dependencias para comprometer la aplicación.

* ## A08:2021 - Fallas en el Software y en la Integridad de los Datos
* 
  ### Ejemplos de esta vulnerabilidad:

1. Fallas en el Software:

      **Inyección de Código (SQL Injection, XSS, etc.):** Estas vulnerabilidades ocurren cuando un atacante puede insertar código malicioso en los datos que se procesan en el lado del servidor o se muestran en el lado del           cliente. Por ejemplo, en una inyección de SQL, un atacante podría manipular las consultas a la base de datos para obtener información no autorizada.

      **Fallas en la Autenticación y Autorización:** Si el software no maneja adecuadamente la autenticación (verificación de la identidad del usuario) y la autorización (control de los permisos de acceso), un atacante           podría ganar acceso no autorizado a áreas protegidas de una aplicación web.

      **Desbordamiento de Búfer:** Estos errores ocurren cuando un programa permite que se escriba más información en un área de memoria de la que puede contener, lo que puede ser explotado por un atacante para ejecutar         código malicioso.

2. Integridad de los Datos:

      **Manipulación de Datos:** Un atacante podría modificar los datos almacenados en una aplicación web para cambiar información crítica, como alterar el contenido de perfiles de usuario, el monto de transacciones o             cualquier otra información sensible.

      **Falta de Validación de Entradas:** Si una aplicación web no valida adecuadamente las entradas del usuario, un atacante podría enviar datos maliciosos que afecten la integridad de la aplicación. Por ejemplo,                 podrían enviar formularios con datos manipulados para realizar acciones no autorizadas.

      **Falta de Encriptación:** La falta de encriptación en la transmisión de datos puede permitir a un atacante interceptar y modificar la información transmitida entre el usuario y el servidor, comprometiendo así la           integridad de los datos.
   

## Crearemos la estructura de carpetas y definir sus nombres.

### Nomenclatura para los reportes diarios: 
dia_mes_año_ReporteDiario
19_02_2024_ReporteDiario

### Tareas a realizar durante la primera semana:


* Mirar como funciona github desktop
* Mirar cómo crear ficheros xml
* Mirar como funcionan y en qué consisten las vulnerabilidades
