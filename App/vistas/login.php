<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXEAPPAREL - Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="https://via.placeholder.com/100" alt="Logo" class="login-logo">
            <h2>Iniciar Sesión</h2>
            <p>Accede a tu cuenta de administrador</p>
        </div>
        <form class="login-form" action="../php/login.php" method="POST">
            <div class="form-group">
                <label for="usuario"><i class="fas fa-user"></i> Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="clave"><i class="fas fa-lock"></i> Contraseña:</label>
                <input type="password" id="clave" name="clave" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="login-button">Ingresar</button>

        </form>
    </div>
</body>
</html>