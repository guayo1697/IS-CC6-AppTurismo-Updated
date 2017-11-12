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
  $cultura = $fila['cultura_popular'];
}
while ($fila2=pg_fetch_array($resultado2)) {
  $fecha = $fila2['fecha_construccion'];
  $ubicacion = $fila2['ubicacion'];
  $uso = $fila2['uso'];
  $extra = $fila2['extra'];
}



echo "
<title>$nombre</title>
<link rel='stylesheet' href='w3.css'>
<style>
p {
  font-family: 'Times New Roman', Georgia, Serif;
}
div {
  text-align: justify;
  text-justify: inter-word;
}
img {
  vertical-align: middle;
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
<!-- Right-sided navbar links. Hide them on small screens -->
<a href='#Historia' class='w3-bar-item w3-button'>Historia</a>
<a href='#Arquitectura' class='w3-bar-item w3-button'>Arquitectura</a>
<a href='#Conservacion' class='w3-bar-item w3-button'>Conservacion</a>
<a href='#Cultura' class='w3-bar-item w3-button'>Cultura Popular</a>";
if($extra != ""){
  echo "<a href='#Extra' class='w3-bar-item w3-button'>Extra</a>";
}
echo"
<a href='#Ubicación' class='w3-bar-item w3-button'>Ubicación</a>
</div>
</div>
</div>
<!-- Header -->
<header class='w3-display-container w3-content w3-wide' style='max-width:1600px;min-width:500px' id='home'>
<img class='w3-image' src=images/imagen".$codigo."1.jpg width='1600' height='800'>
<div class='w3-display-bottomleft w3-padding-large w3-opacity'>
</div>

</header> 
<!-- Page content -->
<div class='w3-content w3-blue-grey' style='max-width:1100px'>
<br>
<br>
<br>
<center><h1 class='w3-center'>$nombre</h1><br></center>
<hr>
<!-- historia -->
<div class='w3-row w3-padding-64' id='Historia'>
<div class='w3-col m6 w3-padding-large w3-hide-small'>
<br>
<br>
<img src='images/imagen".$codigo."2.jpg' class='w3-round w3-image' width='600' height='750'>
</div> <div class='w3-col m6 w3-padding-large'>
<h1 class='w3-center'>Historia</h1><br> 
<h5 class='w3-center'>Año Aproximado de Construccion:". substr($fecha, 0,4)."</h5>
<h5 class='w3-center'>Uso:". $uso."</h5>
<p class='w3-large'> $historia</p>
</div>
</div>
<hr>
<!-- arquitectura -->
<div class='w3-row w3-padding-64' id='Arquitectura'>
<h1 class='w3-center'>Arquitectura</h1><br>
<center>
<table width='1000' cellspacing='30'>
<tr>
<td><p class='w3-large' align='justify' style='font-family:Georgia'> $arquitectura</p></td>
<td><img src='images/imagen".$codigo."3.jpg' width='500' height='300'><td>
</tr>
</table>
</center>
</div>
<hr>
<!-- conservacion -->
<div class='w3-row w3-padding-64' id='Conservacion'>
<div class='w3-col m6 w3-padding-large w3-hide-small'>
<br>
<br>
<img src='images/imagen".$codigo."4.jpg' class='w3-round w3-image' width='600' height='750'>
</div> <div class='w3-col m6 w3-padding-large'>
<h1 class='w3-center'>Conservación</h1><br> 
<p class='w3-large'> $conservacion</p>
</div>
</div>
<hr>
<!-- cultura popular -->
<div class='w3-row w3-padding-64' id='Cultura'>
<h1 class='w3-center'>Cultura Popular</h1><br>
<center>
<table width='1000' cellspacing='30'>
<tr>
<td><p class='w3-large' align='justify' style='font-family:Georgia'> $cultura</p></td>
<td><img src='images/imagen".$codigo."5.jpg' width='500' height='300'><td>
</tr>
</table>
</center>
</div>
<hr>";
if($extra != ""){
  echo "<!-- Extra -->
  <center>
  <div class='w3-row w3-padding-64' id='Extra'>
  <div class='w3-center w3-padding-large w3-hide-small'>
  <br>
  <br>
  </div> <div class='w3-center m6 w3-padding-large'>
  <h1 class='w3-center'>Datos Extras</h1><br> 
  <p class='w3-large'> $extra</p>
  </div>
  </div>
  </center>";
}
echo"
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
