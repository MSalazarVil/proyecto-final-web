<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Inventario</title>
    <link rel="stylesheet" href="../css/inventario.css">
</head>
<body class="main-bg">
    <header class="header">
        <h1 class="header-title">LUXEAPPAREL - Inventario</h1>
    </header>
    <a href="../index.php" class="back-btn">Volver al Menú Principal</a>
    <main class="inventario-container">
        <section class="inventario-section">
            <h2 class="inventario-title">Productos en Inventario</h2>
            
            <!-- Estadísticas del Inventario -->
            <div class="inventory-stats">
                <div class="stat-card">
                    <div class="stat-number">245</div>
                    <div class="stat-label">Total Productos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">18</div>
                    <div class="stat-label">Categorías</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">$125,430</div>
                    <div class="stat-label">Valor Total</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Stock Bajo</div>
                </div>
            </div>
            
            <!-- Controles de Búsqueda y Filtros -->
            <div class="inventory-controls">
                <div class="search-container">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" class="search-input" placeholder="Buscar productos...">
                </div>
                <select class="filter-select">
                    <option value="">Todas las categorías</option>
                    <option value="camisas">Camisas</option>
                    <option value="pantalones">Pantalones</option>
                    <option value="vestidos">Vestidos</option>
                    <option value="accesorios">Accesorios</option>
                </select>
            </div>
            
            <div class="table-responsive">
                <table class="inventario-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Camisa Elegante</td>
                            <td>Camisas</td>
                            <td>M</td>
                            <td>Blanco</td>
                            <td>$45.99</td>
                            <td>25</td>
                            <td><span class="status-badge in-stock">En Stock</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" title="Editar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="16" height="16">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="16" height="16">
                                            <polyline points="3,6 5,6 21,6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Pantalón Casual</td>
                            <td>Pantalones</td>
                            <td>L</td>
                            <td>Azul</td>
                            <td>$65.99</td>
                            <td>8</td>
                            <td><span class="status-badge low-stock">Stock Bajo</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" title="Editar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="16" height="16">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="16" height="16">
                                            <polyline points="3,6 5,6 21,6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2 2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Vestido de Noche</td>
                            <td>Vestidos</td>
                            <td>S</td>
                            <td>Negro</td>
                            <td>$120.00</td>
                            <td>0</td>
                            <td><span class="status-badge out-of-stock">Agotado</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" title="Editar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="16" height="16">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" width="16" height="16">
                                            <polyline points="3,6 5,6 21,6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2 2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="add-btn">Agregar Producto</button>
        </section>
    </main>
    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
    <script src="js/app.js"></script>
</body>
</html>
