<?php
//https://www.php.net/manual/en/language.variables.superglobals.php
echo "<h1>Super Globales</h1>";
echo "<h2>\$GLOBALS</h2>";

//var_dump($GLOBALS);

$nombre = "Jonathan";

function saludar() {
  echo "Hola " . $GLOBALS["nombre"];
}

saludar();

echo "<h2>\$_SERVER</h2>";

echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

echo $_SERVER["SERVER_SOFTWARE"];

echo "<h2>\$_REQUEST</h2>";

echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";

echo $_REQUEST["nombre"];

echo "<h2>\$_ENV</h2>";

echo "<pre>";
//var_dump($_ENV);
var_dump(getenv($_ENV["PATH"]));
echo "</pre>";

echo "<h2>\$_GET</h2>";

echo "<pre>";
var_dump($_GET);
echo "</pre>";

echo "<h3>Detalle de Producto</h3>";

echo "<a href='super_globales.php?id=50'>Ver producto 50</a>";
echo "<br /> <a href='super_globales.php?id=51'>Ver producto 51</a>";
echo "<br /> <a href='super_globales.php?id=52'>Ver producto 52</a>";

if(isset($_GET["id"])) {
  $producto_id = htmlspecialchars($_GET["id"]);
  echo "<p>Mostrando la información para el producto con ID: " . $producto_id . "</p>";
} else {
  echo "<p>No se especificó un ID de producto válido</p>";
}

echo "<h2>\$_POST</h2>";

echo "<pre>";
var_dump($_POST);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!empty($_POST["user"]) && !empty($_POST["pass"])) {
    $user = htmlspecialchars($_POST["user"]);
    $pass = $_POST["pass"];

    echo "<h3>Datos Recibidos por POST</h3>";
    echo "<p>Usuario: {$user}</p>";
    echo "<p>Contraseña: {$pass}</p>";
  } else {
    echo "<p style='color:red;'>Por favor completa los campos del formulario</p>";
  }
}

?>
<h3>Iniciar Sesión</h3>
<form action="super_globales.php" method="post">
  <div>
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="user">
  </div>
  <div>
      <label for="contrasena">Contraseña:</label>
      <input type="password" id="contrasena" name="pass">
  </div>
  <button type="submit">Entrar</button>
</form>

<?php
echo "<h2>\$_FILES</h2>";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["archivo"])) {
  $archivo = $_FILES["archivo"];
  echo "<h3>Información del Archivo subido:</h3>";
  if($archivo["error"] === UPLOAD_ERR_OK) {
    $nombre_temporal = $archivo["tmp_name"];
    $nombre_original = $archivo["name"];
    $tamanio = $archivo["size"] ;
    $tipo = $archivo["type"];

    echo "
      <ul>
        <li>{$nombre_temporal}</li>
        <li>{$nombre_original}</li>
        <li>{$tamanio}</li>
        <li>{$tipo}</li>
      </ul>
    ";

    $directorio_subidas = "uploads/";

    if (!is_dir($directorio_subidas)) {
      mkdir($directorio_subidas, 0777, true);
    }

    $ruta_destino = $directorio_subidas . $nombre_original;

    if(move_uploaded_file($nombre_temporal, $ruta_destino)) {
      echo "<p style='color:green;'>El archivo {$nombre_original} se ha subido con éxito al servidor</p>";  
    } else {
      echo "<p style='color:red;'>Error al subir el archivo. Codigo de error: {$archivo['error']}</p>";
    }
  } else {
    echo "<p style='color:red;'>Error al subir el archivo. Codigo de error: {$archivo['error']}</p>";
  }
}

echo "<pre>";
var_dump($_FILES);
echo "</pre>";
?>
<h3>Subir Archivos al Servidor</h3>
<form action="super_globales.php" method="post" enctype="multipart/form-data">
  <div>
    <label for="archivo">Selecciona un archivo:</label>
    <input type="file" name="archivo" id="archivo">
  </div>
  <button type="submit">Subir Archivo</button>
</form>
