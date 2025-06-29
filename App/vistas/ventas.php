<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Ventas</title>
    <link rel="stylesheet" href="../css/ventas.css">
</head>
<body class="main-bg">
    <header class="header">
        <h1 class="header-title">LUXEAPPAREL - Ventas</h1>
    </header>
    <a href="../index.php" class="back-btn">Volver al Menú Principal</a>
    <main class="ventas-container">
        <section class="ventas-section">
            <h1 class="ventas-title">Gestión de Ventas</h1>
            
            <!-- Sales Statistics -->
            <div class="sales-stats">
                <div class="stat-card">
                    <div class="stat-icon revenue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="stat-number">$45,230</div>
                    <div class="stat-label">Ingresos Totales</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon orders">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="stat-number">156</div>
                    <div class="stat-label">Ventas Realizadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon products">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </div>
                    <div class="stat-number">89</div>
                    <div class="stat-label">Productos Vendidos</div>
                </div>
            </div>
            
            <!-- Sales Controls -->
            <div class="sales-controls">
                <div class="search-container">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    <input type="text" class="search-input" placeholder="Buscar ventas...">
                </div>
                <div class="date-filter">
                    <input type="date" class="date-input" placeholder="Fecha inicio">
                    <span>-</span>
                    <input type="date" class="date-input" placeholder="Fecha fin">
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="ventas-table">
                    <thead>
                        <tr>
                            <th>ID Venta</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#V001</td>
                            <td>2024-01-15</td>
                            <td>María García</td>
                            <td>Vestido Elegante</td>
                            <td>2</td>
                            <td>$450.00</td>
                            <td><span class="status-badge completed">Completada</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver detalles">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#V002</td>
                            <td>2024-01-14</td>
                            <td>Carlos López</td>
                            <td>Traje Formal</td>
                            <td>1</td>
                            <td>$680.00</td>
                            <td><span class="status-badge processing">Procesando</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver detalles">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#V003</td>
                            <td>2024-01-13</td>
                            <td>Ana Rodríguez</td>
                            <td>Blusa Casual</td>
                            <td>3</td>
                            <td>$285.00</td>
                            <td><span class="status-badge pending">Pendiente</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver detalles">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#V004</td>
                            <td>2024-01-12</td>
                            <td>Pedro Martínez</td>
                            <td>Pantalón Ejecutivo</td>
                            <td>2</td>
                            <td>$320.00</td>
                            <td><span class="status-badge completed">Completada</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver detalles">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#V005</td>
                            <td>2024-01-11</td>
                            <td>Laura Fernández</td>
                            <td>Chaqueta Premium</td>
                            <td>1</td>
                            <td>$890.00</td>
                            <td><span class="status-badge completed">Completada</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver detalles">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="add-btn">Agregar Nueva Venta</button>
        </section>
    </main>
    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
</body>
</html>