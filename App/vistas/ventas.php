<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Ventas</title>
    <link rel="stylesheet" href="../css/ventas.css">
</head>
<body class="main-bg">
    <nav class="navbar">
        <div class="nav-container">
            <button class="hamburger" id="hamburger" aria-label="Menú de navegación">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
            <div class="nav-brand">
                <h1 class="brand-title">LUXEAPPAREL</h1>
                <span class="brand-subtitle">Sistema de Gestión</span>
            </div>
        </div>
        <div class="nav-menu" id="navMenu">
            <a href="../vistas/inventario.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <span>Inventario</span>
            </a>
            <a href="../vistas/ventas.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="m1 1 4 4 5.5 11h8.5a2 2 0 0 0 2-1.73L23 6H6"></path>
                </svg>
                <span>Ventas</span>
            </a>

            <a href="../vistas/usuarios.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Usuarios</span>
            </a>
        </div>
    </nav>
    <main class="ventas-container">
        <section class="ventas-section">
            <h1 class="ventas-title">Gestión de Ventas</h1>
            
            <!-- Sales Statistics -->
            <div class="sales-stats" id="salesStats">
                <div class="stat-card">
                    <div class="stat-icon revenue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="stat-number" id="ingresosTotales">$0.00</div>
                    <div class="stat-label">Ingresos Totales</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon orders">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="stat-number" id="ventasRealizadas">0</div>
                    <div class="stat-label">Ventas Realizadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon products">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </div>
                    <div class="stat-number" id="productosVendidos">0</div>
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
                    <tbody id="ventasTableBody">
                        <!-- Los datos de ventas se cargarán dinámicamente aquí -->
                    </tbody>
                </table>
            </div>
            <button class="add-btn">Agregar Nueva Venta</button>
        </section>
    </main>

    <!-- Modal para detalles de venta -->
    <div id="detalleVentaModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detalles de la Venta</h2>
                <span class="close-modal">&times;</span>
            </div>
            <div class="modal-body">
                <table class="detalle-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="detalleVentaBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="footer">
    <script>
        // Hamburger menu functionality
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');
        
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
        
        // Close menu when clicking on a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            }
        });

        // Función para cargar las estadísticas
        function cargarEstadisticas() {
            fetch('../php/CRUD_ventas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=obtener_estadisticas'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('ingresosTotales').textContent = '$' + data.data.ingresos_totales;
                    document.getElementById('ventasRealizadas').textContent = data.data.total_ventas;
                    document.getElementById('productosVendidos').textContent = data.data.productos_vendidos;
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Función para cargar la tabla de ventas
        function cargarTablaVentas() {
            fetch('../php/CRUD_ventas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=obtener_ventas'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const tbody = document.getElementById('ventasTableBody');
                    tbody.innerHTML = '';
                    
                    data.data.forEach(venta => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>#V${venta.id_venta.padStart(3, '0')}</td>
                            <td>${new Date(venta.fecha_venta).toLocaleDateString()}</td>
                            <td>-</td>
                            <td>${venta.producto_nombre}</td>
                            <td>${venta.cantidad}</td>
                            <td>$${parseFloat(venta.total).toFixed(2)}</td>
                            <td><span class="status-badge completed">Completada</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver detalles" onclick="verDetalleVenta(${venta.id_venta})">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Función para ver detalles de una venta
        function verDetalleVenta(id_venta) {
            const modal = document.getElementById('detalleVentaModal');
            const tbody = document.getElementById('detalleVentaBody');
            modal.style.display = 'block';
            
            fetch('../php/CRUD_ventas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=obtener_detalle&id_venta=${id_venta}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    tbody.innerHTML = '';
                    let total = 0;
                    
                    data.data.forEach(detalle => {
                        const tr = document.createElement('tr');
                        const subtotal = parseFloat(detalle.subtotal);
                        total += subtotal;
                        
                        tr.innerHTML = `
                            <td>${detalle.producto_nombre}</td>
                            <td>${detalle.cantidad}</td>
                            <td>$${parseFloat(detalle.precio_unitario).toFixed(2)}</td>
                            <td>$${subtotal.toFixed(2)}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                    
                    // Agregar fila de total
                    const trTotal = document.createElement('tr');
                    trTotal.innerHTML = `
                        <td colspan="3" style="text-align: right; font-weight: bold;">Total:</td>
                        <td style="font-weight: bold;">$${total.toFixed(2)}</td>
                    `;
                    tbody.appendChild(trTotal);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Cerrar modal
        document.querySelector('.close-modal').addEventListener('click', () => {
            document.getElementById('detalleVentaModal').style.display = 'none';
        });

        // Cerrar modal al hacer clic fuera de él
        window.addEventListener('click', (e) => {
            const modal = document.getElementById('detalleVentaModal');
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Cargar datos al iniciar la página
        document.addEventListener('DOMContentLoaded', () => {
            cargarEstadisticas();
            cargarTablaVentas();
        });
    </script>        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
</body>
</html>