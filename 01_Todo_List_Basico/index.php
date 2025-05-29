<?php
// Función para obtener tareas desde el CSV
function obtener_tareas($archivo)
{
  $tareas = [];

  if (file_exists($archivo)) {
    $archivoCSV = fopen($archivo, "r");
    while (($datos = fgetcsv($archivoCSV, 1000, ",", '"', '\\')) !== false) {
      $tareas[] = [
        "id" => $datos[0],
        "titulo" => $datos[1],
        "completado" => $datos[2] === 'true',
      ];
    }
    fclose($archivoCSV);
  }

  return $tareas;
}

// Función para guardar nueva tarea
function guardar_tareas($archivo, $titulo)
{
  $tareas = obtener_tareas($archivo);
  $nuevo_id = count($tareas) > 0 ? max(array_column($tareas, "id")) + 1 : 1;
  $nueva_tarea = [$nuevo_id, $titulo, "false"];
  $csv = fopen($archivo, "a");
  fputcsv($csv, $nueva_tarea);
  fclose($csv);
}

// Función para actualizar el estado de la tarea
function actualizar_estado($archivo, $id)
{
  $tareas = obtener_tareas($archivo);

  foreach ($tareas as &$tarea) {
    if ($tarea["id"] == $id) {
      $tarea["completado"] = !$tarea["completado"];
      break;
    }
  }

  $csv = fopen($archivo, "w");

  foreach ($tareas as $t) {
    fputcsv($csv, [$t["id"], $t["titulo"], $t["completado"] ? "true" : "false"]);
  }

  fclose($csv);
}

// Función para eliminar una tarea
function eliminar_tarea($archivo, $id)
{
  $tareas = obtener_tareas($archivo);
  $tareas = array_filter($tareas, fn($t) => $t["id"] != $id);
  $csv = fopen($archivo, "w");

  foreach ($tareas as $t) {
    fputcsv($csv, [$t["id"], $t["titulo"], $t["completado"] ? "true" : "false"]);
  }

  fclose($csv);
}

// Función para editar el título de la tarea
function editar_tarea($archivo, $id, $nuevo_titulo)
{
  $tareas = obtener_tareas($archivo);

  foreach ($tareas as &$tarea) {
    if ($tarea["id"] == $id) {
      $tarea["titulo"] = $nuevo_titulo;
      break;
    }
  }

  $csv = fopen($archivo, "w");

  foreach ($tareas as $t) {
    fputcsv($csv, [$t["id"], $t["titulo"], $t["completado"] ? "true" : "false"]);
  }

  fclose($csv);
}

$archivo = "tareas.csv";
$filtro = $_GET["filtro"] ?? "todas";

// Procesar formulario si se envió
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Procesar creación de tarea
  if (isset($_POST["titulo"])) {
    $titulo = $_POST["titulo"];
    if ($titulo !== "") {
      guardar_tareas($archivo, $titulo);
      header("Location: index.php?filtro=" . urlencode($filtro));
      exit;
    }
  }

  // Marcar/desmarcar tarea
  if (isset($_POST["toggle"])) {
    actualizar_estado($archivo, $_POST["toggle"]);
    header("Location: index.php?filtro=" . urlencode($filtro));
    exit;
  }

  // Eliminar tarea
  if (isset($_POST["delete"])) {
    eliminar_tarea($archivo, $_POST["delete"]);
    header("Location: index.php?filtro=" . urlencode($filtro));
    exit;
  }

  // Editar tarea
  if (isset($_POST["update"])) {
    editar_tarea($archivo, $_POST["update"], $_POST["nuevo_titulo"]);
    header("Location: index.php?filtro=" . urlencode($filtro));
    exit;
  }
}

$tareas = obtener_tareas($archivo);

