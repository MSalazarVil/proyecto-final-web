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
                    <div class="stat-number" id="total-products">...</div>
                    <div class="stat-label">Total Productos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="total-categories">...</div>
                    <div class="stat-label">Categorías</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="total-value">...</div>
                    <div class="stat-label">Valor Total</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="low-stock">...</div>
                    <div class="stat-label">Stock Bajo</div>
                </div>
            </div>
            
            <!-- Controles de Búsqueda y Filtros -->
            <div class="inventory-controls">
                <div class="search-filter-group">
                    <div class="search-container">
                        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        <input type="text" class="search-input" placeholder="Buscar productos...">
                    </div>
                    <select class="filter-select">
                        <option value="">Todas las categorías</option>
                    </select>
                </div>
                <button class="add-btn">Agregar Producto</button>
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

                    </tbody>
                </table>
            </div>

            <!-- Modal para Agregar Producto -->
            <div id="addProductModal" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <h2>Agregar Nuevo Producto</h2>
                    <form id="addProductForm">
                        <div class="form-group">
                            <label for="productName">Nombre:</label>
                            <input type="text" id="productName" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Categoría:</label>
                            <input type="text" id="productCategory" name="categoria" required>
                        </div>
                        <div class="form-group">
                            <label for="productSize">Talla:</label>
                            <input type="text" id="productSize" name="talla" required>
                        </div>
                        <div class="form-group">
                            <label for="productColor">Color:</label>
                            <input type="text" id="productColor" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Precio:</label>
                            <input type="number" id="productPrice" name="precio" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="productStock">Stock:</label>
                            <input type="number" id="productStock" name="stock" required>
                        </div>
                        <button type="submit" class="submit-btn">Guardar Producto</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fetchProducts = (category = '', searchTerm = '') => {
                let url = '../php/CRUD_inventario.php';
                const params = new URLSearchParams();

                if (category) {
                    params.append('category', category);
                }
                if (searchTerm) {
                    params.append('search', searchTerm);
                }

                if (params.toString()) {
                    url += `?${params.toString()}`;
                }
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const tbody = document.querySelector('.inventario-table tbody');
                            tbody.innerHTML = ''; // Clear existing static rows
                            data.data.forEach(product => {
                                const row = `
                                    <tr>
                                        <td>${product.id_producto}</td>
                                        <td>${product.nombre}</td>
                                        <td>${product.categoria}</td>
                                        <td>${product.talla}</td>
                                        <td>${product.color}</td>
                                        <td>$${parseFloat(product.precio).toFixed(2)}</td>
                                        <td>${product.stock}</td>
                                        <td><span class="status-badge ${product.stock > 10 ? 'in-stock' : (product.stock > 0 ? 'low-stock' : 'out-of-stock')}">${product.stock > 10 ? 'En Stock' : (product.stock > 0 ? 'Stock Bajo' : 'Agotado')}</span></td>
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
                                `;
                                tbody.insertAdjacentHTML('beforeend', row);
                            });
                        } else {
                            console.error('Error fetching products:', data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            };

            fetch('../php/CRUD_inventario.php?action=stats')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('total-products').textContent = data.data.totalProducts;
                        document.getElementById('total-categories').textContent = data.data.totalCategories;
                        document.getElementById('total-value').textContent = `$${parseFloat(data.data.totalValue).toFixed(2)}`;
                        document.getElementById('low-stock').textContent = data.data.lowStock;
                    } else {
                        console.error('Error fetching stats:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));

            fetch('../php/CRUD_inventario.php?action=categories')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const filterSelect = document.querySelector('.filter-select');
                        data.data.forEach(category => {
                            const option = document.createElement('option');
                            option.value = category;
                            option.textContent = category;
                            filterSelect.appendChild(option);
                        });
                    } else {
                        console.error('Error fetching categories:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));

            document.querySelector('.filter-select').addEventListener('change', (event) => {
                const currentSearchTerm = document.querySelector('.search-input').value;
                fetchProducts(event.target.value, currentSearchTerm);
            });

            const searchInput = document.querySelector('.search-input');
            searchInput.addEventListener('input', (event) => {
                const currentCategory = document.querySelector('.filter-select').value;
                fetchProducts(currentCategory, event.target.value);
            });

            fetchProducts(); // Initial load of all products

            // Modal functionality
            const addProductModal = document.getElementById('addProductModal');
            const addProductBtn = document.querySelector('.add-btn');
            const closeButton = document.querySelector('.close-button');

            addProductBtn.addEventListener('click', () => {
                addProductModal.style.display = 'block';
            });

            closeButton.addEventListener('click', () => {
                addProductModal.style.display = 'none';
            });

            window.addEventListener('click', (event) => {
                if (event.target == addProductModal) {
                    addProductModal.style.display = 'none';
                }
            });

            // Handle form submission (for adding product)
            document.getElementById('addProductForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                const productData = Object.fromEntries(formData.entries());

                fetch('../php/CRUD_inventario.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(productData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Producto agregado exitosamente!');
                        addProductModal.style.display = 'none';
                        fetchProducts(); // Reload products to show the new one
                        // Optionally, refresh stats and categories if they might change
                        fetch('../php/CRUD_inventario.php?action=stats')
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('total-products').textContent = data.data.totalProducts;
                                    document.getElementById('total-categories').textContent = data.data.totalCategories;
                                    document.getElementById('total-value').textContent = `$${parseFloat(data.data.totalValue).toFixed(2)}`;
                                    document.getElementById('low-stock').textContent = data.data.lowStock;
                                }
                            });
                        fetch('../php/CRUD_inventario.php?action=categories')
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const filterSelect = document.querySelector('.filter-select');
                                    filterSelect.innerHTML = '<option value="">Todas las categorías</option>'; // Clear and re-add default
                                    data.data.forEach(category => {
                                        const option = document.createElement('option');
                                        option.value = category;
                                        option.textContent = category;
                                        filterSelect.appendChild(option);
                                    });
                                }
                            });
                    } else {
                        alert('Error al agregar producto: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
