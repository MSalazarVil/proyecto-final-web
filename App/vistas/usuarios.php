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
            <h1>FORMULARIO DE REGISTRO</h1>
            <form action="registro_cliente.php" method="post" class="form-register">
                <h2 class="form_titulo">Crear Nueva Cuenta</h2>
                <div class="contenedor-inputs">
                    <input type="text" name="nombre" placeholder="Nombres" required class="input-50">
                    <input type="text" name="apellido" placeholder="Apellidos" required class="input-50">
                    <input type="text" name="correo" placeholder="Correo" required class="input-100">                  
                    <input type="text" name="usuario" placeholder="Usuario" required class="input-50">
                    <input type="password" name="clave" placeholder="Contraseña" required class="input-50">
                    <input type="text" name="telefono" placeholder="Celular" required class="input-100">
                    <input type="submit" name="registro" value="Registrar" class="btn-enviar">
                    <p class="form_link">¿Ya tienes una cuenta? <a href="#">Ingresa Aqui</a></p>
                </div>
            </form>
        </section>
    </main>


    <footer class="footer">
        <p class="footer-text">&copy; 2024 LUXEAPPAREL. Todos los derechos reservados.</p>
    </footer>
</body>
</html>