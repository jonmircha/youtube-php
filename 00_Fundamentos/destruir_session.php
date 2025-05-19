<?php
session_start(); // Necesario para acceder a la sesión y destruirla

// Elimina todas las variables de sesión
$_SESSION = array(); 

if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

session_destroy();

echo "<p>Sesión cerrada. El contador se ha reiniciado. <a href='ejemplo_session.php'>Volver</a></p>";
