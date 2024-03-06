<?php

$url = $_GET['url'];

// Realiza una solicitud HTTP
$response = file_get_contents($url);

echo $response;
?>