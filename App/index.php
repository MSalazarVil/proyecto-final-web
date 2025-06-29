<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Sistema de Gestión</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="main-bg">
    <!-- Navigation Header -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <h1 class="brand-title">LUXEAPPAREL</h1>
                <span class="brand-subtitle">Sistema de Gestión</span>
            </div>
            <button class="hamburger" id="hamburger" aria-label="Menú de navegación">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
        <div class="nav-menu" id="navMenu">
            <a href="vistas/inventario.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <span>Inventario</span>
            </a>
            <a href="vistas/ventas.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="m1 1 4 4 5.5 11h8.5a2 2 0 0 0 2-1.73L23 6H6"></path>
                </svg>
                <span>Ventas</span>
            </a>
            <a href="vistas/reportes.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14,2 14,8 20,8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10,9 9,9 8,9"></polyline>
                </svg>
                <span>Reportes</span>
            </a>
            <a href="vistas/usuarios.php" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Usuarios</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="hero-section">
            <div class="hero-content">
                <h2 class="hero-title">Panel de Control</h2>
                <p class="hero-description">Gestiona tu inventario, ventas y reportes desde un solo lugar</p>
            </div>
        </div>
        
        <div class="dashboard-grid">
            <div class="dashboard-card" onclick="location.href='vistas/inventario.php'">
                <div class="card-icon inventory">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>
                <h3 class="card-title">Inventario</h3>
                <p class="card-description">Gestiona productos, stock y categorías</p>
                <div class="card-stats">
                    <span class="stat-number">245</span>
                    <span class="stat-label">Productos</span>
                </div>
            </div>
            
            <div class="dashboard-card" onclick="location.href='vistas/ventas.php'">
                <div class="card-icon sales">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="m1 1 4 4 5.5 11h8.5a2 2 0 0 0 2-1.73L23 6H6"></path>
                    </svg>
                </div>
                <h3 class="card-title">Ventas</h3>
                <p class="card-description">Registra y consulta transacciones</p>
                <div class="card-stats">
                    <span class="stat-number">$12,450</span>
                    <span class="stat-label">Este mes</span>
                </div>
            </div>
            
            <div class="dashboard-card" onclick="location.href='vistas/reportes.php'">
                <div class="card-icon reports">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14,2 14,8 20,8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                    </svg>
                </div>
                <h3 class="card-title">Reportes</h3>
                <p class="card-description">Analiza métricas y tendencias</p>
                <div class="card-stats">
                    <span class="stat-number">15</span>
                    <span class="stat-label">Reportes</span>
                </div>
            </div>
            
            <div class="dashboard-card" onclick="location.href='vistas/usuarios.php'">
                <div class="card-icon users">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <h3 class="card-title">Usuarios</h3>
                <p class="card-description">Administra cuentas y permisos</p>
                <div class="card-stats">
                    <span class="stat-number">8</span>
                    <span class="stat-label">Usuarios</span>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
        </div>
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
    </script>
</body>
</html>