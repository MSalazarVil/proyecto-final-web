<?php
require_once 'conexion.php';

function obtenerVentas() {
    global $conexion;
    
    $query = "SELECT DISTINCT v.id_venta, v.fecha_venta, 
              GROUP_CONCAT(p.nombre SEPARATOR ', ') as producto_nombre,
              SUM(dv.cantidad * dv.precio_unitario) as total,
              CONCAT(u.nombre, ' ', u.apellido) as cliente_nombre
              FROM ventas v
              INNER JOIN detalle_venta dv ON v.id_venta = dv.id_venta
              INNER JOIN productos p ON dv.id_producto = p.id_producto
              INNER JOIN usuarios u ON v.id_usuario = u.id_usuario
              GROUP BY v.id_venta, v.fecha_venta, u.nombre, u.apellido
              ORDER BY v.fecha_venta DESC";
              
    $resultado = mysqli_query($conexion, $query);
    
    if (!$resultado) {
        return ['success' => false, 'message' => 'Error al obtener las ventas: ' . mysqli_error($conexion)];
    }
    
    $ventas = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $ventas[] = $fila;
    }
    
    return ['success' => true, 'data' => $ventas];
}

function obtenerEstadisticasVentas() {
    global $conexion;
    
    // Obtener ingresos totales
    $queryIngresos = "SELECT SUM(dv.cantidad * dv.precio_unitario) as ingresos_totales 
                      FROM detalle_venta dv";
    $resultIngresos = mysqli_query($conexion, $queryIngresos);
    $ingresos = mysqli_fetch_assoc($resultIngresos)['ingresos_totales'] ?? 0;
    
    // Obtener número total de ventas
    $queryVentas = "SELECT COUNT(DISTINCT id_venta) as total_ventas FROM detalle_venta";
    $resultVentas = mysqli_query($conexion, $queryVentas);
    $totalVentas = mysqli_fetch_assoc($resultVentas)['total_ventas'] ?? 0;
    
    // Obtener total de productos vendidos
    $queryProductos = "SELECT SUM(cantidad) as productos_vendidos FROM detalle_venta";
    $resultProductos = mysqli_query($conexion, $queryProductos);
    $productosVendidos = mysqli_fetch_assoc($resultProductos)['productos_vendidos'] ?? 0;
    
    return [
        'success' => true,
        'data' => [
            'ingresos_totales' => number_format($ingresos, 2),
            'total_ventas' => $totalVentas,
            'productos_vendidos' => $productosVendidos
        ]
    ];
}

// Función para obtener los detalles de una venta específica
function obtenerDetalleVenta($id_venta) {
    global $conexion;
    
    $query = "SELECT 
              v.id_venta,
              v.fecha_venta,
              CONCAT(u.nombre, ' ', u.apellido) as cliente_nombre,
              p.nombre as producto_nombre,
              p.categoria,
              p.talla,
              p.color,
              dv.cantidad,
              dv.precio_unitario,
              (dv.cantidad * dv.precio_unitario) as subtotal
              FROM detalle_venta dv
              INNER JOIN ventas v ON dv.id_venta = v.id_venta
              INNER JOIN usuarios u ON v.id_usuario = u.id_usuario
              INNER JOIN productos p ON dv.id_producto = p.id_producto
              WHERE dv.id_venta = ?";
              
    $stmt = mysqli_prepare($conexion, $query);
    
    if (!$stmt) {
        return ['success' => false, 'message' => 'Error al preparar la consulta de detalle de venta: ' . mysqli_error($conexion)];
    }

    mysqli_stmt_bind_param($stmt, 'i', $id_venta);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    
    if (!$resultado) {
        return ['success' => false, 'message' => 'Error al obtener el detalle de la venta: ' . mysqli_error($conexion)];
    }
    
    $detalles = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $detalles[] = $fila;
    }
    
    return ['success' => true, 'data' => $detalles];
}

