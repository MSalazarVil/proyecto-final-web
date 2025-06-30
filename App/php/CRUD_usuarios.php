<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'conexion.php';

// Configurar headers para CORS y JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Manejar preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

function getUsers($id = null) {
    global $conexion;
    if ($id) {
        $id = mysqli_real_escape_string($conexion, $id);
        $query = "SELECT id_usuario, nombre, apellido, correo, usuario, telefono, fecha_registro FROM usuarios WHERE id_usuario = $id";
        $result = mysqli_query($conexion, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            return ['success' => true, 'data' => mysqli_fetch_assoc($result)];
        } else {
            return ['success' => false, 'message' => 'Usuario no encontrado o error al obtener usuario: ' . mysqli_error($conexion)];
        }
    } else {
        $query = "SELECT id_usuario, nombre, apellido, correo, usuario, telefono, fecha_registro FROM usuarios ORDER BY fecha_registro DESC";
        $result = mysqli_query($conexion, $query);
        $users = [];
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
            return ['success' => true, 'data' => $users];
        } else {
            return ['success' => false, 'message' => 'Error al obtener usuarios: ' . mysqli_error($conexion)];
        }
    }
}

function addUser($data) {
    global $conexion;
    
    // Validar datos requeridos
    $required_fields = ['nombre', 'apellido', 'correo', 'usuario', 'clave'];
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty(trim($data[$field]))) {
            return ['success' => false, 'message' => 'El campo ' . $field . ' es requerido'];
        }
    }
    
    // Escapar datos
    $nombre = mysqli_real_escape_string($conexion, $data['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $data['apellido']);
    $correo = mysqli_real_escape_string($conexion, $data['correo']);
    $usuario = mysqli_real_escape_string($conexion, $data['usuario']);
    $clave = password_hash($data['clave'], PASSWORD_DEFAULT); // Hash de la contraseña
    $telefono = isset($data['telefono']) ? mysqli_real_escape_string($conexion, $data['telefono']) : null;
    
    // Verificar si el correo o usuario ya existen
    $check_query = "SELECT id_usuario FROM usuarios WHERE correo = '$correo' OR usuario = '$usuario'";
    $check_result = mysqli_query($conexion, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        $existing_user = mysqli_fetch_assoc($check_result);
        if ($existing_user['correo'] === $correo) {
            return ['success' => false, 'message' => 'El correo ya está registrado'];
        }
        if ($existing_user['usuario'] === $usuario) {
            return ['success' => false, 'message' => 'El nombre de usuario ya está registrado'];
        }
    }
    
    $query = "INSERT INTO usuarios (nombre, apellido, correo, usuario, clave, telefono) 
              VALUES ('$nombre', '$apellido', '$correo', '$usuario', '$clave', " . 
              ($telefono ? "'$telefono'" : "NULL") . ")";
    
    if (mysqli_query($conexion, $query)) {
        $id = mysqli_insert_id($conexion);
        return ['success' => true, 'message' => 'Usuario agregado exitosamente', 'id' => $id];
    } else {
        return ['success' => false, 'message' => 'Error al agregar usuario: ' . mysqli_error($conexion)];
    }
}

function updateUser($data) {
    global $conexion;
    
    if (!isset($data['id_usuario'])) {
        return ['success' => false, 'message' => 'ID de usuario no proporcionado'];
    }
    
    $id = mysqli_real_escape_string($conexion, $data['id_usuario']);
    
    // Verificar si el usuario existe
    $check_query = "SELECT id_usuario FROM usuarios WHERE id_usuario = $id";
    $check_result = mysqli_query($conexion, $check_query);
    
    if (mysqli_num_rows($check_result) === 0) {
        return ['success' => false, 'message' => 'Usuario no encontrado'];
    }
    
    $updates = [];
    $fields = ['nombre', 'apellido', 'correo', 'usuario', 'telefono'];
    
    foreach ($fields as $field) {
        if (isset($data[$field]) && !empty(trim($data[$field]))) {
            $value = mysqli_real_escape_string($conexion, $data[$field]);
            $updates[] = "$field='$value'";
        }
    }
    
    // Si se proporciona una nueva contraseña, actualizarla
    if (isset($data['clave']) && !empty(trim($data['clave']))) {
        $hashed_password = password_hash($data['clave'], PASSWORD_DEFAULT);
        $updates[] = "clave='$hashed_password'";
    }
    
    if (empty($updates)) {
        return ['success' => false, 'message' => 'No se proporcionaron datos para actualizar'];
    }
    
    // Verificar si el correo o usuario ya existen para otro usuario
    if (isset($data['correo']) || isset($data['usuario'])) {
        $conditions = [];
        if (isset($data['correo'])) {
            $correo = mysqli_real_escape_string($conexion, $data['correo']);
            $conditions[] = "correo = '$correo'";
        }
        if (isset($data['usuario'])) {
            $usuario = mysqli_real_escape_string($conexion, $data['usuario']);
            $conditions[] = "usuario = '$usuario'";
        }
        
        $check_query = "SELECT id_usuario, correo, usuario FROM usuarios WHERE (" . implode(' OR ', $conditions) . ") AND id_usuario != $id";
        $check_result = mysqli_query($conexion, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            $existing_user = mysqli_fetch_assoc($check_result);
            if (isset($data['correo']) && $existing_user['correo'] === $data['correo']) {
                return ['success' => false, 'message' => 'El correo ya está registrado por otro usuario'];
            }
            if (isset($data['usuario']) && $existing_user['usuario'] === $data['usuario']) {
                return ['success' => false, 'message' => 'El nombre de usuario ya está registrado por otro usuario'];
            }
        }
    }
    
    $query = "UPDATE usuarios SET " . implode(', ', $updates) . " WHERE id_usuario=$id";
    
    if (mysqli_query($conexion, $query)) {
        return ['success' => true, 'message' => 'Usuario actualizado exitosamente'];
    } else {
        return ['success' => false, 'message' => 'Error al actualizar usuario: ' . mysqli_error($conexion)];
    }
}

function deleteUser($id) {
    global $conexion;
    
    if (!$id) {
        return ['success' => false, 'message' => 'ID de usuario no proporcionado'];
    }
    
    $id = mysqli_real_escape_string($conexion, $id);
    
    // Verificar si el usuario existe
    $check_query = "SELECT id_usuario FROM usuarios WHERE id_usuario = $id";
    $check_result = mysqli_query($conexion, $check_query);
    
    if (mysqli_num_rows($check_result) === 0) {
        return ['success' => false, 'message' => 'Usuario no encontrado'];
    }
    
    $query = "DELETE FROM usuarios WHERE id_usuario=$id";
    
    if (mysqli_query($conexion, $query)) {
        return ['success' => true, 'message' => 'Usuario eliminado exitosamente'];
    } else {
        return ['success' => false, 'message' => 'Error al eliminar usuario: ' . mysqli_error($conexion)];
    }
}

function getUserStats() {
    global $conexion;
    $stats = [
        'totalUsers' => 0,
        'usersToday' => 0,
        'usersThisMonth' => 0
    ];

    // Total users
    $queryTotal = "SELECT COUNT(*) as total FROM usuarios";
    $resultTotal = mysqli_query($conexion, $queryTotal);
    if ($resultTotal) {
        $stats['totalUsers'] = mysqli_fetch_assoc($resultTotal)['total'];
    }

    // Users registered today
    $queryToday = "SELECT COUNT(*) as total FROM usuarios WHERE DATE(fecha_registro) = CURDATE()";
    $resultToday = mysqli_query($conexion, $queryToday);
    if ($resultToday) {
        $stats['usersToday'] = mysqli_fetch_assoc($resultToday)['total'];
    }

    // Users registered this month
    $queryMonth = "SELECT COUNT(*) as total FROM usuarios WHERE YEAR(fecha_registro) = YEAR(CURDATE()) AND MONTH(fecha_registro) = MONTH(CURDATE())";
    $resultMonth = mysqli_query($conexion, $queryMonth);
    if ($resultMonth) {
        $stats['usersThisMonth'] = mysqli_fetch_assoc($resultMonth)['total'];
    }

    return ['success' => true, 'data' => $stats];
}

// Procesar la solicitud
try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['stats'])) {
            echo json_encode(getUserStats());
        } else {
            $id = $_GET['id'] ?? null;
            echo json_encode(getUsers($id));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['action']) && $data['action'] === 'delete') {
            // This block is for handling old POST delete requests, should be removed after client-side update
            echo json_encode(deleteUser($data['id_usuario']));
        } else {
            echo json_encode(addUser($data));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode(updateUser($data));
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $id = $_GET['id'] ?? null;
        echo json_encode(deleteUser($id));
    } else {
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error interno del servidor: ' . $e->getMessage()]);
}
?>