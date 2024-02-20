

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



 

