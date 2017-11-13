<html>
<title>Monumento Agregado</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-grey w3-card-2">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="Monumento.php" class="w3-bar-item w3-button w3-padding-large">Ver Monumentos</a>
      <a href="nuevoMonumento.php" class="w3-bar-item w3-button w3-padding-large">Agregar otro Monumento</a>
    </div>
  </div>
</div>

<div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px">



  <?php
  /*Conexion a la base de datos*/
  require 'phpqrcode/qrlib.php';
  $user = "postgres";
  $password = "root";
  $dbname = "AppTurismo";
  $port = "5432";
  $host = "localhost";
  $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
/*Obtiene el codigo,nombre,fecha,uso,ubicaion,extra(si se lleno),centro turistico y se agrega la nueva tupla a la tabla de monumento, por el otro lado se obtiene el codigo,nombre,centro turistico, historia, conservaion, cultura popular y arquitectura y se agrega la nueva tupla a la tabla de informacion, el codigo se obtiene de la pagina de nuevoMonumento.php usando el metodo get, para luego con un query realizar el insert en la base de datos*/
  $codigo = $_GET["Codigo"];
  $nombre = $_GET["Nombre"];
  $fecha = $_GET["Fecha"];
  $uso = $_GET["Uso"];
  $ubicacion = $_GET["Ubicacion"];
  $extra = $_GET["Extra"];
  $centro = $_GET["Centro"];
  $historia = $_GET["Historia"];
  $arquitectura = $_GET["Arquitectura"];
  $conservacion = $_GET["Conservacion"];
  $cultura = $_GET["Cultura"];
  $historia = str_replace("'", "", $historia);
  $arquitectura = str_replace("'", "", $arquitectura);
  $conservacion = str_replace("'", "", $conservacion);
  $cultura = str_replace("'", "", $cultura);

  $query3 = "INSERT INTO qr VALUES('$codigo')";

  $resultado3 = pg_query($conexion, $query3) or die("El Monumento $nombre ya existe.".pg_last_error());

  $query = "INSERT INTO monumento VALUES('$nombre','$fecha','$uso','$extra','$codigo','$centro','$ubicacion')";

  $resultado = pg_query($conexion, $query) or die("El Monumento $nombre ya existe.".pg_last_error());


  $query2 = "INSERT INTO informacion VALUES('$codigo','$centro','$historia','$arquitectura','$conservacion','$cultura', '$nombre')";

  $resultado2 = pg_query($conexion, $query2) or die("El Monumento $nombre ya existe.".pg_last_error());


  echo "<h2 class=w3-wide w3-center>Se agregó el Monumento $nombre</h2>";
//CREACION DE CODIGO
//---------------------------------------------------------------------------
  $dir = 'temp/';

  if(!file_exists($dir)){
    mkdir($dir);
  }


  if(isset($codigo)){
    $host = getHostByName(getHostName());
    $host = "192.168.1.4";
    $localIP = "http://" . $host . ":5555";
    $contenido = $localIP . "/AppTurismo/indexMonumento.php?codigo=". $codigo;
    $filename = $dir . $codigo. 'QR.png';

    $size = 10;
    $level = 'M';
    $frameSize = 3;
    QRcode::png($contenido, $filename, $level, $size, $frameSize);
    echo '<img src="' . $filename . '"/>';
  }
  ?>
</div>
</div>
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
</body>
</html>