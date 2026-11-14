<?php
echo "<h1>\$_COOKIE</h1>";
echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";
$idioma_preferido = "";

// 1. Procesar si se envió una nueva preferencia (por ejemplo, desde un formulario o enlace)
if (isset($_POST["idioma"])) {
  $nuevo_idioma = $_POST["idioma"];
  if (in_array($nuevo_idioma, ["es", "en"])) {
    setcookie("idioma_usuario", $nuevo_idioma, time() + (86400 * 30), "/");
    $idioma_preferido = $nuevo_idioma;
    echo "<p>Preferencia del idioma guardado como: {$nuevo_idioma}</p>";
  }
}

// 2. Si no se envió preferencia nueva, leer la cookie existente
else if (isset($_COOKIE["idioma_usuario"])) {
  $idioma_guardado = $_COOKIE["idioma_usuario"];
  if (in_array($idioma_guardado, ["es", "en"])) {
    $idioma_preferido = $idioma_guardado;
  }
}
?>
<form action="ejemplo_cookie.php" method="post">
  <label for="idioma">Selecciona tu idioma:</label>
  <select name="idioma" id="idioma">
    <option value="" <?php echo ($idioma_preferido === "") ? "selected" : ""?>>- - -</option>
    <option value="es" <?php echo ($idioma_preferido === "es") ? "selected" : ""?>>Español</option>
    <option value="en" <?php echo ($idioma_preferido === "en") ? "selected" : ""?>>English</option>
  </select>
  <button type="submit">Guardar Idioma</button>
</form>
<?php
if($idioma_preferido === "es") {
  echo "<p>El idioma seleccionado es español</p>";
} else if($idioma_preferido === "en") {
  echo "<p>The selected language is English</p>";
} else {
  echo "<p>Sin selección de idioma / Without language selection</p>";
}
?>