<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Reportes</title>
    <link rel="stylesheet" href="../css/reportes.css">
</head>
<body class="main-bg">
    <header class="header">
        <h1 class="header-title">LUXEAPPAREL - Reportes</h1>
    </header>
    <a href="../index.php" class="back-btn">Volver al Menú Principal</a>
    <main class="reportes-container">
        <section class="reportes-section">
            <h1 class="reportes-title">Gestión de Reportes</h1>
            
            <!-- Report Statistics -->
            <div class="report-stats">
                <div class="stat-card">
                    <div class="stat-icon sales">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                        </svg>
                    </div>
                    <div class="stat-number">156</div>
                    <div class="stat-label">Ventas del Mes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon revenue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                        </svg>
                    </div>
                    <div class="stat-number">$45,280</div>
                    <div class="stat-label">Ingresos Totales</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon products">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                    </div>
                    <div class="stat-number">324</div>
                    <div class="stat-label">Productos Vendidos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon period">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                        </svg>
                    </div>
                    <div class="stat-number">30</div>
                    <div class="stat-label">Días del Período</div>
                </div>
            </div>
            
            <!-- Report Controls -->
            <div class="report-controls">
                <div class="date-filter">
                    <label for="start-date">Desde:</label>
                    <input type="date" id="start-date" class="date-input" value="2024-01-01">
                    <label for="end-date">Hasta:</label>
                    <input type="date" id="end-date" class="date-input" value="2024-01-31">
                </div>
                <select class="report-type-select">
                    <option value="">Seleccionar tipo de reporte</option>
                    <option value="sales">Reporte de Ventas</option>
                    <option value="inventory">Reporte de Inventario</option>
                    <option value="users">Reporte de Usuarios</option>
                    <option value="financial">Reporte Financiero</option>
                </select>
                <button class="generate-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    Generar Reporte
                </button>
            </div>
            
            <!-- Chart Container -->
            <div class="chart-container">
                <div class="chart-placeholder">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/>
                    </svg>
                    <h3>Gráfico de Reportes</h3>
                    <p>Selecciona un tipo de reporte y genera los datos para visualizar el gráfico</p>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="reportes-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Reporte</th>
                            <th>Período</th>
                            <th>Total Registros</th>
                            <th>Fecha Generación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>RPT-001</td>
                            <td>Reporte de Ventas</td>
                            <td>Enero 2024</td>
                            <td>156 ventas</td>
                            <td>2024-01-31 14:30</td>
                            <td><span class="status-badge completed">Completado</span></td>
                        </tr>
                        <tr>
                            <td>RPT-002</td>
                            <td>Reporte de Inventario</td>
                            <td>Enero 2024</td>
                            <td>89 productos</td>
                            <td>2024-01-30 16:45</td>
                            <td><span class="status-badge completed">Completado</span></td>
                        </tr>
                        <tr>
                            <td>RPT-003</td>
                            <td>Reporte Financiero</td>
                            <td>Q4 2023</td>
                            <td>324 transacciones</td>
                            <td>2024-01-15 09:20</td>
                            <td><span class="status-badge completed">Completado</span></td>
                        </tr>
                        <tr>
                            <td>RPT-004</td>
                            <td>Reporte de Usuarios</td>
                            <td>Diciembre 2023</td>
                            <td>24 usuarios</td>
                            <td>2024-01-10 11:15</td>
                            <td><span class="status-badge completed">Completado</span></td>
                        </tr>
                        <tr>
                            <td>RPT-005</td>
                            <td>Reporte de Ventas</td>
                            <td>Diciembre 2023</td>
                            <td>142 ventas</td>
                            <td>2024-01-05 13:00</td>
                            <td><span class="status-badge completed">Completado</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Report Actions -->
            <div class="report-actions">
                <button class="action-btn export">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                    </svg>
                    Exportar a Excel
                </button>
                <button class="action-btn print">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18,3H6V7H18M19,12A1,1 0 0,1 18,11A1,1 0 0,1 19,10A1,1 0 0,1 20,11A1,1 0 0,1 19,12M16,19H8V14H16M19,8H5A3,3 0 0,0 2,11V17H6V21H18V17H22V11A3,3 0 0,0 19,8Z"/>
                    </svg>
                    Imprimir Reporte
                </button>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
</body>
</html>