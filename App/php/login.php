<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if (empty($usuario) || empty($clave)) {
        $_SESSION['error_message'] = 'Por favor, ingresa tu usuario y contraseña.';
        header('Location: ../vistas/login.php');
        exit();
    }

    $query = "SELECT id_admin, usuario, clave FROM admin WHERE usuario = ?";
    $stmt = mysqli_prepare($conexion, $query);

    if (!$stmt) {
        $_SESSION['error_message'] = 'Error interno del servidor. Inténtalo de nuevo más tarde.';
        header('Location: ../vistas/login.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $usuario);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        if (password_verify($clave, $fila['clave'])) {
            $_SESSION['id_admin'] = $fila['id_admin'];
            $_SESSION['usuario'] = $fila['usuario'];
            // Redirigir al panel de control o a la página principal
            header('Location: /App/index.php'); // Redirige a la página principal
            exit();
        } else {
            $_SESSION['error_message'] = 'Contraseña incorrecta.';
        }
    } else {
        $_SESSION['error_message'] = 'Usuario no encontrado.';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    header('Location: ../vistas/login.php');
    exit();
}

// Si se accede directamente a este archivo sin POST, redirigir al login
header('Location: ../vistas/login.php');
exit();

?>