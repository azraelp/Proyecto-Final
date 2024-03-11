## Desafío WordPress (RCE - Ejecución Remota de Código):

- Objetivo: Explotar una vulnerabilidad en un plugin de WordPress para obtener acceso al contenedor.
- Pista: “El plugin ‘File Manager’ parece estar desactualizado. ¿Podrías encontrar una forma de aprovecharlo?”
- Solución: Los participantes deben buscar vulnerabilidades conocidas en la versión desactualizada del plugin y explotar una para ejecutar código arbitrario.

## Desafío MySQL (SQL Injection):

- Objetivo: Realizar una inyección SQL para acceder a datos no autorizados en la base de datos MySQL.
- Pista: “La aplicación web no valida correctamente las entradas del usuario. ¿Qué pasaría si intentas un ‘OR 1=1’?”
- Solución: identificar un punto de entrada para la inyección SQL y recuperar la bandera de una tabla oculta.

## Desafío SSHD (Brute Force / Clave SSH):

- Objetivo: Acceder al servicio SSH utilizando una configuración débil.
- Pista: “El administrador tiende a usar contraseñas simples y las recicla. ¿Has probado ‘admin123’?”
- Solución: intentar un ataque de fuerza bruta o encontrar una clave SSH pública en otro servicio que les permita acceder.

## Desafío VSFTPd (Backdoor / Vulnerabilidad):

- Objetivo: Explotar una vulnerabilidad en el servicio VSFTPd para obtener un shell en el contenedor.
- Pista: “Se rumorea que la versión 2.3.4 tiene una puerta trasera. ¿Será cierto?”
- Solución: investigar y explotar la vulnerabilidad conocida en la versión específica de VSFTPd para ganar acceso.

## Desafío Crontab (Escalado de Privilegios):

- Objetivo: Modificar un script de cron para escalar privilegios dentro del contenedor.
- Pista: “El script de limpieza ejecutado por cron tiene permisos de escritura para todos. ¿Podrías hacer que haga algo más interesante?”
- Solución: modificar el script para que ejecute un comando que les otorgue acceso a la bandera protegida.# Dillinger
