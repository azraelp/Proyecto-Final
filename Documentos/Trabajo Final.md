# Introducción

En este documento sé explica la creación de una máquina Docker que contendrá las vulnerabilidades A06 la cual se aprovecha de los componentes vulnerablesy desactualizados y A10 que permite que 
un atacante coaccione a la aplicación para que envíe una solicitud falsificada a un destino inesperado, listadas en el OWASP Top Ten.

Se profundizará en la explicación de cada una de estas vulnerabilidades, comprendiendo su funcionamiento, cómo pueden ser explotadas y en qué campos específicos se aplican. Además, se detallará
cómo implementar estas vulnerabilidades en una máquina Docker.


## A06:2021 - Componentes Vulnerables y Desactualizados
Esta vulnerabilidad ocupa el sexto puesto en el Top Ten de OWASP, se aprovecha del riesgo asociado con el uso de componentes de software desactualizados o con vulnerabilidades conocidas en aplicaciones web. Para mitigar esta vulnerabilidad, es necesario que los desarrolladores implementen un proceso de gestión de dependencias y actualizaciones de software. Para realizar este seguimiento se deberán aplicar parches de seguridad de manera periódica y estar al día con las vulnerabilidades que puedan afectar el software. El uso de herramientas automáticas de escaneo de vulnerabilidades puede ayudar a detectar y detener el acceso de forma malintencionada al servidor.


## A06:2021 - Componentes Vulnerables y Desactualizados