// Filtrado por estado (todas, completadas, pendientes)
$tareas = array_filter($tareas, function ($tarea) use ($filtro) {
  if ($filtro === "completadas") return $tarea["completado"];
  if ($filtro === "pendientes") return !$tarea["completado"];
  return true;
});

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Tareas</title>
  <style>
    body {
      background-color: #f7f7f7;
      color: #333;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      max-width: 600px;
      margin: 3rem auto;
      padding: 0 1rem;
    }

    h1 {
      text-align: center;
      margin-bottom: 1rem;
    }

    nav {
      text-align: center;
      margin: 1rem 0;
    }

    nav a {
      color: #007acc;
      text-decoration: none;
      margin: 0 0.5rem;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    form {
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    input[type="text"] {
      flex: 1;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: .25rem;
    }

    a {
      text-decoration: none;
      font-size: 1rem;
    }

    button {
      background-color: transparent;
      border: none;
      padding: 0.5rem 0.75rem;
      cursor: pointer;
      font-size: 1rem;
    }

    button:hover,
    a:hover {
      opacity: 0.75;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      background-color: white;
      border: 1px solid #ddd;
      padding: 0.5rem;
      margin-bottom: 0.5rem;
      border-radius: .25rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      justify-content: space-between;
    }

    li *:nth-child(2) {
      flex-basis: 75%;
    }

    li form,
    li a {
      margin: 0;
    }

    del {
      color: #9ca3af;
    }

    hr {
      border: none;
      border-top: 1px solid #ccc;
      margin: 1.5rem 0;
    }

    p {
      text-align: center;
      color: #555;
    }
  </style>
</head>

<body>
  <h1>Mis Tareas</h1>
  <!-- Formulario para agregar nueva tarea -->
  <form method="POST">
    <input type="text" name="titulo" placeholder="Nueva Tarea" required>
    <input type="hidden" name="filtro" value="<?= htmlspecialchars($filtro) ?>">
    <button type="submit">➕</button>
  </form>
  <!-- Filtros -->
  <nav>
    <a href="?filtro=todas">Todas</a> |
    <a href="?filtro=pendientes">Pendientes</a> |
    <a href="?filtro=completadas">Completadas</a>
  </nav>
  <!-- Lista de Tareas -->
  <ul>
    <?php foreach ($tareas as $tarea): ?>
      <li>
        <!-- Botón para marcar/desmarcar -->
        <form method="POST">
          <input type="hidden" name="toggle" value="<?= $tarea["id"] ?>">
          <input type="hidden" name="filtro" value="<?= htmlspecialchars($filtro) ?>">
          <button type="submit">
            <?= $tarea["completado"] ? "❌" : "✅" ?>
          </button>
        </form>
        <?php if (isset($_GET["editar"]) && $_GET["editar"] == $tarea["id"]): ?>
          <!-- Formulario para editar -->
          <form method="POST">
            <input type="hidden" name="update" value="<?= $tarea["id"] ?>">
            <input type="text" name="nuevo_titulo" value="<?= htmlspecialchars($tarea["titulo"]) ?>">
            <input type="hidden" name="filtro" value="<?= htmlspecialchars($filtro) ?>">
            <button type="submit">💾</button>
            <a href="index.php?filtro=<?= htmlspecialchars($filtro) ?>">❌</a>
          </form>
        <?php else: ?>
          <!-- Mostrar título -->
          <span>
            <?= $tarea["completado"] ? "<del>" : "" ?>
            <?= htmlspecialchars($tarea["titulo"]) ?>
            <?= $tarea["completado"] ? "</del>" : "" ?>
          </span>
          <!-- Botón editar -->
          <a href="?editar=<?= $tarea["id"] ?>&filtro=<?= htmlspecialchars($filtro) ?>">✏️</a>
        <?php endif; ?>
        <!-- Botón para eliminar tarea con confirmación -->
        <form method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta tarea?');">
          <input type="hidden" name="delete" value="<?= $tarea["id"] ?>">
          <input type="hidden" name="filtro" value="<?= htmlspecialchars($filtro) ?>">
          <button type="submit">🗑️</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>