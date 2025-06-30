<?php

$server = "localhost";
$user = "root";
$password = "";
$bd = "appsistema";

$port = 3307;
$conexion = mysqli_connect($server, $user, $password, $bd, $port);

if (!$conexion) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Error al conectar con la base de datos: ' . mysqli_connect_error()]);
    exit();
}

?>