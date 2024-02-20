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

2. Autenticación y Autorización Inadecuadas:

**Descripción:** Implementación débil de procesos de autenticación y autorización.
**Problema de Seguridad:** Puede permitir el acceso no autorizado o eludir controles de acceso, permitiendo a usuarios malintencionados realizar acciones sin ser detectados.

3. Falta de Validación de Datos:

**Descripción:** No se valida o filtra adecuadamente la entrada del usuario.
**Problema de Seguridad:** Exposición a ataques como inyección de código, donde un atacante podría insertar datos maliciosos para manipular el comportamiento de la aplicación.

4. Deficiencias en la Gestión de Sesiones:

**Descripción:** Sesiones de usuario mal gestionadas, como almacenar información sensible en cookies sin cifrar.
**Problema de Seguridad:** Puede resultar en la interceptación de sesiones, permitiendo a un atacante acceder a la cuenta de otro usuario.

5. Falta de Encriptación:

**Descripción:** Comunicaciones no seguras entre el navegador y el servidor.
**Problema de Seguridad:** La información transmitida podría ser interceptada, comprometiendo la confidencialidad e integridad de los datos.

6. Desactualización de Dependencias:

**Descripción:** Uso de bibliotecas o frameworks desactualizados y vulnerables.
**Problema de Seguridad:** Puede permitir a los atacantes aprovechar vulnerabilidades conocidas en las dependencias para comprometer la aplicación.

  
* ## A08:2021 - Fallas en el Software y en la Integridad de los Datos

Crearemos la estructura de carpetas y definir sus nombres.

### Nomenclatura para los reportes diarios: 
dia_mes_año_ReporteDiario
19_02_2024_ReporteDiario

### Tareas a realizar durante la primera semana:


* Mirar como funciona github desktop
* Mirar cómo crear ficheros xml
* Mirar como funcionan y en qué consisten las vulnerabilidades
