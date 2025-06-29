<?php

require_once 'conexion.php';

header('Content-Type: application/json');

// Function to get all users
function getUsers($conexion) {
    $sql = "SELECT id_usuario, nombre, apellido, correo, usuario, telefono, fecha_registro FROM usuarios";
    $result = mysqli_query($conexion, $sql);
    $users = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    echo json_encode(['success' => true, 'data' => $users]);
}

// Function to add a new user
function addUser($conexion, $data) {
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $correo = $data['correo'];
    $usuario = $data['usuario'];
    $clave = password_hash($data['clave'], PASSWORD_DEFAULT); // Hash the password
    $telefono = $data['telefono'];

    $sql = "INSERT INTO usuarios (nombre, apellido, correo, usuario, clave, telefono) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssss', $nombre, $apellido, $correo, $usuario, $clave, $telefono);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Usuario agregado exitosamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al agregar usuario: ' . mysqli_error($conexion)]);
    }
    mysqli_stmt_close($stmt);
}

// Function to update an existing user
function updateUser($conexion, $data) {
    $id_usuario = $data['id_usuario'];
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $correo = $data['correo'];
    $usuario = $data['usuario'];
    $telefono = $data['telefono'];

    $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, usuario = ?, telefono = ? WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssi', $nombre, $apellido, $correo, $usuario, $telefono, $id_usuario);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Usuario actualizado exitosamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar usuario: ' . mysqli_error($conexion)]);
    }
    mysqli_stmt_close($stmt);
}

// Function to delete a user
function deleteUser($conexion, $id_usuario) {
    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_usuario);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Usuario eliminado exitosamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar usuario: ' . mysqli_error($conexion)]);
    }
    mysqli_stmt_close($stmt);
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getUsers($conexion);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['action']) && $data['action'] === 'add') {
        addUser($conexion, $data);
    } elseif (isset($data['action']) && $data['action'] === 'update') {
        updateUser($conexion, $data);
    } elseif (isset($data['action']) && $data['action'] === 'delete') {
        deleteUser($conexion, $data['id_usuario']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Acción no válida.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no soportado.']);
}

mysqli_close($conexion);

?>