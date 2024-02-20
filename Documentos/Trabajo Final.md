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

Debería existir un proceso de gestión de parches para:

 - Eliminar dependencias no utilizadas, características innecesarias, componentes, archivos y documentación.

 - Realizar un inventario continuo de las versiones de los componentes tanto del lado del cliente como del servidor (por ejemplo, marcos de trabajo, bibliotecas) y sus dependencias utilizando herramientas como versions, OWASP Dependency Check, retire.js, etc.

 - Monitorear continuamente fuentes como Common Vulnerability and Exposures (CVE) y National Vulnerability Database (NVD) en busca de vulnerabilidades en los componentes.

 - Utilizar herramientas de análisis de composición de software para automatizar el proceso.

 - Suscribirse a alertas por correo electrónico sobre vulnerabilidades de seguridad relacionadas con los componentes que se utilizan.

 - Obtener los componentes únicamente de fuentes oficiales a través de enlaces seguros. Preferir paquetes firmados para reducir la posibilidad de incluir un componente modificado y malicioso (A08:2021-Fallos en la Integridad de Software y Datos).

 - Monitorear las bibliotecas y componentes que no están mantenidos o que no crean parches de seguridad para versiones antiguas. Si no es posible aplicar parches, considerar implementar un parche virtual para monitorear, detectar o proteger contra el problema descubierto.

 - Cada organización debe asegurar un plan continuo para monitorear, clasificar y aplicar actualizaciones o cambios de configuración durante toda la vida útil de la aplicación o el portafolio.


## Mitigación

1. **Implementar un sólido proceso de gestión de parches:**<br>

    - Establecer un proceso de gestión de parches que incluya la eliminación regular de dependencias, características, componentes, archivos y documentación no utilizados para reducir la superficie de ataque.

    - Realizar un inventario continuo de los componentes tanto del lado del cliente como del servidor y de sus dependencias. Utilizar herramientas como OWASP Dependency Check, retire.js u otras soluciones similares para automatizar este proceso. Monitorizar regularmente las Vulnerabilidades Comunes y Expuestas (CVE) y la Base de Datos Nacional de Vulnerabilidades (NVD) en busca de vulnerabilidades en estos componentes. Emplear herramientas de análisis de composición de software para agilizar este esfuerzo. Además, suscribirse a alertas por correo electrónico sobre vulnerabilidades de seguridad relacionadas con los componentes que se utilizan.

    - Adquirir únicamente componentes de fuentes oficiales a través de enlaces seguros, favoreciendo los paquetes firmados para mitigar el riesgo de incluir componentes modificados o maliciosos.

    - Mantener una vigilancia constante sobre las bibliotecas y componentes que no están mantenidos o no proporcionan parches de seguridad para versiones antiguas. Si la aplicación de parches no es factible, considerar la implementación de parches virtuales para monitorear, detectar o protegerse contra las vulnerabilidades identificadas.

    - Establecer un plan continuo para monitorear, clasificar y aplicar actualizaciones o cambios de configuración a lo largo de la vida útil de la aplicación o el portafolio.

2. **Auditorías y pruebas de seguridad regulares:**<br>

    - Realizar auditorías de seguridad regulares y pruebas de penetración para identificar vulnerabilidades en los componentes y abordarlas de manera oportuna.

    - Asegurar que los desarrolladores de software prueben rigurosamente la compatibilidad de las bibliotecas actualizadas, mejoradas o parcheadas para evitar problemas de integración o consecuencias no deseadas.

3. **Medidas de seguridad mejoradas:**<br>

    - Reforzar las medidas de seguridad para detectar y mitigar posibles ataques dirigidos a componentes vulnerables.

    - Emplear sistemas de detección de intrusos (IDS) o sistemas de prevención de intrusiones (IPS) para monitorear y bloquear actividades sospechosas relacionadas con vulnerabilidades en los componentes.

    - Utilizar herramientas automatizadas de escaneo de vulnerabilidades para identificar y remediar vulnerabilidades de manera oportuna.

4. **Educación y concienciación:**<br>

    - Educar a los equipos de desarrollo sobre la importancia de la gestión de vulnerabilidades de componentes y proporcionar capacitación sobre las mejores prácticas para la codificación segura, la aplicación de parches y la gestión de dependencias.

    - Fomentar una cultura de conciencia de seguridad dentro de la organización, enfatizando la responsabilidad compartida de todos los interesados en mantener la seguridad del ecosistema de software.

5. **Evaluación integral de riesgos:** <br>

    - Realizar evaluaciones regulares de riesgos para evaluar el impacto de las vulnerabilidades de los componentes en la postura de seguridad general del sistema. Priorizar los esfuerzos de remediación en función de la gravedad de las vulnerabilidades y el impacto potencial en las operaciones comerciales.

    - Al implementar estas estrategias de mitigación, las organizaciones pueden reducir significativamente el riesgo causado por componentes vulnerables y obsoletos, mejorando la resiliencia de la seguridad de sus aplicaciones web contra la explotación y el acceso no autorizado.



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

- **Controles de aplicaciones:** <br>
Una de las opciones seria mediante controles de capa de la aplicación, de esta forma la aplicación puede verificar que una dirección destino este permitida antes de crear una conexión.

- **Deshabilitar esquemas de URL no utilizados:** <br>
Desactivar esquemas de urls antiguos (como file:///, ftp://), ya que las aplicaciones realizan sus solicitudes utilizando http o https por lo que solo deben permitirse estos patrones de url.

- **Habilitar la autenticación en servicios internos:** <br>
De normal las configuraciones de las bases de datos no requieren autenticación de forma predeterminada. Por lo tanto para proteger la información confidencial, podemos habilitar la autentificación para todos los servicios que estén en nuestra red.

## Docker

Para llevar a cabo este proyecto, se utilizará una imagen Docker basada en Ubuntu Server 23.04. Dentro de esta imagen, se configurará un servidor Apache para alojar una página web donde se podrá recrear el ataque de SSRF (Server-Side Request Forgery). Este ataque permite que se pueda engañar al servidor web para que realice solicitudes desde su propia perspectiva. Esto significa que el atacante puede manipular el servidor para realizar solicitudes a otros sistemas y recursos en la red a los que normalmente no tendría acceso directo. Además, estará equipada con Wireshark para capturar el tráfico de red en el momento del ataque. Wireshark es una herramienta de análisis de paquetes de red que permite visualizar y analizar el tráfico de red que pasa a través de la interfaz de red del sistema.
