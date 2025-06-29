<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Usuarios</title>
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body class="main-bg">
    <header class="header">
        <h1 class="header-title">LUXEAPPAREL - Usuarios</h1>
    </header>
    <a href="../index.php" class="back-btn">Volver al Menú Principal</a>


    <main class="usuarios-container">
        <section class="usuarios-section">
            <h1 class="usuarios-title">Gestión de Usuarios</h1>
            
            <!-- User Statistics -->
            <?php
            require_once '../php/conexion.php';

            $total_users_query = "SELECT COUNT(*) AS total_users FROM usuarios";
            $total_users_result = mysqli_query($conexion, $total_users_query);
            $total_users = mysqli_fetch_assoc($total_users_result)['total_users'];

            // Placeholder values for active, inactive, and admins as these fields are not in the DB schema
            $active_users = $total_users; // Assuming all are active for now
            $inactive_users = 0;
            $admin_users = 0; // No role field in DB
            ?>
            <div class="user-stats">
                <div class="stat-card">
                    <div class="stat-icon total">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-1c0-1.38 2.24-2.5 5-2.5s5 1.12 5 2.5v1H4zm0-4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm5 0c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2z"/>
                        </svg>
                    </div>
                    <div class="stat-number"><?php echo $total_users; ?></div>
                    <div class="stat-label">Total Usuarios</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon active">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="stat-number"><?php echo $active_users; ?></div>
                    <div class="stat-label">Usuarios Activos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon inactive">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                    <div class="stat-number"><?php echo $inactive_users; ?></div>
                    <div class="stat-label">Usuarios Inactivos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon admins">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <div class="stat-number"><?php echo $admin_users; ?></div>
                    <div class="stat-label">Administradores</div>
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
                <div class="role-filter">
                    <select class="role-select">
                        <option value="">Todos los roles</option>
                        <option value="admin">Administrador</option>
                        <option value="manager">Gerente</option>
                        <option value="employee">Empleado</option>
                    </select>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="usuarios-table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Último Acceso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../php/conexion.php';

                        $sql = "SELECT id_usuario, nombre, apellido, correo, usuario, telefono, fecha_registro FROM usuarios";
                        $result = mysqli_query($conexion, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>';
                                echo '<div class="user-info">';
                                echo '<div class="user-avatar">' . strtoupper(substr($row['nombre'], 0, 1)) . strtoupper(substr($row['apellido'], 0, 1)) . '</div>';
                                echo '<div class="user-details">';
                                echo '<div class="user-name">' . htmlspecialchars($row['nombre']) . ' ' . htmlspecialchars($row['apellido']) . '</div>';
                                echo '<div class="user-email">' . htmlspecialchars($row['correo']) . '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td>' . htmlspecialchars($row['correo']) . '</td>';
                                // Simplified role and status for now, as they are not in the DB schema provided
                                echo '<td><span class="role-badge employee">Empleado</span></td>'; // Default role
                                echo '<td><span class="status-badge active">Activo</span></td>'; // Default status
                                echo '<td>' . htmlspecialchars($row['fecha_registro']) . '</td>';
                                echo '<td>';
                                echo '<div class="action-buttons">';
                                echo '<button class="action-btn view" title="Ver perfil"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg></button>';
                                echo '<button class="action-btn edit" title="Editar"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg></button>';
                                echo '<button class="action-btn delete" title="Eliminar"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg></button>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6">No hay usuarios registrados.</td></tr>';
                        }
                        mysqli_close($conexion);
                        ?>

                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">MG</div>
                                    <div class="user-details">
                                        <div class="user-name">María García</div>
                                        <div class="user-email">maria.garcia@luxeapparel.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>maria.garcia@luxeapparel.com</td>
                            <td><span class="role-badge admin">Administrador</span></td>
                            <td><span class="status-badge active">Activo</span></td>
                            <td>2024-01-15 14:30</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver perfil">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">CL</div>
                                    <div class="user-details">
                                        <div class="user-name">Carlos López</div>
                                        <div class="user-email">carlos.lopez@luxeapparel.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>carlos.lopez@luxeapparel.com</td>
                            <td><span class="role-badge manager">Gerente</span></td>
                            <td><span class="status-badge active">Activo</span></td>
                            <td>2024-01-15 12:15</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver perfil">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">AR</div>
                                    <div class="user-details">
                                        <div class="user-name">Ana Rodríguez</div>
                                        <div class="user-email">ana.rodriguez@luxeapparel.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>ana.rodriguez@luxeapparel.com</td>
                            <td><span class="role-badge employee">Empleado</span></td>
                            <td><span class="status-badge inactive">Inactivo</span></td>
                            <td>2024-01-10 16:45</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver perfil">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">PM</div>
                                    <div class="user-details">
                                        <div class="user-name">Pedro Martínez</div>
                                        <div class="user-email">pedro.martinez@luxeapparel.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>pedro.martinez@luxeapparel.com</td>
                            <td><span class="role-badge employee">Empleado</span></td>
                            <td><span class="status-badge active">Activo</span></td>
                            <td>2024-01-14 09:20</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver perfil">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">LF</div>
                                    <div class="user-details">
                                        <div class="user-name">Laura Fernández</div>
                                        <div class="user-email">laura.fernandez@luxeapparel.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>laura.fernandez@luxeapparel.com</td>
                            <td><span class="role-badge admin">Administrador</span></td>
                            <td><span class="status-badge active">Activo</span></td>
                            <td>2024-01-15 11:00</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Ver perfil">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" title="Editar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" title="Eliminar">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="add-btn">Agregar Nuevo Usuario</button>
        </section>
    </main>


    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-input');
            const roleSelect = document.querySelector('.role-select');
            const userTableBody = document.querySelector('.usuarios-table tbody');
            const addBtn = document.querySelector('.add-btn');

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

            function renderUsers(users) {
                userTableBody.innerHTML = ''; // Clear existing rows
                if (users.length > 0) {
                    users.forEach(user => {
                        const row = `
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">${user.nombre.charAt(0).toUpperCase()}${user.apellido.charAt(0).toUpperCase()}</div>
                                        <div class="user-details">
                                            <div class="user-name">${user.nombre} ${user.apellido}</div>
                                            <div class="user-email">${user.correo}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>${user.correo}</td>
                                <td><span class="role-badge employee">Empleado</span></td> <!-- Placeholder -->
                                <td><span class="status-badge active">Activo</span></td> <!-- Placeholder -->
                                <td>${user.fecha_registro}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view" title="Ver perfil" data-id="${user.id_usuario}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                            </svg>
                                        </button>
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
                    userTableBody.innerHTML = '<tr><td colspan="6">No hay usuarios registrados.</td></tr>';
                }
            }

            // Initial fetch
            fetchUsers();

            // Event Listeners for search and filter (client-side filtering for now)
            searchInput.addEventListener('input', filterUsers);
            roleSelect.addEventListener('change', filterUsers);

            function filterUsers() {
                const searchText = searchInput.value.toLowerCase();
                const selectedRole = roleSelect.value.toLowerCase();
                const rows = userTableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const name = row.querySelector('.user-name').textContent.toLowerCase();
                    const email = row.querySelector('.user-email').textContent.toLowerCase();
                    const role = row.querySelector('.role-badge').textContent.toLowerCase();

                    const matchesSearch = name.includes(searchText) || email.includes(searchText);
                    const matchesRole = selectedRole === '' || role.includes(selectedRole);

                    if (matchesSearch && matchesRole) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Handle Delete User
            userTableBody.addEventListener('click', function(event) {
                if (event.target.closest('.action-btn.delete')) {
                    const userId = event.target.closest('.action-btn.delete').dataset.id;
                    if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
                        fetch('../php/CRUD_usuarios.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ action: 'delete', id_usuario: userId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                fetchUsers(); // Refresh the list
                            } else {
                                alert('Error: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error de conexión al eliminar usuario.');
                        });
                    }
                }
            });

            // Handle Add User (basic example, would typically open a modal/form)
            addBtn.addEventListener('click', function() {
                const newUserName = prompt('Introduce el nombre del nuevo usuario:');
                const newUserApellido = prompt('Introduce el apellido del nuevo usuario:');
                const newUserEmail = prompt('Introduce el email del nuevo usuario:');
                const newUserUsuario = prompt('Introduce el nombre de usuario:');
                const newUserClave = prompt('Introduce la clave del nuevo usuario:');
                const newUserTelefono = prompt('Introduce el teléfono del nuevo usuario:');

                if (newUserName && newUserApellido && newUserEmail && newUserUsuario && newUserClave) {
                    fetch('../php/CRUD_usuarios.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            action: 'add',
                            nombre: newUserName,
                            apellido: newUserApellido,
                            correo: newUserEmail,
                            usuario: newUserUsuario,
                            clave: newUserClave,
                            telefono: newUserTelefono
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            fetchUsers(); // Refresh the list
                        } else {
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error de conexión al agregar usuario.');
                    });
                }
            });

            // TODO: Implement edit functionality (e.g., open a modal with current user data)
            userTableBody.addEventListener('click', function(event) {
                if (event.target.closest('.action-btn.edit')) {
                    const userId = event.target.closest('.action-btn.edit').dataset.id;
                    alert('Editar usuario con ID: ' + userId + ' (Funcionalidad no implementada completamente)');
                    // Here you would typically fetch user data by ID and populate a form for editing
                }
            });

            // TODO: Implement view functionality (e.g., open a modal with user details)
            userTableBody.addEventListener('click', function(event) {
                if (event.target.closest('.action-btn.view')) {
                    const userId = event.target.closest('.action-btn.view').dataset.id;
                    alert('Ver detalles del usuario con ID: ' + userId + ' (Funcionalidad no implementada completamente)');
                }
            });
        });
    </script>
</body>
</html>