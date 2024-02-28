<?php
// Obtener la URL proporcionada por el usuario
$url = $_GET['url'];

echo "tu url es: " .$url;

// Realizar una solicitud HTTP a la URL proporcionada
$response = file_get_contents($url);

// Imprimir la respuesta
echo $response;
?>