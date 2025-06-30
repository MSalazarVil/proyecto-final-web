<?php

require_once 'conexion.php';

header('Content-Type: application/json');

// Manejar preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    http_response_code(200);
    exit();
}

header('Access-Control-Allow-Origin: *');

function getAllProducts($conexion, $category = null, $searchTerm = null) {
    $sql = "SELECT * FROM productos";
    $whereConditions = [];
    
    if ($category) {
        $whereConditions[] = "categoria = '" . mysqli_real_escape_string($conexion, $category) . "'";
    }
    
    if ($searchTerm) {
        $whereConditions[] = "(nombre LIKE '%" . mysqli_real_escape_string($conexion, $searchTerm) . "%' OR 
                             categoria LIKE '%" . mysqli_real_escape_string($conexion, $searchTerm) . "%' OR 
                             color LIKE '%" . mysqli_real_escape_string($conexion, $searchTerm) . "%')";
    }
    
    if (!empty($whereConditions)) {
        $sql .= " WHERE " . implode(" AND ", $whereConditions);
    }
    $result = mysqli_query($conexion, $sql);

    $products = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    return $products;
}

function getCategories($conexion) {
    $sql = "SELECT DISTINCT categoria FROM productos ORDER BY categoria";
    $result = mysqli_query($conexion, $sql);

    $categories = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row['categoria'];
        }
    }
    return $categories;
}

function getInventoryStats($conexion) {
    $totalProducts = 0;
    $totalCategories = 0;
    $totalValue = 0;
    $lowStock = 0;

    // Total Products
    $result = mysqli_query($conexion, "SELECT COUNT(*) as total FROM productos");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalProducts = $row['total'];
    }

    // Total Categories
    $result = mysqli_query($conexion, "SELECT COUNT(DISTINCT categoria) as total FROM productos");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalCategories = $row['total'];
    }

    // Total Value
    $result = mysqli_query($conexion, "SELECT SUM(precio * stock) as total FROM productos");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalValue = $row['total'];
    }

    // Low Stock
    $result = mysqli_query($conexion, "SELECT COUNT(*) as total FROM productos WHERE stock <= 10 AND stock > 0");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $lowStock = $row['total'];
    }

    return [
        'totalProducts' => $totalProducts,
        'totalCategories' => $totalCategories,
        'totalValue' => $totalValue,
        'lowStock' => $lowStock
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'stats') {
        $stats = getInventoryStats($conexion);
        echo json_encode(['success' => true, 'data' => $stats]);
    } elseif (isset($_GET['action']) && $_GET['action'] === 'categories') {
        $categories = getCategories($conexion);
        echo json_encode(['success' => true, 'data' => $categories]);
    } else {
        $category = isset($_GET['category']) ? $_GET['category'] : null;
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : null;
        $products = getAllProducts($conexion, $category, $searchTerm);
        echo json_encode(['success' => true, 'data' => $products]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['nombre']) && isset($data['categoria']) && isset($data['talla']) && isset($data['color']) && isset($data['precio']) && isset($data['stock'])) {
        $nombre = mysqli_real_escape_string($conexion, $data['nombre']);
        $categoria = mysqli_real_escape_string($conexion, $data['categoria']);
        $talla = mysqli_real_escape_string($conexion, $data['talla']);
        $color = mysqli_real_escape_string($conexion, $data['color']);
        $precio = mysqli_real_escape_string($conexion, $data['precio']);
        $stock = mysqli_real_escape_string($conexion, $data['stock']);

        $sql = "INSERT INTO productos (nombre, categoria, talla, color, precio, stock) VALUES ('$nombre', '$categoria', '$talla', '$color', '$precio', '$stock')";

        if (mysqli_query($conexion, $sql)) {
            echo json_encode(['success' => true, 'message' => 'Producto agregado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar producto: ' . mysqli_error($conexion)]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos para agregar producto']);
    }
}
 else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido: ' . $_SERVER['REQUEST_METHOD']]);
}

mysqli_close($conexion);

?>