<?php 

include("conexion.php");

$nombres = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$email = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['clave'];
$celular = $_POST['telefono'];

$consulta = "INSERT INTO usuarios (nombre_u, apellido_u, email_u, user, pass_u, cel_u) VALUES ('$nombres', '$apellidos', '$email', '$usuario', '$password', '$celular')";

$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
	echo "CLiente no registrado";
}else{
	echo "CLIENTE SE REGISTRO CORRECTAMENTE";
}

 ?>