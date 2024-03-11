# Dockerfile para el servicio VSFTP
FROM ubuntu:latest

RUN apt-get update && apt-get install -y vsftpd
RUN echo "local_enable=YES\nwrite_enable=YES\nchroot_local_user=YES\nallow_writeable_chroot=YES" > /etc/vsftpd.conf

EXPOSE 20 21

CMD ["/usr/sbin/vsftpd", "/etc/vsftpd.conf"]
