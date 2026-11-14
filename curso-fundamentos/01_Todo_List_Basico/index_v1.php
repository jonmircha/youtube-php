<?php
$tareas = [];
$archivo = "tareas.csv";

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
  <!-- Lista de Tareas -->
  <ul>
    <?php foreach ($tareas as $tarea): ?>
      <li>
        <?php if ($tarea["completado"]): ?>
          <del><?= htmlspecialchars($tarea["titulo"]) ?></del>
        <?php else: ?>
          <span><?= htmlspecialchars($tarea["titulo"]) ?></span>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>