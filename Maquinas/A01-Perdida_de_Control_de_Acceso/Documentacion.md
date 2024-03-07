
# VM1 - Pérdida de Control de Acces

## Descripcion del entorno
En el entorno habra estan los servicios de wordpress, ssh y ftp, que el una web secundaria que para poder acceder se presentara un web donde requerira un login para poder acceder. Una vez haya conseguido login podra visualizar la contrasena actual del usuario,  porque visualizara un fichero donde estan las notas del tecnico. Este usuario podra realizar una conexion mediante ftp y que solo podra visualizar la carpeta de la web debera realizar un reverseshell. que despues tendra que hacer movimiento laterarl y a otro usuario que tenga la posibilidad de acceder a root.

## Servicios implicados

Los servicios que estaran activos en la vm son:
 - **SSH OpenSSH_8.9p1:**  Se utiliza para el acceso del administrador, y un usario tecnico sin permisos de sudo
 - **HTTP Apache/2.4.52:** se podra ver un wordpress necesitara un login para visualizar el contenido
 - **FTP vsftpd 3.0.3:** se usara para un usuario externo que solo tendra acceso al directorio de la web de wordpress.
 - **MariaDB 10.6.16:** aqui solo se aloja la base de datos del wordpress



# Notas
usuario sftp con unico acceso a la carpeta de wordpress 
user: turismo-bcn
pass: 0sftp-2024.user!



# Comandos ejecutados para la creacion del entorno

## SFTP
**Creacion del grupo sftp:**
sudo groupadd sftp-users

**Creacion del usuario:**
sudo useradd --shell /bin/bash turismo-bcn
sudo usermod -a -G www-data turismo-bcn
sudo usermod -a -G sftp-users turismo-bcn
sudo passwd turismo-bcn
contrasenya turismo

**Configuracion sshd_conf**
se agrega al final del fichero esta configuracion

Match Group sftp_users
  ---X11Forwarding no
  ---AllowTcpForwarding no
  ---ChrootDirectory /var/www/html/wordpres
  ---ForceCommand internal-sftp
