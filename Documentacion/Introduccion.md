

# Introducción
En esta documentacion  sé explicara  la creación de una máquina Docker que tiene la vulnerabilidad  injection  la cual se aprovecha de las entradas del usuario y auntetificacion
que se aprovecha las poloticas debiles de contraseña.

En la documentacion se explicara mas en profundidad las vuldenabilidades , como usar la vulnerabilidad y explotarla al maximo.


# A03:2021 - Inyección	

## Que es Injection?

 Es un ataque que implica la inserción de código malicioso en una entrada de datos para manipular el comportamiento de un sistema y obtener acceso no autorizado o realizar acciones no deseadas.

 Diferentes tipos de ataques Injection:

-**SQL Injection:** Se insertan comandos SQL maliciosos en las entradas de datos de una aplicación web,. Esto permte a los  atacantes poder utilizar esto para manipular la base de datos, obtener información confidencial o incluso eliminar datos.

-**XSS:** Este tipo de ataque implica la inserción de scripts maliciosos en páginas web accesibles por otros usuarios.

-**Command Injection:** Los atacantes insertan comandos del sistema operativo en entradas de datos de aplicaciones para ejecutar comandos arbitrarios en el servidor. 

-**LDAP:** Los atacantes pueden manipular consultas LDAP para obtener acceso no autorizado a la información para realizar acciones no deseadas en el sistema.

-**XPath Injection:** Se dirige a sistemas que utilizan expresiones XPath para realizar consultas en documentos XML.

## Prevenir ataques de injection
Para prevenir los ataques de inyección aqui que tener algunas medidas de las siguientes medidas:


-**Validación de Entradas de Usuario:** Valida y filtra todas las entradas de usuario.

-**Parámetros Preparados:** Utiliza parámetros preparados o consultas parametrizadas en lugar de concatenar cadenas para construir consultas SQL.

-**Escapado de Caracteres:** Escapa los caracteres especiales antes de incluirlos en consultas SQL u otras estructuras de lenguajes de programación para evitar que sean interpretados como parte de un comando malicioso.

-**Validación de Datos de Formulario:** Valida y filtra los datos de los formularios antes de procesarlos en el servidor. 

-**Limitar Privilegios:** Asegúrate de que las cuentas de usuario y los servicios tengan los privilegios mínimos necesarios para realizar sus funciones.

-**Actualizaciones y Parches:** Mantén actualizados todos los software y frameworks utilizados en tu aplicación para asegurarte de que se hayan corregido las vulnerabilidades conocidas.

-**Seguridad en la Capa de Red:** Utiliza firewalls y sistemas de detección de intrusiones para monitorear y filtrar el tráfico malicioso que podría contener intentos de ataques de inyección.

-**Educación y Concienciación:** Capacita a los desarrolladores, administradores de sistemas y usuarios finales sobre las mejores prácticas de seguridad.

# A07:2021 - Fallas de Identificación y Autenticación

Las fallas de identificación y autenticación se refieren a problemas relacionados con la gestión de credenciales de usuario y los procesos de verificación de identidad en sistemas informáticos. Estas fallas pueden permitir a los atacantes acceder de forma no autorizada a sistemas, datos o recursos protegidos.

## Causas comunes de fallas de identificación y autenticación:

- **Contraseñas Débiles:** Las contraseñas débiles, como "123456" o "password", son vulnerables.

- **Falta de Autenticación Multifactor (MFA):** La autenticación multifactor agrega una capa adicional de seguridad al requerir que los usuarios proporcionen más de un factor de autenticación para verificar su identidad.

- **Reutilización de Contraseñas:** Si los usuarios utilizan la misma contraseña para múltiples servicios, el compromiso de una sola cuenta puede poner en riesgo todas las demás cuentas asociadas con esa contraseña.

- **Falta de Protección contra Ataques de Fuerza Bruta:** Los ataques de fuerza bruta intentan adivinar las contraseñas probando una gran cantidad de combinaciones posibles. 

- **Ataques de Phishing:** Los ataques de phishing utilizan técnicas de ingeniería social para engañar a los usuarios y hacer que divulguen sus credenciales de inicio de sesión.

- **Falta de Monitoreo y Detección de Anomalías:** La falta de sistemas de monitoreo y detección de anomalías puede hacer que las actividades de autenticación maliciosas pasen desapercibidas, permitiendo que los atacantes accedan a sistemas sin ser detectados.

- **Falta de Educación del Usuario:** Los usuarios pueden no estar al tanto de las mejores prácticas de seguridad, como la importancia de utilizar contraseñas seguras y no compartir sus credenciales con otros.

 ## Mitigar de fallas de identificación y autenticación:

-Contraseñas Seguras: Fomenta el uso de contraseñas seguras entre los usuarios. Esto implica establecer requisitos mínimos de complejidad de contraseña (longitud, caracteres especiales, combinación de letras mayúsculas y minúsculas, etc.) y educar a los usuarios sobre la importancia de evitar contraseñas fáciles de adivinar.

-Autenticación Multifactor (MFA): Implementa la autenticación multifactor para agregar una capa adicional de seguridad. Esto puede incluir el uso de códigos de verificación enviados a dispositivos móviles, tokens de seguridad físicos o biométricos, además de las credenciales de usuario estándar.

-Gestión de Sesiones: Implementa mecanismos para gestionar adecuadamente las sesiones de usuario, como tiempos de expiración de sesión, cierre de sesión automático después de períodos de inactividad y la capacidad de cerrar sesión activamente desde múltiples dispositivos.

-Protección contra Ataques de Fuerza Bruta: Implementa medidas para proteger contra ataques de fuerza bruta, como bloqueo de cuentas después de varios intentos de inicio de sesión fallidos, implementación de reCAPTCHA o CAPTCHA, y uso de mecanismos de detección de anomalías para identificar patrones de actividad sospechosa.

-Monitoreo de Actividad de Usuario: Implementa sistemas de monitoreo para detectar y responder a actividades de usuario anómalas o maliciosas. Esto puede incluir la detección de intentos de inicio de sesión desde ubicaciones geográficas inusuales, patrones de acceso inusuales o intentos repetidos de autenticación fallidos.

-Educación del Usuario: Educa a los usuarios sobre prácticas seguras de autenticación, como no compartir contraseñas, evitar el uso de la misma contraseña en múltiples servicios y estar atentos a los intentos de phishing y otros ataques de ingeniería social.

-Actualizaciones y Parches: Mantén actualizados los sistemas y aplicaciones para asegurarte de que se hayan corregido las vulnerabilidades conocidas relacionadas con la autenticación y la gestión de identidades.




 

