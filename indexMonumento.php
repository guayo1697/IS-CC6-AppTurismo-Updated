<!DOCTYPE html>
<html>

<?php
$codigo = $_GET["codigo"];
$user = "postgres";
$password = "root";
$dbname = "AppTurismo";
$port = "5432";
$host = "localhost";
$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
$query = "select * from informacion where codigo='$codigo'";
$query2 = "select * from monumento where codigo='$codigo'";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
$historia = "";
while ($fila=pg_fetch_array($resultado)) {
  $nombre = $fila['nombre'];
  $historia = $fila['historia'];
  $arquitectura = $fila['arquitectura'];
  $conservacion = $fila['conservacion'];
}
while ($fila2=pg_fetch_array($resultado2)) {
  $fecha = $fila2['fecha_construccion'];
  $ubicacion = $fila2['ubicacion'];
}



echo "
<title>$nombre</title>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='w3.css'>
<style>
div {
  text-align: justify;
  text-justify: inter-word;
}
body {font-family: 'Times New Roman', Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
  font-family: 'Playfair Display';
  letter-spacing: 5px;
}
</style>
<body style='background-color:powderblue;'>

<!-- Barra Navegacion-->
<div class='w3-top'>
<div class='w3-bar w3-blue-grey w3-padding w3-card' style='letter-spacing:4px;'>
<a href='index.html' class='w3-bar-item w3-button'>AppTurismo</a>
<!-- Right-sided navbar links. Hide them on small screens -->
<div class='w3-right w3-hide-small'>
<a href='#Historia' class='w3-bar-item w3-button'>Historia</a>
<a href='#Arquitectura' class='w3-bar-item w3-button'>Arquitectura</a>
<a href='#Ubicación' class='w3-bar-item w3-button'>Ubicación</a>
</div>
</div>
</div>
<!-- Header -->
<header class='w3-display-container w3-content w3-wide' style='max-width:1600px;min-width:500px' id='home'>
<img class='w3-image' src=imagen2.jpg alt='Hamburger Catering' width='1600' height='800'>
<div class='w3-display-bottomleft w3-padding-large w3-opacity'>
</div>

</header> 
<!-- Page content -->
<div class='w3-content w3-blue-grey' style='max-width:1100px'>

<!-- historia -->
<div class='w3-row w3-padding-64' id='Historia'>
<div class='w3-col m6 w3-padding-large w3-hide-small'>
<img src='granjaguar.jpg' class='w3-round w3-image' alt='Table Setting' width='600' height='750'>
</div> <div class='w3-col m6 w3-padding-large'>
<h1 class='w3-center'>HISTORIA</h1><br> 
<h5 class='w3-center'>Fecha Aproximada de Construccion: $fecha</h5>
<p class='w3-large'> $historia</p>
</div>
</div>
<hr>
<!-- arquitectura -->
<div class='w3-row w3-padding-64' id='Arquitectura'>
<div class='w3-col l6 w3-padding-large'>
<h1 class='w3-center'>Arquitectura</h1><br>
<p class='w3-large'> $arquitectura</p>
</div>

<div class='w3-col l6 w3-padding-large'>
<img src='jaguar.jpg' class='w3-round w3-image' alt='jaguar' width='500' height='500'>
</div>
</div>
</div>
<hr>
<!-- Add Google Maps -->
<div class='w3-container w3-content w3-padding-64 w3-blue-grey' style='max-width:1100px' id='Ubicación'>
<h2 class='w3-wide w3-center'>UBICACIÓN</h2>
<br>
<br>
<center>
<iframe src='$ubicacion' width='800' height='600' frameborder='0' style='border:0' allowfullscreen></iframe>
</center>
</div>
";

?>
<!-- End page content -->

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
