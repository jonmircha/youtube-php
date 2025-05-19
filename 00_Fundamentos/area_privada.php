<?php
// 1. Iniciar la sesión ANTES de cualquier salida
session_start();

// 2. Verificar si el usuario está autenticado
// Comprobamos si existe la variable de sesión que pusimos durante el login
if (!isset($_SESSION['usuario_id'])) {
    // Si no está logueado, redirigir a la página de login
    header("Location: login.php");
    exit; // Detener la ejecución
}

// 3. Si llegó hasta aquí, el usuario está autenticado.
// Podemos usar los datos guardados en la sesión.
$nombre_usuario = isset($_SESSION['nombre_usuario']) ? htmlspecialchars($_SESSION['nombre_usuario']) : 'Usuario';
$tiempo_login = isset($_SESSION['tiempo_login']) ? date('H:i:s d-m-Y', $_SESSION['tiempo_login']) : 'N/A';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área Privada</title>
    <style>
        body { font-family: sans-serif; }
        .welcome { font-size: 1.2em; margin-bottom: 20px; }
        a { color: blue; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <h1>Bienvenido al Área Privada</h1>

    <p class="welcome">Hola, <strong><?php echo $nombre_usuario; ?></strong>!</p>
    <p>Has iniciado sesión a las: <?php echo $tiempo_login; ?></p>

    <p>Este contenido solo es visible para usuarios autenticados.</p>
    
    <p>...</p>
    <p>...</p>

    <p><a href="logout.php">Cerrar Sesión</a></p>

</body>
</html>