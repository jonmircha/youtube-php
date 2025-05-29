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

$archivo = "tareas.csv";

// Procesar formulario si se envió
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Procesar creación de tarea
  if (isset($_POST["titulo"])) {
    $titulo = $_POST["titulo"];
    if ($titulo !== "") {
      guardar_tareas($archivo, $titulo);
      header("Location: index.php");
      exit;
    }
  }

  // Marcar/desmarcar tarea
  if (isset($_POST["toggle"])) {
    actualizar_estado($archivo, $_POST["toggle"]);
    header("Location: index.php");
    exit;
  }

  // Eliminar tarea
  if (isset($_POST["delete"])) {
    eliminar_tarea($archivo, $_POST["delete"]);
    header("Location: index.php");
    exit;
  }
}

$tareas = obtener_tareas($archivo);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Tareas</title>
</head>

<body>
  <h1>Mis Tareas</h1>
  <!-- Formulario para agregar nueva tarea -->
  <form method="POST">
    <input type="text" name="titulo" placeholder="Nueva Tarea" required>
    <button type="submit">➕</button>
  </form>
  <!-- Lista de Tareas -->
  <ul>
    <?php foreach ($tareas as $tarea): ?>
      <li>
        <!-- Botón para marcar/desmarcar -->
        <form method="POST" style="display:inline;">
          <input type="hidden" name="toggle" value="<?= $tarea["id"] ?>">
          <button type="submit">
            <?= $tarea["completado"] ? "❌" : "✅" ?>
          </button>
        </form>
        <span>
          <?= $tarea["completado"] ? "<del>" : "" ?>
          <?= htmlspecialchars($tarea["titulo"]) ?>
          <?= $tarea["completado"] ? "</del>" : "" ?>
        </span>
        <!-- Botón para eliminar tarea con confirmación -->
        <form method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar esta tarea?');">
          <input type="hidden" name="delete" value="<?= $tarea["id"] ?>">
          <button type="submit">🗑️</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>