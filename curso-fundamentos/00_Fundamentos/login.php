<?php
// 1. Iniciar la sesión ANTES de cualquier salida HTML
session_start();

// --- Simulación de credenciales de usuario (en una app real, vendrían de una DB) ---
$usuario_valido = "jonmircha";
$contrasena_valida_hash = password_hash("qwerty", PASSWORD_DEFAULT); // ¡Siempre hashear contraseñas!
// ---------------------------------------------------------------------------------

$error_login = ""; // Variable para mensaje de error

// 2. Redirigir si ya está logueado
if (isset($_SESSION['usuario_id'])) {
    header("Location: area_privada.php"); // Ya está logueado, redirigir al área privada
    exit; // Detener la ejecución del script
}

// 3. Procesar el formulario si se envió por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos no estén vacíos (validación básica)
    if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
        $error_login = "Por favor, ingresa usuario y contraseña.";
    } else {
        $usuario_ingresado = $_POST['usuario'];
        $contrasena_ingresada = $_POST['contrasena'];

        // 4. Verificar credenciales (comparar con las simuladas)
        // En una app real: buscar $usuario_ingresado en la DB y obtener su hash
        if ($usuario_ingresado === $usuario_valido && password_verify($contrasena_ingresada, $contrasena_valida_hash)) {
            
            // ¡Autenticación exitosa!
            
            // 5. Regenerar ID de sesión por seguridad (previene session fixation)
            session_regenerate_id(true); 
            
            // 6. Guardar datos del usuario en la sesión
            $_SESSION['usuario_id'] = 1; // ID simulado del usuario
            $_SESSION['nombre_usuario'] = $usuario_valido; 
            $_SESSION['tiempo_login'] = time(); // Opcional: guardar hora de login

            // 7. Redirigir al área privada
            header("Location: area_privada.php");
            exit; // Detener la ejecución del script

        } else {
            // Credenciales incorrectas
            $error_login = "Usuario o contraseña incorrectos.";
        }
    }
}

// Mensaje de logout (si viene de logout.php)
$mensaje_logout = "";
if (isset($_GET['logout']) && $_GET['logout'] == '1') {
    $mensaje_logout = "Has cerrado sesión correctamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body { font-family: sans-serif; }
        .error { color: red; font-weight: bold; margin-bottom: 10px; }
        .success { color: green; font-weight: bold; margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 200px; padding: 8px; margin-bottom: 10px; }
        button { padding: 10px 15px; }
    </style>
</head>
<body>

    <h1>Iniciar Sesión</h1>

    <?php if (!empty($error_login)): ?>
        <p class="error"><?php echo $error_login; ?></p>
    <?php endif; ?>

    <?php if (!empty($mensaje_logout)): ?>
        <p class="success"><?php echo $mensaje_logout; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <div>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>