## Objetivo Maquina2
Esta maquina va ser diseñanada para explotar la vulneravilidad **A09:2021 – Security Logging and Monitoring Failures**.

## Plantemiento
Para ello vamos a alojar varios servidores, apache, telnet y una base de datos utilizando mySQL. El servidor mySQL tendrá unas credenciales débiles. Aprovechando que la base de datos tiene unas credenciales débiles y no tiene un sistema de monitoreo y de logs podemos hacer un ataque de fueza bruta contra la base de datos. Dentro de la base de datos se encontraran diferentes usuarios con sus respectivas contraseñas hasheadas. Una vez se obtienen las credenciales, se puede acceder dentro de la máquina. Dentro de la máquina se hará un movimiento lateral y una vez hecho ya se podrán escalar privilegios.

## Configuración del entorno
Para ello, vamos a crear un contenedor Docker con el sistema operativo Ubuntu Server. Los servicios que vamos a utilizar son:

![](/Assets/M2.png)

- **TELNET**: *Telnet 0.17-42* --> Para administracion remota.
- **HTTP**: *Apache 2.4.58* --> Para el servidor web.
- **MySQL**: *MySQL 8.3* --> Para la base de datos.


## Pasos a seguir

1. **Instalación de Docker**
2. **Creacioon del Dockerfile**