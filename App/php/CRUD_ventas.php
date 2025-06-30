<?php
require_once 'conexion.php';

function obtenerVentas() {
    global $conexion;
    
    $query = "SELECT v.id_venta, v.fecha_venta, 
              p.nombre as producto_nombre, 
              dv.cantidad, 
              dv.precio_unitario,
              (dv.cantidad * dv.precio_unitario) as total
              FROM ventas v
              INNER JOIN detalle_venta dv ON v.id_venta = dv.id_venta
              INNER JOIN productos p ON dv.id_producto = p.id_producto
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
    
    $query = "SELECT p.nombre as producto_nombre, 
              dv.cantidad, 
              dv.precio_unitario,
              (dv.cantidad * dv.precio_unitario) as subtotal
              FROM detalle_venta dv
              INNER JOIN productos p ON dv.id_producto = p.id_producto
              WHERE dv.id_venta = ?";
              
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_venta);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    
    if (!$resultado) {
        return ['success' => false, 'message' => 'Error al obtener el detalle de la venta'];
    }
    
    $detalles = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $detalles[] = $fila;
    }
    
    return ['success' => true, 'data' => $detalles];
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
            
        default:
            echo json_encode(['success' => false, 'message' => 'Acción no válida']);
    }
    exit;
}
?>