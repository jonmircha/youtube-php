<?php
// ¡IMPRESCINDIBLE! Iniciar o reanudar la sesión al principio del script.
session_start();

echo "<h1>\$_SESSION</h1>";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

echo "<h2>Contador de Visitas (Sesión)</h2>";

if (isset($_SESSION["visitas"])) {
  $_SESSION["visitas"]++;
} else {
  $_SESSION["visitas"] = 1;
}

echo "<p>Has visitado esta página " . $_SESSION['visitas'] . " veces en esta sesión.</p>";
echo "<p><a href='ejemplo_session.php'>Recargar la página</a></p>";
echo "<p><a href='destruir_session.php'>Cerrar sesión (Reiniciar el Contador)</a></p>";
