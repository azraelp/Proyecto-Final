# Introducción

Este documento contiene toda la informacion relacionada con el proyecto final del curso de espezializacion de ciberseguridad impartido por Grail Cyber Tech. Los autores de este documento son: *Jordi vila, Genis Tineo y Joan-Maria Galera.*

En nuestro caso tenemos asignadas las siguientes vulnerabilidades:

 - A05:2021 - Configuración de Seguridad Incorrecta
 - A09:2021 - Fallas en el Registro y Monitoreo

# A05:2021 - Configuración de Seguridad Incorrecta

 Esta vulnerabilidad se refiere a errores o fallos en la configruacion del servidor, la red o la aplicacion informatica. Esto hace que la apliacion se vulnerable si:

- No asegurar adecuadamente todas las partes de la tecnología que se está utilizando o no configurar correctamente quién puede acceder a los servicios en la nube.
- Activar o instalar cosas que no se necesitan, como puertos, servicios o cuentas que no se usan.
- Usar las cuentas predeterminadas con las contraseñas que vienen de fábrica y no cambiarlas.
- Mostrar demasiada información en los mensajes de error, lo que puede ayudar a los atacantes a entender cómo funciona el sistema.
- No usar las últimas medidas de seguridad disponibles en sistemas actualizados.
- No configurar correctamente la seguridad en diferentes partes del sistema, como en los servidores o las bases de datos.
- No enviar la información necesaria para proteger el sistema a través del servidor.
- Usar software que no está actualizado o que tiene vulnerabilidades conocidas, lo que hace que sea más fácil para los atacantes ingresar al sistema.
  
Para  prevenirlo podemos usar varios metodos (mejor si se utilizan todos si son aplicables):
- Tener solo los servicios,puertos y programas que se utilicen
- Mantener todas las partes actualizadas al dia
- Mantenerse atento si aparecen vulnerabilidades en el programa utilizado
- Algún elemento que se encargue de verificar si las configuraciones están correctamente aplicadas
- Asegurar que las credenciales sean diferentes para cada servicio i programa
- Para los entornos de desarollo tener estructuras idénticas  para facilitar la detección de falloS de seguridad con diferentes contraseñas
- Asegurarse que los posibles clientes cumplan con ciertas directivas de seguridad


# A09:2021 - Fallas en el Registro y Monitoreo

Esta vulnerabilidad se refiere a la falta de un registro y monitoreo adecuados en un sistema informático o red. Esto significa que no se están registrando adecuadamente eventos importantes, como intentos de acceso no autorizado o cambios en la configuración del sistema. Además, puede indicar que no se están monitoreando de manera efectiva los registros existentes para detectar posibles anomalías o actividades sospechosas. Esta falta de registro y monitoreo puede dificultar la detección temprana de ataques cibernéticos o actividades maliciosas, lo que aumenta el riesgo de compromiso de la seguridad del sistema.
