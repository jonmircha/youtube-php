<?php
// 1. Iniciar la sesión para poder acceder a ella y destruirla
session_start();

// 2. Eliminar todas las variables de sesión
$_SESSION = array(); // Sobrescribe el array $_SESSION con uno vacío

// 3. Si se usan cookies de sesión (lo normal), borrarlas también.
// Nota: ¡Esto destruirá la sesión, no sólo los datos de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, // Poner tiempo en el pasado
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Finalmente, destruir la sesión del lado del servidor
session_destroy();

// 5. Redirigir al usuario a la página de login con un mensaje
header("Location: login.php?logout=1"); // Añadimos un parámetro para mostrar mensaje
exit; // Detener ejecución
?>