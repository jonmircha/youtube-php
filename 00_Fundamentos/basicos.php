<?php
  declare(strict_types=1);
  
  echo "<h2>Hola Mundo</h2>";
  echo print"<h2>Hello World</h2>";
  echo "<br>";
  echo "<b>Hola</b>"," ", "<i>Mundo</i>";
  echo "<br>";
  
  /* 
  Comentarios 
  de 
  varias 
  líneas
  */
  
  # Comentario de una línea
  
  // Comentario de una línea
  
  $numero = 3;
  $nombre = "Jon";
  $Nombre = "MirCha";
  $nombre_completo = "Jon MirCha";
  $edad = 40;
  echo $numero , $nombre , $nombre_completo , $Nombre;
  echo '<br>';
  echo '<p>Hola Mundo</p>';
  echo '
    <style>
      .bg-black {
        background-color: black;
      }

      .text-white {
        color: white
      }
    </style>
    <p class="text-white bg-black">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga quidem, culpa enim perferendis maxime cumque omnis est sunt cum ea veniam corporis eos molestiae nisi optio, deleniti quisquam et tenetur.
    </p>
    <script>console.log("Hola Mundo en PHP");</script>
  ';
      
  // INTERPOLACIÓN de VARIABLES
  echo "<p>Hola mi nombre es $nombre y tengo $edad años</p>";
  echo "<p>Hola mi nombre es {$nombre} y tengo {$edad} años</p>";

  // CONCATENACIÓN de VARIABLES
  echo '<p>Hola mi nombre es $nombre y tengo $edad años</p>';
  echo '<p>Hola mi nombre es ' . $nombre . ' y tengo ' . $edad . ' años</p>';
  
  $nombre_completo = "Jonathan Ulises Miranda Charles";
  echo "<p>{$nombre_completo}</p>";
  
  // CONSTANTES
  define("SUPER_PASSWORD","qwerty");
  echo "<p>" . SUPER_PASSWORD . "</p>";
  
  const SUPER_USER = "jonmircha";
  echo "<p>" . SUPER_USER . "</p>";
  
  // VARIABLES GLOBALES
  // https://www.php.net/manual/es/language.variables.superglobals.php
  echo $_SERVER["DOCUMENT_ROOT"];
  echo '<br>';
  
  // CONSTANTES MÁGICAS
  // https://www.php.net/manual/es/language.constants.magic.php
  echo __FILE__;
  echo '<br>';

  // Tipos de Datos en PHP
  // Primitivos
  // Integers
  $numero_positivo = 19;
  $numero_negativo = -19;
  $cero = 0;
  echo "<br>";
  echo $numero_positivo , "<br>" , $numero_negativo , "<br>", $cero;
  echo gettype($numero_positivo);
  echo "<br>";
  echo gettype($numero_negativo);
  echo "<br>";
  echo gettype($cero);
  echo "<br>";
  
  // Floats / Doubles
  $precio = 19.99;
  $temperatura = -5.5;
  $valor_cientifico = 1.23e4;
  echo $precio , "<br>", $temperatura, "<br>",$valor_cientifico, "<br>";
  echo gettype($precio), "<br>", gettype($temperatura), "<br>" , gettype($valor_cientifico), "<br>";

  // Strings
  $saludo = "Hola Mundo";
  $nombre = 'Jon MirCha';

  echo $saludo , "<br>" , gettype($saludo) , "<br>" , $nombre , "<br>", gettype($nombre), "<br>";

  // Booleans
  $es_verdadero = true;
  $es_falso = false;

  echo $es_verdadero , "<br>" , $es_falso , "<br>", gettype($es_verdadero), "<br>" , gettype($es_falso), "<br>";

  var_dump($es_verdadero);
  echo "<br>";
  var_dump($saludo);
  echo "<br>";
  var_dump($es_falso);
  echo "<br>";

  //Tipos Compuestos / Complejos
  //Array Posicional
  $arreglo_posicional = array("Hola", true, 90, "Adios");
  var_dump($arreglo_posicional);
  echo "<br>";
  echo $arreglo_posicional[0], "<br>", $arreglo_posicional[1], "<br>", $arreglo_posicional[2], "<br>", $arreglo_posicional[3], "<br>";
  echo count($arreglo_posicional), "<br>";

  $colores = ["Rojo", "Verde", "Azul"];
  var_dump($colores);
  echo "<br>", gettype($arreglo_posicional), "<br>", gettype($colores), "<br>";

  //Array Asociativo
  $arreglo_asociativo = [
    "nombre" => "Jon",
    "edad" => 40,
    "pais" => "México"
  ];

  var_dump($arreglo_asociativo);
  echo "<br>", $arreglo_asociativo["nombre"], "<br>" , $arreglo_asociativo["edad"], "<br>" , $arreglo_asociativo["pais"], "<br>";
  echo count($arreglo_asociativo), "<br>";

  $arreglo_asociativo_2 = array(
    "nombre" => "Irma",
    "edad" => 40,
    "pais" => "México"
  );
  var_dump($arreglo_asociativo_2);

  // Documentos de los Arrays https://www.php.net/manual/es/ref.array.php

  // Objetos
  // Este tema queda pendiente hasta ver el tema de las funciones y el paradigma de la Programación Orientada a Objetos

  // Recursos
  // El tipo de dato recurso es un puntero a un recurso externo, como una conexión a una base de datos o un archivo abierto. No se puede manipular directamente y se utiliza para interactuar con recursos externos.
  // Ejemplo: https://www.php.net/manual/es/function.mysqli-connect.php

  // NULL
  $sin_valor;
  echo "<br>", $sin_valor, "<br>";
  var_dump($sin_valor);
  echo "<hr>";
  $nula = null;
  echo "<br>", $nula, "<br>";
  var_dump($nula);

  // Conversión de Tipos de Datos
  
  // Conversión Implícita
  $entero = 5;
  $flotante = 3.14;
  $resultado = $entero + $flotante;
  echo "<br>";
  var_dump($resultado);

  // Conversión Explícita
  $venta_cadena = "1099";
  $venta_entero = intval($venta_cadena);
  echo "<br>";
  var_dump($venta_cadena);
  echo "<br>";
  var_dump($venta_entero);
  echo "<br>";

  // Type Casting
  $calificacion_decimal = 9.39;
  $calificacion_entero = (int)$calificacion_decimal;
  var_dump($calificacion_decimal);
  echo "<br>";
  var_dump($calificacion_entero);
  echo "<br>";

  // Tipos de Operadores
  // https://www.php.net/manual/es/language.operators.php
  echo "<hr>";
  $a = 10;
  $b = 5;
  $c = 2;
  
  // Operadores Aritméticos: +, -, *, /, %, **
  echo $a + $b, "<br>";
  echo $a - $b, "<br>";
  echo $a * $b, "<br>";
  echo $a / $b, "<br>";
  echo $a % $b, "<br>";
  echo $a ** 2, "<br>", "<hr>";

  // Operadores Asignación: =, +=, -=, *=, /=, %=, **=
  echo $a += 10, "<br>";
  echo $a -= 10, "<br>";
  echo $a *= 10, "<br>";
  echo $a /= 10, "<br>";
  echo $a %= 10, "<br>";
  echo $c **= 10, "<br>", "<hr>";

  // Operadores de Concatenación: ., .=
  $texto_1 = "Hola";
  $texto_2 = "Mundo";

  echo $texto_1 . $texto_2, "<br>";
  $texto_1 .= " Mundo desde PHP";
  echo $texto_1, "<br><hr>";

  // Operadores de Comparación: ==, ===, !=, <>, !==, <, >, <=, >=, <=>
  var_dump(5 == 5);
  var_dump("5" == 5);
  var_dump("5" === 5);
  var_dump(5 === 5);
  var_dump(5 != 5);
  var_dump(4 != 5);
  var_dump(4 <> 5);
  var_dump(5 <> 5);
  var_dump(4 !== 5);
  var_dump(4 < 5);
  var_dump(4 > 5);
  var_dump(5 > 5);
  var_dump(5 < 5);
  var_dump(5 <= 5);
  var_dump(5 >= 5);
  var_dump(5 <=> 5); // 0
  var_dump(5 <=> 4); // 1
  var_dump(4 <=> 5); // -1
  echo "<hr>";
  
  // Operadores de Incremento y Decremento
  $d = 5;
  ++$d;
  echo "<br>";
  echo $d;
  $d++;
  echo "<br>";
  echo $d;

  $e = 10;
  --$e;
  echo "<br>";
  echo $e;
  $e--;
  echo "<br>";
  echo $e;
  echo "<hr>";

  // Operadores Lógicos: and - &&, or, ||, not !, xor
  // and todas las expresiones tiene que ser verdaderas para validar el and
  var_dump(4 < 5 && 5 < 6 and 5 > 3);
  // or con que una expresión sea verdadera valida el or
  var_dump(14 < 5 || 15 < 6 or 5 > 3);
  // xor (eXclusive or) valida cuando sólo una expresión sea verdadera
  var_dump(14 < 5 xor 5 < 6 xor 5 > 3);
  var_dump(!true);
  var_dump(!false);
  echo "<hr>";

  // Operador Ternario ?: y de Fusión Nulo (Null Coalescing) ??
  $age = 35;
  $tipo_persona = ($age >= 18) ? "Eres Mayor de Edad" : "Eres Menor de Edad";
  echo $tipo_persona;
  echo "<br>";

  //$name = "Jon";
  $user = $name ?? "invitado";
  echo $user;
  echo "<br>";

  // Operador de Control de Errores: @
  $archivo = @file("hola.txt");

  // Operadores de Bit a Bit: &, |, ^, ~, <<, >>
  $f = 10; //   1010 en binario
  $g = 34; // 100010 en binario
  $h = $f & $g; // 00010 en binario
  echo "<hr>";
  echo $h;
  echo "<br>";

  $i = 4; // 100 en binario
  $desplazamiento = 2;
  $j = $i << $desplazamiento;
  echo "<br>";
  echo $j; // 10000
  echo "<hr>";

  // ESTRUCTURAS DE CONTROL

  // ESTRUCTURAS CONDICIONALES

  // if - else
  echo "<hr>";
  $age = 26;
  
  if ($age >= 18) {
    echo "Tu edad es {$age} años,";
    echo "<br>";
    echo "por lo tanto eres Mayor de Edad";

  } else {
    echo "Tu edad es {$age} años,";
    echo "<br>";
    echo "por lo tanto eres Menor de Edad";
  }

  /*
    Déjame Dormir - 0hrs - 5hrs
    Buenos días 6hrs - 11hrs
    Buenas tardes 12hrs - 18hrs
    Buenas noches 19hrs - 23hrs
    Cualquier otro valor mandar error
  */

  // if - else if - else
  echo "<br>";
  $hora = 7;
  
  if ($hora <= 5) {
    echo "Déjame dormir 😴";
  } else if ($hora >= 6 and $hora <= 11) {
    echo "Buenos días 😃";
  } else if ($hora >= 12 && $hora <= 18 ) {
    echo "Buenos tardes 🤓";
  } else if ($hora >= 19 and $hora <= 23) {
    echo "Buenos noches 🥱";
  } else {
    echo "Error la hora es inválida ☠️";
  }

  // Sintaxis alternativa
  // https://www.php.net/manual/es/control-structures.alternative-syntax.php
  
  echo "<br>";

  if ($age >= 18):
    echo "Tu edad es {$age} años,";
    echo "<br>";
    echo "por lo tanto eres Mayor de Edad";
  else:
    echo "Tu edad es {$age} años,";
    echo "<br>";
    echo "por lo tanto eres Menor de Edad";
  endif;
  
  echo "<br>";

  if ($hora <= 5):
    echo "Déjame dormir 😴";
  elseif ($hora >= 6 and $hora <= 11):
    echo "Buenos días 😃";
  elseif ($hora >= 12 && $hora <= 18 ):
    echo "Buenos tardes 🤓";
  elseif ($hora >= 19 and $hora <= 23):
    echo "Buenos noches 🥱";
  else:
    echo "Error la hora es inválida ☠️";
  endif;

  // Condicionales Múltiples
  //switch - case
  echo "<br>";
  $mes = "M";
  
  switch ($mes) {
    case 1:
      echo "El mes {$mes} es Enero";
      break;
    case 2:
      echo "El mes {$mes} es Febrero";
      break;
    case 3:
      echo "El mes {$mes} es Marzo";
      break;
    case 4:
      echo "El mes {$mes} es Abril";
      break;
    case 5:
      echo "El mes {$mes} es Mayo";
      break;
    case 6:
      echo "El mes {$mes} es Junio";
      break;
    default:
      echo "Error el mes es inválido ☠️";
      break;
  }

  // match
  // https://www.php.net/manual/es/control-structures.match.php
  echo "<br>";
  
  $evaluar_mes = match($mes) {
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5, "M" => "Mayo",
    6 => "Junio",
    default => "Mes inválido"
  };

  echo $evaluar_mes;

  echo "<br>";
  
  $evaluar_saludo = match(true) {
    ($hora <= 5) => "Déjame dormir 😴",
    ($hora >= 6 && $hora <= 11) => "Buenos días 😃",
    ($hora >= 12 && $hora <= 18) => "Buenos tardes 🤓",
    ($hora >= 19 && $hora <= 23) => "Buenos noches 🥱",
    default => "Error la hora es inválida ☠️",
  };

  echo $evaluar_saludo;
  echo "<br><hr>";


  // ESTRUCTURAS REPETITIVAS - Loops - Ciclos - Bucles

  // while
  $k = 1;
  while ($k <= 6) {
    echo "<h{$k}>Encabezado de tipo {$k}</h{$k}>";
    $k++;
  }

  // do... while
  $l = 1;
  do  {
    echo "<h{$l}>Encabezado de tipo {$l}</h{$l}>";
    $l++;
  } while ($l <= 6);

  // for (inicialización; condición; incremento o decremento)
  for ($m = 1; $m <= 6; $m++) {
    echo "<h{$m}>Encabezado de tipo {$m}</h{$m}>";
  }

  // foraech ($array as $value) 
  $frutas = ["Pera", "Manzanas", "Fresas", "Aguacate"];
  echo "<ol>";
  foreach($frutas as $fruta) {
    echo "<li>{$fruta}</li>";
  }
  echo "</ol>";

  $paises = [
    "mx" => "México",
    "ar" => "Argentina",
    "co" => "Colombia",
    "pe" => "Perú",
    "es" => "España"
  ];

  //foreach($array as $key => $value)
  echo "<ol>";
  foreach ($paises as $dominio => $nombre) {
    echo "<li>{$dominio} - {$nombre}</li>";
  }
  echo "</ol>";

  // Funciones
  // Declaración
  function saludar() {
    echo "Hola Mundo";
  }
  saludar();

  // Invocación o  Ejecución
  
  function saludar2() {
    return "Hola Mundo";
  }

  echo "<br>";
  var_dump(saludar2());

  $saludo = saludar2();
  echo "<br>";
  echo $saludo;
  echo "<br>";
  echo saludar2();
  

  //Recuerda que los declare van al inicio del script php
  //declare(strict_types=1);
  function saludar3():string {
    return "Hola Mundo con Tipos";
  }
  
  echo "<br>";
  echo saludar3();

  function sumar(int|float $a, mixed $b):int|float {
    return $a + $b;
  }

  echo "<br>";
  echo sumar(3, 1.56);

  function sumar2(int|float ...$numeros) {
    $suma = 0;
    foreach($numeros as $numero) {
      $suma += $numero;
    }

    return $suma;
  }

  echo "<br>";
  echo sumar2(1,2,3,4,5,6.25);


  //Funciones expresadas (Funciones dentro de Variable)
  $restar = function ($a, $b) {
    return $a - $b;
  };
  
  echo "<br>";
  echo $restar(10, 5);
  echo "<br>";
  echo $restar(5, 10);
  echo "<br>";
  echo $restar(b:5, a:10);

  //Funciones anónimas
  $array_nums = [1,2,3,4,5];
  $array_cuadrados = array_map(function($n) {
    return $n*$n;
  },$array_nums);

  echo "<br>";
  var_dump($array_nums);
  echo "<br>";
  var_dump($array_cuadrados);

  //Funciones flecha (arrow functions)
  $arrow_nums = [1,2,3,4,5];
  $arrow_cuadrados = array_map(fn($n) => $n*$n , $arrow_nums);
  echo "<br>";
  var_dump($arrow_nums);
  echo "<br>";
  var_dump($arrow_cuadrados);

  $arrow_restar = fn($a, $b) => $a - $b;
  echo "<br>";
  echo $arrow_restar(20,10);


  //require
  //require_once
  //include
  //include_once

  include_once "archivo.php";
  echo $x;
  echo "<br>";
  $x++;
  echo "<mark>" . $x . "</mark>";
  require_once "archivo.php";
  echo $x;
  echo "<br>";
  echo "<h3>Esto va después de incluir el archivo.php</h3>";

