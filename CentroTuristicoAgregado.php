<html>
<title>Centro Turístico Agregado</title>
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
      <a href="CentroTuristico.php" class="w3-bar-item w3-button w3-padding-large">Ver Centros Turísticos</a>
      <a href="nuevoMonumento.php" class="w3-bar-item w3-button w3-padding-large">Agregar otro Centro Turístico</a>
    </div>
  </div>
</div>

<div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px">



  <?php
/*Conexion a la base de datos*/
  $user = "postgres";
  $password = "root";
  $dbname = "AppTurismo";
  $port = "5432";
  $host = "localhost";
  $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
/*Obtiene el codigo(id_centro), nombre, direccion y el id_dep de la pagina de nuevoCentroTuristico.html usando el metodo get, para luego con un query realizar el insert en la base de datos*/
  $codigo = $_GET["Codigo"];
  $nombre = $_GET["Nombre"];
  $direccion = $_GET["Direccion"];
  $departamento = $_GET["Departamento"];

  $query = "INSERT INTO centro_turistico VALUES('$codigo','$nombre','$direccion','$departamento')";

  $resultado = pg_query($conexion, $query) or die("El Centro Turístico $nombre ya existe.");
  echo "<h2 class=w3-wide w3-center>Se agregó el Centro Turístico $nombre</h2>"
  ?>
</div>
</div>
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
</body>
</html>