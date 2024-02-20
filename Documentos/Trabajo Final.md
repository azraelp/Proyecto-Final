# Introducción

En este documento sé explica la creación de una máquina Docker que contendrá las vulnerabilidades A06 la cual se aprovecha de los componentes vulnerablesy desactualizados y A10 que permite que un atacante coaccione a la aplicación para que envíe una solicitud falsificada a un destino inesperado, listadas en el OWASP Top Ten.

Se profundizará en la explicación de cada una de estas vulnerabilidades, comprendiendo su funcionamiento, cómo pueden ser explotadas y en qué campos específicos se aplican. Además, se detallará cómo implementar estas vulnerabilidades en una máquina Docker.


## A06:2021 - Componentes Vulnerables y Desactualizados

### ¿Qué es esta vulnerabilidad (Vulnerable and Outdated Components)?

Esta vulnerabilidad ocupa el sexto puesto en el Top Ten de OWASP, se aprovecha del riesgo asociado con el uso de componentes de software desactualizados o con vulnerabilidades conocidas en aplicaciones web. Para mitigar esta vulnerabilidad, es necesario que los desarrolladores implementen un proceso de gestión de dependencias y actualizaciones de software. Para realizar este seguimiento se deberán aplicar parches de seguridad de manera periódica y estar al día con las vulnerabilidades que puedan afectar el software. El uso de herramientas automáticas de escaneo de vulnerabilidades puede ayudar a detectar y detener el acceso de forma malintencionada al servidor.

### ¿Cómo funciona?

Es probable que tengas esta vulnerabilidad si:

 - No conoces las versiones de todos los componentes que utilizas (tanto del lado del cliente como del servidor). Esto incluye los componentes que utilizas directamente, así como las dependencias anidadas.

 - El software es vulnerable, no es compatible o está desactualizado. Esto incluye el sistema operativo, el servidor web/aplicación, el sistema de gestión de bases de datos (DBMS), las aplicaciones, las API y todos los componentes, entornos de tiempo de ejecución y bibliotecas.

 - Regularmente no buscas vulnerabilidades y no te suscribes a boletines de seguridad relacionados con los componentes que utilizas.

 - No solucionas ni actualizas la plataforma subyacente, los frameworks y las dependencias en un sistema basado en riesgos. Esto suele ocurrir en entornos donde el parcheo es una tarea mensual o trimestral bajo control de cambios, lo que deja a las organizaciones expuestas durante días o meses a vulnerabilidades ya corregidas.

 - Los desarrolladores de software no prueban la compatibilidad de las bibliotecas actualizadas, mejoradas o parcheadas.

 - No aseguras las configuraciones de los componentes (ver A05:2021-Mala configuración de seguridad).

## Prevención



## Mitigación




## A10:2021 - Falsificación de Solicitudes del Lado del Servidor

### ¿Qué es SSRF?

Server-Side Request Forgery (SSRF) es una vulnerabilidad de la seguridad web que permite al atacante manipular una aplicación para que realice solicitudes no autorizadas a recursos internos o externos a través del servidor en que se ejecuta la aplicación.

### ¿Cómo funciona?

El ataque funciona explotando la capacidad de una aplicación para realizar solicitudes a recursos externos, como URLs, servicios web, etc. El ataque se desglosaría en estas fases:

1. **Identificación de la vulnerabilidad:** <br>
El atacante encuentra la aplicación web que tiene la vulnerabilidad SSRF.
   
2. **Manipulación de las solicitudes:** <br>
El atacante introduce los datos manipulados (como urls maliciosos), en campos que la aplicación utiliza para hacer solicitudes a recursos externos.

3. **Uso de Funcionalidades Internas:** <br>
En esta fase el atacante puede redirigir las solicitudes hacia recursos internos como bases de datos o servicios internos a los cuales normalmente no debería tener acceso. 

4. **Escaneo de puertos y redirección:** <br>
En este punto el atacante puede escanear los puertos internos que hay en la red o puede redigir las solicitudes a servicios especificos para realizar acciones maliciosas.

5. **Acceso a recursos de la nube:** <br>
Si la aplicación tiene la capacidad de interactuar con servicios que hay en nube, el atacante podrá aprovechar y realizar otras acciones maliciosas.

6. **Ataques a servicios internos:** <br>
Por último el atacante obtendrá el control para lanzar ataques contra otros servicios internos.

## Prevención
El SSRF es un ataque que se centra en atacar los sistemas internos que son inaccesibles desde la red externa. Así que principalmente nos centraremos en vigilar las peticiones que se solicitan al servidor, para ello tenemos estas medidas de prevención: 

- **Uso de whitelist:** <br>
Utilizar una whitelist con los dominios y direcciones IP permitidas para que la aplicación puede realizar solicitudes sin ningún tipo de problema.

- **Monitorio continuo:** <br>
Establecer un sistema de monitoreo continuo para detectar patrones inusuales de solicitudes que podrían indicar un posible ataque de SSRF.

- **Actualizaciones:** <br>
Mantener actualizados las aplicaciones y todas sus dependencias para mitigar posibles ataques.

- **Limitación de privilegios:** <br>
Restringir los privilegios de las solicitudes realizadas por la aplicación.

- **Validación de entradas:** <br>
Validar adecuadamente todas las entradas de usuario que la aplicación utiliza para formar solicitudes. 


## Mitigación