function obtenerUsuarios() {
    global $conexion;
    $query = "SELECT id_usuario, CONCAT(nombre, ' ', apellido) as nombre_completo FROM usuarios ORDER BY nombre_completo ASC";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        return ['success' => false, 'message' => 'Error al obtener usuarios: ' . mysqli_error($conexion)];
    }
    $usuarios = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usuarios[] = $fila;
    }
    return ['success' => true, 'data' => $usuarios];
}

function obtenerProductosParaVenta() {
    global $conexion;
    $query = "SELECT id_producto, nombre, precio FROM productos WHERE stock > 0 ORDER BY nombre ASC";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        return ['success' => false, 'message' => 'Error al obtener productos: ' . mysqli_error($conexion)];
    }
    $productos = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $productos[] = $fila;
    }
    return ['success' => true, 'data' => $productos];
}

function agregarVenta($id_usuario, $productos) {
    global $conexion;

    mysqli_begin_transaction($conexion);

    try {
        // Insertar en la tabla de ventas
        $queryVenta = "INSERT INTO ventas (id_usuario) VALUES (?)";
        $stmtVenta = mysqli_prepare($conexion, $queryVenta);
        if (!$stmtVenta) {
            throw new Exception('Error al preparar la consulta de venta: ' . mysqli_error($conexion));
        }
        mysqli_stmt_bind_param($stmtVenta, 'i', $id_usuario);
        if (!mysqli_stmt_execute($stmtVenta)) {
            throw new Exception('Error al insertar venta: ' . mysqli_error($conexion));
        }
        $id_venta = mysqli_stmt_insert_id($stmtVenta);
        mysqli_stmt_close($stmtVenta);

        // Insertar en la tabla detalle_venta y actualizar stock
        $queryDetalle = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
        $queryUpdateStock = "UPDATE productos SET stock = stock - ? WHERE id_producto = ?";

        foreach ($productos as $producto) {
            $stmtDetalle = mysqli_prepare($conexion, $queryDetalle);
            if (!$stmtDetalle) {
                throw new Exception('Error al preparar la consulta de detalle de venta: ' . mysqli_error($conexion));
            }
            mysqli_stmt_bind_param($stmtDetalle, 'iiid', $id_venta, $producto['id_producto'], $producto['cantidad'], $producto['precio_unitario']);
            if (!mysqli_stmt_execute($stmtDetalle)) {
                throw new Exception('Error al insertar detalle de venta: ' . mysqli_error($conexion));
            }
            mysqli_stmt_close($stmtDetalle);

            $stmtStock = mysqli_prepare($conexion, $queryUpdateStock);
            if (!$stmtStock) {
                throw new Exception('Error al preparar la consulta de actualización de stock: ' . mysqli_error($conexion));
            }
            mysqli_stmt_bind_param($stmtStock, 'ii', $producto['cantidad'], $producto['id_producto']);
            if (!mysqli_stmt_execute($stmtStock)) {
                throw new Exception('Error al actualizar stock: ' . mysqli_error($conexion));
            }
            mysqli_stmt_close($stmtStock);
        }

        mysqli_commit($conexion);
        return ['success' => true, 'message' => 'Venta registrada exitosamente.'];

    } catch (Exception $e) {
        mysqli_rollback($conexion);
        return ['success' => false, 'message' => $e->getMessage()];
    }
}

// Procesar la solicitud AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'obtener_ventas':
            echo json_encode(obtenerVentas());
            break;
            
        case 'obtener_estadisticas':
            echo json_encode(obtenerEstadisticasVentas());
            break;
            
        case 'obtener_detalle':
            $id_venta = $_POST['id_venta'] ?? 0;
            echo json_encode(obtenerDetalleVenta($id_venta));
            break;
        case 'obtener_usuarios':
            echo json_encode(obtenerUsuarios());
            break;
        case 'obtener_productos_para_venta':
            echo json_encode(obtenerProductosParaVenta());
            break;
        case 'agregar_venta':
            $id_usuario = $_POST['id_usuario'] ?? 0;
            $productos_json = $_POST['productos'] ?? '[]';
            $productos = json_decode($productos_json, true);
            echo json_encode(agregarVenta($id_usuario, $productos));
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Acción no válida']);
    }
    exit;
}
?>