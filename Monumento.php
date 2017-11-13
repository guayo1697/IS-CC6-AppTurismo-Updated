<html>
<title>Monumentos</title>
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
    <div class="w3-bar w3-pale-green w3-card-2">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="indexAdmin.html" class="w3-bar-item w3-button w3-padding-large">Regresar al Administrador</a>
    </div>
  </div>
</div>

<!-- The Contact Section -->
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <h2 class="w3-wide w3-center">Monumentos</h2>
  <br>
  <div class="w3-row w3-padding-32">
    <table class="w3-table w3-striped">
      <tr>
        <th><b>Código</b></th>
        <th>Nombre del Monumento</th>
        <th>Centro Turistico</th>
      </tr>

      <?php
/*Conexion a la base de datos*/
      $user = "postgres";
      $password = "root";
      $dbname = "AppTurismo";
      $port = "5432";
      $host = "localhost";

      $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

      $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
/*El siguiente query es para obtener todos los monumenos registrados en la base de datos y retorna un arreglo con todos los datos que se encuentran dentro de la tabla de Monumento que luego son despelgados en una tabla de HTML se envia el codigo ya se para enviar o modificar la tupla*/
      $query = "select * from monumento";

      $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

      $numReg = pg_num_rows($resultado);

      if($numReg>0){
        while ($fila=pg_fetch_array($resultado)) {
          $codigo = $fila['codigo'];
          $nombre = $fila['nombre'];
          $centro = $fila['id_centro'];
          $query2 = "select * from centro_turistico where id_centro='$centro'";
          $resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");
          $fila2=pg_fetch_array($resultado2);
          $nombrecentro = $fila2['nombre'];
          echo "<tr><td>".$codigo."</td>";
          echo "<td>".$nombre."</td>";
          echo "<td>".$nombrecentro."</td>";
          echo "\t\t<td><a href=modificarMonumento.php?codigo=$codigo>Modificar</a></td>";
          echo "\t\t<td><a href=eliminarMonumento.php?codigo=$codigo>Eliminar</a></td>";
        }
        echo "</table>";
      }
      else{
        echo "No hay Registros";
      }

      pg_close($conexion);

      ?>

    </div>
  </div>

  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>
</body>
</html>