// https://www.php.net/manual/es/book.datetime.php
echo "<h3>Manejo de Fechas y Horas en PHP</h3>";
echo time();
echo "<br>";
echo date("d-m-y h:i:s");
echo date_default_timezone_get();
echo "<br>";
date_default_timezone_set("America/Mexico_City");
echo date("d-m-y h:i:s"); 
echo "<br>";
$now = strtotime("now");
echo date("d-m-y h:i:s", $now);
echo "<br>";
$tomorrow = strtotime("tomorrow");
echo date("d-m-y h:i:s", $tomorrow);
echo "<br>";
$last_day_march = strtotime("last day of march 2025");
echo date("d-m-y h:i:s", $last_day_march);

echo "<pre>";
  print_r(date_parse_from_format("m/d/Y h:i:s A", "now"));
echo "</pre>";

//https://www.php.net/manual/en/book.filesystem.php
echo "<h3>Manejo de Directorios y Archivos</h3>";

$dir = scandir(__DIR__);

echo "<pre>";
  var_dump($dir);
echo "</pre>";

echo "<br>";

echo is_dir(__DIR__ . "/info.php") ? "Es un directorio": "Es un archivo";

echo "<br>";

echo is_dir(__DIR__ . "/sitio") ? "Es un directorio": "Es un archivo";

mkdir("carpeta_nueva",0777, true);

rmdir("carpeta_nueva");

$archivo = fopen("archivo.txt","w+");
fwrite($archivo, "Hola mundo");
fclose($archivo);

$archivo = fopen("archivo.txt","r");
$contenido = fread($archivo, filesize("archivo.txt"));
fclose($archivo);

echo "<br>";
echo $contenido;
echo "<br>";

unlink("archivo.txt");

if (file_exists("archivo.txt")) {
  echo "El archivo existe";
} else {
  echo "El archivo NO existe";
}

echo "<br>";
