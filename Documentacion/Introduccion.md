# índice

1. [Introducción](#introducción)
2. [Inyección](#inyección)
    - [Descripción de diferentes tipos de ataques de inyección](#descripción-de-diferentes-tipos-de-ataques-de-inyección)
    - [Medidas para prevenir ataques de inyección](#medidas-para-prevenir-ataques-de-inyección)
3. [Fallas de Identificación y Autenticación](#fallas-de-identificación-y-autenticación)
    - [Causas comunes de fallas de identificación y autenticación](#causas-comunes-de-fallas-de-identificación-y-autenticación)
    - [Medidas para mitigar fallas de identificación y autenticación](#medidas-para-mitigar-fallas-de-identificación-y-autenticación)
4. [Mariadb](#mariadb)
    - [Ventajas y desventajas de usar Mariadb](#ventajas-y-desventajas-de-usar-mariadb)
    - [Instalacion y configuracion Mariadb](#instalacion-y-configuracion-mariadb)
5. [Docker](#docker)
    - [Características de Docker](#características-de-docker)
    - [Ventajas y desventajas de usar Docker](#ventajas-y-desventajas-de-usar-docker)
    - [Instalacion de Docker](#instalacion-de-docker)

6. [Contenedor Numero 1 Inyección](#contenedor-numero-1-inyección)
    - [Vulnerabilidades CVE Extra](#vulnerabilidades-cve-extra)
    - [Desarrollo de la Vulnerabilidad](#desarrollo-de-la-vulnerabilidad)
    - [Análisis del Contenedor una vez Explotado](#análisis-del-contenedor-una-vez-explotado)
    - [Herramientas Empleadas](#herramientas-empleadas)
7. [Contenedor Numero 2 Fallas de Identificación y Autenticación](#contenedor-numero-2-fallas-de-identificación-y-autenticación)
    

# [Introducción](#índice)


En el siguiente documento se explicará la creación de un contenedor en Docker con los siguientes riesgos del OWASP TOP 10:

- **A03:2021 - Inyección**
- **A07:2021 - Fallas de Identificación y Autenticación**

A continuación se explicarán en profundidad los riesgos mencionados, cómo explotarla y cómo mitigarla.


# [Inyección](#índice)

Es un riesgo de inserción de código malicioso en una entrada de datos para obtener acceso no autorizado o realizar acciones no deseadas.
<p align="center">
<img  alt="drawing" width=600" height="200" src="https://www.indusface.com/wp-content/uploads/2019/08/OWASP-Part1-4.png" />
</p>

## [Descripción de diferentes tipos de ataques de inyección:](#índice)

- **SQL Injection:** Se insertan comandos SQL maliciosos en las entradas de datos de una aplicación web. 

- **XSS:** Este tipo de ataque implica la inserción de scripts maliciosos en páginas web accesibles por otros usuarios.

- **Command Injection:** Los atacantes insertan comandos del sistema operativo en entradas de datos de aplicaciones para ejecutar comandos arbitrarios en el servidor. 

- **LDAP:** Los atacantes pueden manipular consultas LDAP para obtener acceso no autorizado a la información para realizar acciones no deseadas en el sistema.

- **XPath Injection:** Se dirige a sistemas que utilizan expresiones XPath para realizar consultas en documentos XML.

## [Medidas para prevenir ataques de inyección:](#índice)

Para prevenir los ataques de inyección podemos emplear las siguientes medidas:

- **Validación de Entradas de Usuario:** Valida y filtra todas las entradas de usuario.

- **Parámetros Preparados:** Utiliza consultas parametrizadas.

- **Escapado de Caracteres:** Escapa los caracteres especiales antes de incluirlos en consultas SQL.

- **Validación de Datos de Formulario:** Valida y filtrar los datos del formulario. 

- **Limitar Privilegios:** Limitar los permisos de los usuario y servicios para que tengan los privilegios mínimos necesarios para realizar sus funciones.

- **Actualizaciones y Parches:** Manténer actualizados todos los software.

- **Seguridad en la Capa de Red:** Utilizar firewalls y sistemas de detección de intrusiones para monitorear y filtrar el tráfico malicioso.

- **Educación:** Educar a las perosnas sobre las mejores prácticas de seguridad.

# [Fallas de Identificación y Autenticación](#índice)

Las fallas de identificación y autenticación es un riesgo relacionado con la gestión de credenciales de usuario y los procesos de verificación de identidad en sistemas informáticos. Este riesgo permite a los atacantes acceder de forma no autorizada a datos sensibles.
<p align="center">
<img  alt="drawing" width="250" height="200" src="https://www.grupocibernos.com/hubfs/blog-error%20de%20autenticaci%C3%B3n.jpg" />
</p>

## [Causas comunes de fallas de identificación y autenticación](#índice)

- **Contraseñas Débiles:** Las contraseñas débiles.

- **Falta de Autenticación Multifactor (MFA):** La autenticación multifactor agrega una capa adicional de seguridad al no tener hay menos seguridad.

- **Reutilización de Contraseñas:** Si los usuarios utilizan la misma contraseña para múltiples servicios, el compromiso de una sola cuenta puede poner en riesgo todas las demás cuentas asociadas con esa contraseña.

- **Falta de Protección contra Ataques de Fuerza Bruta:** Los atancates que usan fuerza bruta intentaran adivinar las contraseñas probando una gran cantidad de combinaciones posibles. 

- **Ataques de Phishing:** Los atancates que usan phishing utilizan técnicas de ingeniería social para engañar a los usuarios para divulga informacion sensible.

- **Falta de Monitoreo y Detección de Anomalías:** Permite que los atacantes accedan a sistemas sin ser detectados.

- **Falta de Educación del los Usuarios:** No informar a los usuarios de las mejores prácticas de seguridad.

 ## [Medidas para mitigar fallas de identificación y autenticación:](#índice)

- **Contraseñas Seguras:** Establecer requisitos mínimos de complejidad de contraseña (longitud, caracteres especiales, combinación de letras mayúsculas y minúsculas) 

- **Autenticación Multifactor:** Implementar la autenticación multifactor para agregar una capa adicional de seguridad.
  
- **Gestión de Sesiones:** Implementar mecanismos para gestionar adecuadamente el tiempo de conexion de los usuarios.
  
- **Protección contra Ataques de Fuerza Bruta:** Bloqueo de cuenta después de varios intentos de inicio de sesión fallidos.

- **Monitoreo de Actividad de Usuario:** Implementar sistemas de monitoreo para detectar y responder a actividades de usuarios anómalas o maliciosas.

- **Educación del Usuario:** Educar a los usuarios sobre prácticas seguras de autenticación.

- **Actualizaciones y Parches:** Mantener actualizados los sistemas y aplicaciones.
  
# [Mariadb](#índice)

 **¿Qué es Mariadb?**
 
MariaDB  es una bases de datos relacional de código abierto que ofrece poder almacenar y manipular datos de manera eficiente.

 <p align="center">
<img  alt="drawing" width="320" height="200" src="https://www.wpsysadmin.com/wp-content/uploads/2021/07/mariadb.png" />
</p>

## [Ventajas y desventajas de usar Mariadb](#índice)

 **Ventajas:**

- **Compatibilidad con MySQL:** Es compatible con la mayoría de las aplicaciones y herramientas diseñadas para MySQL. 

- **Código abierto:** Es un proyecto de código abierto.


- **Comunidad activa:** Cuenta con una comunidad de usuarios.


- **Compatibilidad con estándares:** MariaDB cumple los  estándares SQL.

 **Desventajas:**
- **Fragmentación de la comunidad:** Diferentes tipos opiniones dentro de la comunidad de usuarios, dificultad en la colaboración dentro de la comunidad.

# [Instalacion y configuracion Mariadb](#índice)
Para instalar tenemos que seguir los siguientes pasos:

**1.Actulizamos el sistema:**

          sudo apt-get update
     
          sudo apt-get upgrade
         
**2.Instalacion Mariadb:**

         sudo apt install mariadb-server
        
**3.Para cinfigurar ponemos el siguiente comando que nos permite poner contraseña a root de Mariadb:**

         sudo mysql_secure_installation

# [Docker](#índice)

 **¿Qué es Docker?**

Docker es una plataforma de código abierto diseñada para facilitar la creación, implementación y ejecución de aplicaciones dentro de contenedores. Los contenedores son entornos de software ligeros y portátiles que encapsulan todo lo necesario para que una aplicación se ejecute, incluidas las bibliotecas, dependencias y otros componentes, lo que les permite funcionar de manera consistente en cualquier entorno.
<p align="center">
<img  alt="drawing" width="320" height="200" src="https://d1.awsstatic.com/acs/characters/Logos/Docker-Logo_Horizontel_279x131.b8a5c41e56b77706656d61080f6a0217a3ba356d.png" />
</p>

  ## [Características de Docker](#índice)

- **Portabilidad:** El contenedor Docker podremos desplegarlo en cualquier otro sistema que soporte esta tecnología.

- **Ligereza:** Los contenedores Docker son ligeros y rápidos de crear, iniciar y detener.

- **Aislamiento:** Cada contenedor tiene su propio sistema de archivos, espacio de nombres de red y espacio de nombres de   proceso, lo que evita conflictos entre aplicaciones.
 
- **Reutilización de Imágenes:** Docker utiliza un modelo de imágenes y contenedores que fomenta la reutilización y compartición de imágene.

## [Ventajas y desventajas de usar Docker](#índice)

 **Ventajas:**

- **Portabilidad:** Los contenedores Docker proporcionan una forma fácil y rápida de empaquetar una aplicación y todas sus dependencias en un entorno aislado.


- **Aislamiento:** Docker proporciona un alto nivel de aislamiento entre contenedores cada contenedor tiene su propio sistema de archivos.


**Desventajas:** 

- **Comunidad Fragmentada:** Diferentes tipos opiniones dentro de la comunidad de usuarios, dificultad en la colaboración dentro de la comunidad.

- **Rendimiento:** El rendimiento de la virtualización a nivel de contenedor en menor que las aplicaiones fuera del contenedor.


# [Instalacion de Docker](#índice)
Para instalar tenemos que seguir los siguientes pasos:

**1.Actulizar el sistema:**


          sudo apt-get update
     
          sudo apt-get upgrade


**2.Añadir clave GPC de docker:**

         curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

**3.Añadir  repositorio oficial de docker:**

         sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable
    
**4.Instalacion docker:**

         sudo apt install docker-ce docker-ce-cli containerd.io



# [Contenedor Numero 1 Inyección](#índice)

El sistema operativo utilizado para el desarrollo de este primer contenedor es Ubuntu Server XX. La vulnerabilidad elegida ha sido SQL Injection. Es por ello que el desarrollo de esta estará basado en un formulario cuyos campos serán vulnerables a este tipo de ataque. 

<p align="center">
<img  alt="drawing" width="350" height="200" src="https://blogs.zeiss.com/digital-innovation/de/wp-content/uploads/sites/2/2020/05/201909_Security_SQL-Injection_1.png" />
</p>

## [Vulnerabilidades CVE Extra](#índice)

Para comenzar con la búsqueda de las CVEs añadidas como extra en la máquina, hay que tener en cuenta los siguientes puntos:
- **La CVE debe ser del año 2023 o posterior**
- **La CVE debe ser reproducible**
- **La CVE debe tener un exploit desarrollado**

CVEs elegidas para su reproducción:

- **CVE-2023-37629**

Esta vulnerablidad permite al usuario subir archivos maliciosos con el fin de obtener acceso al servidor, por ejemplo un script en php que ejecute una reverse shell.

**Mitigación**

Para mitigar esta vulnerabilidad lo único que debemos hacer es sanitizar la subida de archivos, permitiendo únicamente la subida de imágenes y nada más.

- **CVE-2023-32784**

Esta vulnerablidad permite al usuario dumpear la clave maestra de KeePass en texto claro, permitiendo así un posible escalado de privilegios.

**Mitigación**

Para mitigar esta vulnerabilidad lo único que debemos hacer es actualizar la versión.

## [Desarrollo de las Vulnerabilidades](#índice)

1.Atacante hace fuzzing y encuentra el panel de inicio de cerdos.

<p align="center">
<img  alt="drawing" width="350" height="200" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/gobuster.png" />
</p>

2.Entra en la pagina login y usa la herramienta burpsuite para hacer un ataque de fuerza bruta.
<p align="center">
<img  alt="drawing" width="550" height="300" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/intruder1.png" />
</p>
<p align="center">
<img  alt="drawing" width="550" height="300" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/intruder2.png" />
</p>

3.Despues de saltar el login el atacante sube un archivo php en la pagina web.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/addPig1.png" />
</p>

4.Luego el atacante tiene que ir updatefolder donde esta su archvio php y lo ejecuta para hacer una Reverse Shell.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/uploadfolder.png" />
</p>

5.Nos ponemos con el netcat escuchando en el puerto 4444 para entrar al sistema.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/www-data.png" />
</p>

6.Hemos entrado al sistema con el usuario www-data miramos lo que hay con el comando ls , hacemos otro ls para ver lo que hay dentro de la carpeta compartidos por ultimo hacemos un cat para ver lo que hay en datos.txt .

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/way2.png" />
</p>

7.Vamos a la pagina banco de credenciales.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/bancoCredencialesPrivado.png" />
</p>

8.Hacemos un ataque sql injection a la pagina banco de credenciales.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/loginBancoSQLi.png" />
</p>

9.Nos saldra los nombres de usuarios con sus contraseñas incriptadas en base64.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/finalCredentials.png" />
</p>

10.Vamos a desencriptar las contraseñas encriptadas en base 64.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/base64Decode.png" />
</p>

11.Entramos en el usuario Pastorpaco , hacemos ls para ver lo que hay dentro del usuario dentro hay un zip incriptado y una flag. Abrimos la flag del usuario.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/flagUser.png" />
</p>

12.Usamos jhon the ripper para romper la contraseña de credencialesseguras.zip

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/john.png" />
</p>

13.Cuando rompamos la contraseña abrimos el zip y vemos lo que hay dentro.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/granjero.txt.png" />
</p>


14.Miramos que grupos esta el usuario granjero
<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/groups.png" />


15.Hacemos sudo su y entramos en el usuario root.
</p>

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/getRoot.png" />
</p>

16. Por ultimo buscamos la flag de root.

<p align="center">
<img  alt="drawing" width="550" height="400" src="https://github.com/Dani-ITB24/Proyecto-Final/blob/Grupo2/Documentacion/images/flagRoot.png" />
</p>


## [Análisis del Contenedor una vez Explotado](#índice)

### [Herramientas Empleadas](#índice)

# [Contenedor Numero 2 Fallas de Identificación y Autenticación](#índice)


