<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Ventas</title>
    <link rel="stylesheet" href="../css/ventas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <button class="add-btn" id="openAddSaleModal">Agregar Nueva Venta</button>
            </div>
            
            <div class="table-responsive">
                <table class="ventas-table">
                    <thead>
                        <tr>
                            <th>ID Venta</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Producto</th>

                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ventasTableBody">
                        <!-- Los datos de ventas se cargarán dinámicamente aquí -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Modal para agregar nueva venta -->
    <div id="addSaleModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Agregar Nueva Venta</h2>
                <span class="close-modal-add">&times;</span>
            </div>
            <div class="modal-body">
                <form id="addSaleForm">
                    <div class="form-group">
                        <label for="clienteSelect">Cliente:</label>
                        <select id="clienteSelect" class="form-control" required>
                            <!-- Opciones de clientes se cargarán dinámicamente aquí -->
                        </select>
                    </div>
                    <div id="productosContainer">
                        <div class="product-entry">
                            <div class="form-group">
                                <label for="productoSelect_1">Producto:</label>
                                <select id="productoSelect_1" class="form-control producto-select" data-product-index="1" required>
                                    <!-- Opciones de productos se cargarán dinámicamente aquí -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cantidad_1">Cantidad:</label>
                                <input type="number" id="cantidad_1" class="form-control cantidad-input" min="1" value="1" required>
                            </div>
                            <div class="form-group">
                                <label for="precio_1">Precio Unitario:</label>
                                <input type="number" id="precio_1" class="form-control precio-input" step="0.01" min="0.01" required readonly>
                            </div>
                            <button type="button" class="remove-product-btn" style="display:none;">Eliminar</button>
                        </div>
                    </div>
                    <button type="button" id="addProductBtn" class="btn btn-secondary">Añadir Otro Producto</button>
                    <button type="submit" class="btn btn-primary">Guardar Venta</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para detalles de venta -->
    <div id="detalleVentaModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detalles de la Venta <span id="ventaId"></span></h2>
                <span class="close-modal">&times;</span>
            </div>
            <div class="modal-body">
                <div class="venta-info">
                    <p><strong>Fecha:</strong> <span id="ventaFecha"></span></p>
                    <p><strong>Cliente:</strong> <span id="ventaCliente"></span></p>
                </div>
                <table class="detalle-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Talla</th>
                            <th>Color</th>
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
                            <td>#V${String(venta.id_venta).padStart(3, '0')}</td>
                            <td>${new Date(venta.fecha_venta).toLocaleDateString()}</td>
                            <td>${venta.cliente_nombre}</td>
                            <td>${venta.producto_nombre}</td>

                            <td>$${parseFloat(venta.total).toFixed(2)}</td>
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

                    // Set modal header info
                    if (data.data.length > 0) {
                        document.getElementById('ventaId').textContent = `#V${String(data.data[0].id_venta).padStart(3, '0')}`;
                        document.getElementById('ventaFecha').textContent = new Date(data.data[0].fecha_venta).toLocaleDateString();
                        document.getElementById('ventaCliente').textContent = data.data[0].cliente_nombre;
                    }
                    
                    data.data.forEach(detalle => {
                        const tr = document.createElement('tr');
                        const subtotal = parseFloat(detalle.subtotal);
                        total += subtotal;
                        
                        tr.innerHTML = `
                            <td>${detalle.producto_nombre}</td>
                            <td>${detalle.categoria}</td>
                            <td>${detalle.talla}</td>
                            <td>${detalle.color}</td>
                            <td>${detalle.cantidad}</td>
                            <td>$${parseFloat(detalle.precio_unitario).toFixed(2)}</td>
                            <td>$${subtotal.toFixed(2)}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                    
                    // Agregar fila de total
                    const trTotal = document.createElement('tr');
                    trTotal.innerHTML = `
                        <td colspan="6" style="text-align: right; font-weight: bold;">Total:</td>
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
            const detalleModal = document.getElementById('detalleVentaModal');
            const addModal = document.getElementById('addSaleModal');
            if (e.target === detalleModal) {
                detalleModal.style.display = 'none';
            }
            if (e.target === addModal) {
                addModal.style.display = 'none';
            }
        });

        // Lógica para el modal de agregar nueva venta
        const openAddSaleModalBtn = document.getElementById('openAddSaleModal');
        const addSaleModal = document.getElementById('addSaleModal');
        const closeAddSaleModalBtn = document.querySelector('.close-modal-add');
        const addProductBtn = document.getElementById('addProductBtn');
        const productosContainer = document.getElementById('productosContainer');
        const addSaleForm = document.getElementById('addSaleForm');

        let productIndex = 1;

        openAddSaleModalBtn.addEventListener('click', () => {
            addSaleModal.style.display = 'block';
            cargarClientes();
            cargarProductos(1);
        });

        closeAddSaleModalBtn.addEventListener('click', () => {
            addSaleModal.style.display = 'none';
            resetAddSaleForm();
        });

        addProductBtn.addEventListener('click', () => {
            productIndex++;
            const newProductEntry = document.createElement('div');
            newProductEntry.classList.add('product-entry');
            newProductEntry.innerHTML = `
                <div class="form-group">
                    <label for="productoSelect_${productIndex}">Producto:</label>
                    <select id="productoSelect_${productIndex}" class="form-control producto-select" data-product-index="${productIndex}" required>
                        <!-- Opciones de productos se cargarán dinámicamente aquí -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad_${productIndex}">Cantidad:</label>
                    <input type="number" id="cantidad_${productIndex}" class="form-control cantidad-input" min="1" value="1" required>
                </div>
                <div class="form-group">
                    <label for="precio_${productIndex}">Precio Unitario:</label>
                    <input type="number" id="precio_${productIndex}" class="form-control precio-input" step="0.01" min="0.01" required readonly>
                </div>
                <button type="button" class="remove-product-btn">Eliminar</button>
            `;
            productosContainer.appendChild(newProductEntry);
            cargarProductos(productIndex);
            attachProductListeners(newProductEntry);
        });

        function attachProductListeners(productEntry) {
            const productSelect = productEntry.querySelector('.producto-select');
            const cantidadInput = productEntry.querySelector('.cantidad-input');
            const precioInput = productEntry.querySelector('.precio-input');
            const removeBtn = productEntry.querySelector('.remove-product-btn');

            productSelect.addEventListener('change', () => {
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                precioInput.value = selectedOption.dataset.precio || '';
            });

            removeBtn.addEventListener('click', () => {
                productEntry.remove();
            });
        }

        function cargarClientes() {
            fetch('../php/CRUD_ventas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=obtener_usuarios'
            })
            .then(response => response.json())
            .then(data => {
                const clienteSelect = document.getElementById('clienteSelect');
                clienteSelect.innerHTML = '<option value="">Seleccione un cliente</option>';
                if (data.success) {
                    data.data.forEach(cliente => {
                        const option = document.createElement('option');
                        option.value = cliente.id_usuario;
                        option.textContent = cliente.nombre_completo;
                        clienteSelect.appendChild(option);
                    });
                }
            })
            .catch(error => console.error('Error al cargar clientes:', error));
        }

        function cargarProductos(index) {
            fetch('../php/CRUD_ventas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=obtener_productos_para_venta'
            })
            .then(response => response.json())
            .then(data => {
                const productoSelect = document.getElementById(`productoSelect_${index}`);
                productoSelect.innerHTML = '<option value="">Seleccione un producto</option>';
                if (data.success) {
                    data.data.forEach(producto => {
                        const option = document.createElement('option');
                        option.value = producto.id_producto;
                        option.textContent = `${producto.nombre} ($${parseFloat(producto.precio).toFixed(2)})`;
                        option.dataset.precio = parseFloat(producto.precio).toFixed(2);
                        productoSelect.appendChild(option);
                    });
                }
                // Trigger change to set price for the first product if already selected
                if (productoSelect.value) {
                    const event = new Event('change');
                    productoSelect.dispatchEvent(event);
                }
            })
            .catch(error => console.error('Error al cargar productos:', error));
        }

        // Attach listeners for initial product entry
        attachProductListeners(document.querySelector('.product-entry'));

        addSaleForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const id_usuario = document.getElementById('clienteSelect').value;
            if (!id_usuario) {
                alert('Por favor, seleccione un cliente.');
                return;
            }

            const productos = [];
            let isValid = true;
            document.querySelectorAll('.product-entry').forEach(entry => {
                const productoSelect = entry.querySelector('.producto-select');
                const cantidadInput = entry.querySelector('.cantidad-input');
                const precioInput = entry.querySelector('.precio-input');

                const id_producto = productoSelect.value;
                const cantidad = parseInt(cantidadInput.value);
                const precio_unitario = parseFloat(precioInput.value);

                if (!id_producto || isNaN(cantidad) || cantidad <= 0 || isNaN(precio_unitario) || precio_unitario <= 0) {
                    isValid = false;
                    alert('Por favor, complete todos los campos de producto y asegúrese de que la cantidad y el precio sean válidos.');
                    return;
                }
                productos.push({
                    id_producto: id_producto,
                    cantidad: cantidad,
                    precio_unitario: precio_unitario
                });
            });

            if (!isValid || productos.length === 0) {
                alert('Debe añadir al menos un producto válido.');
                return;
            }

            fetch('../php/CRUD_ventas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=agregar_venta&id_usuario=${id_usuario}&productos=${JSON.stringify(productos)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    addSaleModal.style.display = 'none';
                    resetAddSaleForm();
                    cargarEstadisticas();
                    cargarTablaVentas();
                } else {
                    alert('Error al registrar la venta: ' + data.message);
                }
            })
            .catch(error => console.error('Error al registrar venta:', error));
        });

        function resetAddSaleForm() {
            document.getElementById('clienteSelect').value = '';
            productosContainer.innerHTML = `
                <div class="product-entry">
                    <div class="form-group">
                        <label for="productoSelect_1">Producto:</label>
                        <select id="productoSelect_1" class="form-control producto-select" data-product-index="1" required>
                            <!-- Opciones de productos se cargarán dinámicamente aquí -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad_1">Cantidad:</label>
                        <input type="number" id="cantidad_1" class="form-control cantidad-input" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_1">Precio Unitario:</label>
                        <input type="number" id="precio_1" class="form-control precio-input" step="0.01" min="0.01" required readonly>
                    </div>
                    <button type="button" class="remove-product-btn" style="display:none;">Eliminar</button>
                </div>
            `;
            productIndex = 1;
            attachProductListeners(document.querySelector('.product-entry'));
        }

        // Cargar datos al iniciar la página
        document.addEventListener('DOMContentLoaded', () => {
            cargarEstadisticas();
            cargarTablaVentas();
        });
    </script>        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
</body>
</html>