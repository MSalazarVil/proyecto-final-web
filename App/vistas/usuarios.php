<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Usuarios</title>
    <link rel="stylesheet" href="../css/usuarios.css">
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

    <main class="usuarios-container">
        <section class="usuarios-section">
            <h1 class="usuarios-title">Gestión de Usuarios</h1>
            
            <!-- User Statistics -->
            <div class="user-stats">
                <div class="stat-card">
                    <div class="stat-icon total">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-1c0-1.38 2.24-2.5 5-2.5s5 1.12 5 2.5v1H4zm0-4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM5 0c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2z"/>
                        </svg>
                    </div>
                    <div class="stat-number" id="totalUsersCount">0</div>
                    <div class="stat-label">Total Usuarios</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon today">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                        </svg>
                    </div>
                    <div class="stat-number" id="usersTodayCount">0</div>
                    <div class="stat-label">Usuarios Hoy</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon month">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                        </svg>
                    </div>
                    <div class="stat-number" id="usersThisMonthCount">0</div>
                    <div class="stat-label">Usuarios Este Mes</div>
                </div>
            </div>
            
            <!-- User Controls -->
            <div class="user-controls">
                <div class="search-container">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    <input type="text" class="search-input" placeholder="Buscar usuarios...">
                </div>
                <button class="add-btn">Agregar Nuevo Usuario</button>
            </div>
            
            <div class="table-responsive">
                <table class="usuarios-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Teléfono</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">No hay usuarios registrados.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>


    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>

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

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-input');
            // const roleSelect = document.querySelector('.role-select'); // Removed as role functionality is not implemented
            const userTableBody = document.querySelector('.usuarios-table tbody');
            const addBtn = document.querySelector('.add-btn');
            const totalUsersCount = document.getElementById('totalUsersCount');
            const usersTodayCount = document.getElementById('usersTodayCount');
            const usersThisMonthCount = document.getElementById('usersThisMonthCount');

            function fetchUsers() {
                fetch('../php/CRUD_usuarios.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            renderUsers(data.data);
                        } else {
                            console.error('Error fetching users:', data.message);
                            userTableBody.innerHTML = '<tr><td colspan="6">Error al cargar usuarios.</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        userTableBody.innerHTML = '<tr><td colspan="6">Error de conexión.</td></tr>';
                    });
            }

            function fetchUserStats() {
                fetch('../php/CRUD_usuarios.php?stats=true')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            totalUsersCount.textContent = data.data.totalUsers;
                            usersTodayCount.textContent = data.data.usersToday;
                            usersThisMonthCount.textContent = data.data.usersThisMonth;
                        } else {
                            console.error('Error fetching user stats:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function renderUsers(users) {
                userTableBody.innerHTML = '';
                if (users.length > 0) {
                    users.forEach(user => {
                        const row = `
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">${user.nombre.charAt(0).toUpperCase()}${user.apellido.charAt(0).toUpperCase()}</div>
                                        <div class="user-details">
                                            <div class="user-name">${user.usuario}</div>
                                        <div class="user-email">${user.correo}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>${user.nombre}</td>
                                <td>${user.apellido}</td>
                                <td>${user.correo}</td>
                                <td>${user.telefono || '-'}</td>
                                <td>${user.fecha_registro}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn edit" title="Editar" data-id="${user.id_usuario}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                            </svg>
                                        </button>
                                        <button class="action-btn delete" title="Eliminar" data-id="${user.id_usuario}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;
                        userTableBody.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    userTableBody.innerHTML = '<tr><td colspan="7">No hay usuarios registrados.</td></tr>';
                }
            }

            // Initial fetches
            fetchUsers();
            fetchUserStats();

            // Event Listeners for search and filter (client-side filtering for now)
            searchInput.addEventListener('input', filterUsers);
            // roleSelect.addEventListener('change', filterUsers); // Removed as role functionality is not implemented

            function filterUsers() {
                const searchText = searchInput.value.toLowerCase();
                // const selectedRole = roleSelect.value.toLowerCase(); // Removed as role functionality is not implemented
                const rows = userTableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const name = row.querySelector('.user-name').textContent.toLowerCase();
                    const email = row.querySelector('.user-email').textContent.toLowerCase();
                    // const role = row.querySelector('.role-badge').textContent.toLowerCase(); // Removed as role functionality is not implemented

                    const matchesSearch = name.includes(searchText) || email.includes(searchText);
                    const matchesRole = true; // No role filtering for now

                    if (matchesSearch && matchesRole) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Handle Delete User
            // Confirmation Modal HTML
            const confirmationModalHTML = `
                <div id="confirmationModal" class="modal">
                    <div class="modal-content small-modal">
                        <span class="close-confirmation">&times;</span>
                        <h2 id="confirmationTitle">Confirmar Eliminación</h2>
                        <p>¿Estás seguro de que quieres eliminar este usuario? Esta acción no se puede deshacer.</p>
                        <div class="modal-actions">
                            <button id="cancelDeleteBtn" class="btn cancel-btn">Cancelar</button>
                            <button id="confirmDeleteBtn" class="btn delete-btn">Eliminar</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', confirmationModalHTML);

            const confirmationModal = document.getElementById('confirmationModal');
            const closeConfirmationBtn = document.querySelector('.close-confirmation');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            let userIdToDelete = null;

            // Handle Delete User with custom confirmation modal
            userTableBody.addEventListener('click', function(event) {
                if (event.target.closest('.action-btn.delete')) {
                    userIdToDelete = event.target.closest('.action-btn.delete').dataset.id;
                    confirmationModal.style.display = 'block';
                }
            });

            closeConfirmationBtn.addEventListener('click', function() {
                confirmationModal.style.display = 'none';
            });

            cancelDeleteBtn.addEventListener('click', function() {
                confirmationModal.style.display = 'none';
            });

            confirmDeleteBtn.addEventListener('click', function() {
                if (userIdToDelete) {
                    fetch(`../php/CRUD_usuarios.php?id=${userIdToDelete}`, {
                        method: 'DELETE'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            fetchUsers(); // Refresh the list
                            fetchUserStats(); // Refresh stats
                        } else {
                            alert('Error: ' + data.message);
                        }
                        confirmationModal.style.display = 'none';
                        userIdToDelete = null;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error de conexión al eliminar usuario.');
                        confirmationModal.style.display = 'none';
                        userIdToDelete = null;
                    });
                }
            });

            window.addEventListener('click', function(event) {
                if (event.target == confirmationModal) {
                    confirmationModal.style.display = 'none';
                }
            });

            // Modal HTML for Add/Edit User
            const modalHTML = `
                <div id="userModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2 id="modalTitle">Agregar Nuevo Usuario</h2>
                        <form id="userForm">
                            <input type="hidden" id="userId">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" id="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Email:</label>
                                <input type="email" id="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" id="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="clave">Contraseña:</label>
                                <input type="password" id="clave">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" id="telefono">
                            </div>
                            <button type="submit" class="submit-btn">Guardar</button>
                        </form>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHTML);

            const modal = document.getElementById('userModal');
            const closeBtn = document.querySelector('.close');
            const userForm = document.getElementById('userForm');

            // Handle Add User with Modal
            addBtn.addEventListener('click', function() {
                document.getElementById('modalTitle').textContent = 'Agregar Nuevo Usuario';
                userForm.reset();
                document.getElementById('userId').value = '';
                document.getElementById('clave').required = true;
                modal.style.display = 'block';
            });

            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });

            userForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const userId = document.getElementById('userId').value;
                const formData = {
                    nombre: document.getElementById('nombre').value,
                    apellido: document.getElementById('apellido').value,
                    correo: document.getElementById('correo').value,
                    usuario: document.getElementById('usuario').value,
                    telefono: document.getElementById('telefono').value
                };

                if (!userId) { // Add new user
                    formData.action = 'add';
                    formData.clave = document.getElementById('clave').value;
                } else { // Update existing user
                    formData.action = 'update';
                    formData.id_usuario = userId;
                    const password = document.getElementById('clave').value;
                    if (password) formData.clave = password;
                }

                fetch('../php/CRUD_usuarios.php', {
                    method: userId ? 'PUT' : 'POST', // Use PUT for updates, POST for new users
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        modal.style.display = 'none';
                        fetchUsers();
                        fetchUserStats(); // Refresh stats
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error de conexión.');
                });
            });

            // Handle Edit User
            userTableBody.addEventListener('click', function(event) {
                if (event.target.closest('.action-btn.edit')) {
                    const userId = event.target.closest('.action-btn.edit').dataset.id;
                    fetch(`../php/CRUD_usuarios.php?id=${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success && data.data) {
                                const user = data.data;
                                document.getElementById('modalTitle').textContent = 'Editar Usuario';
                                document.getElementById('userId').value = user.id_usuario;
                                document.getElementById('nombre').value = user.nombre;
                                document.getElementById('apellido').value = user.apellido;
                                document.getElementById('correo').value = user.correo;
                                document.getElementById('usuario').value = user.usuario;
                                document.getElementById('telefono').value = user.telefono || '';
                                document.getElementById('clave').required = false;
                                modal.style.display = 'block';
                            } else {
                                alert('Error al cargar datos del usuario');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error de conexión al cargar datos del usuario');
                        });
                }
            });


        });
    </script>
</body>
</html>