
<html>
<title>Modificar Centro Turistico</title>
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
    <div class="w3-bar w3-light-blue w3-card-2">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="indexAdmin.html" class="w3-bar-item w3-button w3-padding-large">Regresar al Administrado</a>
      <a href="CentroTuristico.php" class="w3-bar-item w3-button w3-padding-large">Ver Centros Turísticos</a>
    </div>
  </div>
</div>

<!-- The Contact Section -->
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <h2 class="w3-wide w3-center">Modificar un Centro Turístico</h2>
  <br>
  <div class="w3-row w3-padding-32">
    <form action="CentroTuristicoModificado.php" method="get">
      <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
        <div class="w3-half">ID Centro Turístico
          <?php
          $codigo = $_GET["id_centro"];
          $user = "postgres";
          $password = "root";
          $dbname = "AppTurismo";
          $port = "5432";
          $host = "localhost";
          $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
          $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

          $query = "select * from centro_turistico where id_centro='$codigo'";

          $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

          $numReg = pg_num_rows($resultado);
          if($numReg>0){
            while ($fila=pg_fetch_array($resultado)) {
              $nombre = $fila['nombre'];
              $direccion = $fila['direccion'];
              $departamento = $fila['id_dep'];
            }
            echo "</table>";
          }else{
            echo "No hay Registros";
          }

          $query3 = "select * from departamento where id_dep='$departamento'";

          $resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");

          $numReg3 = pg_num_rows($resultado3);
          if($numReg3>0){
            while ($fila3=pg_fetch_array($resultado3)) {
              $nombredep = $fila3['nombre'];
            }
          }else{
            echo "No hay Registros";
          }

          echo "
          <input size=5 maxlength=5 class=w3-input w3-border type=text required placeholder=ID name=Codigo value=$codigo>
          </div>
          <div class=w3-half>Nombre Centro Turístico
          <input class=w3-input w3-border type=text placeholder='Nombre Centro Turístico' required name=Nombre value='$nombre'>
          </div>
          <br>
          <br>
          <div class=w3-half>Dirección   *Opcional
          <input class=w3-input w3-border type=text placeholder=Dirección name=Direccion value='$direccion'>
          </div>
          <div class=w3-half>Departamento
          <select class=w3-select name=Departamento required>
          <option value='$departamento' selected>Anterior: $nombredep</option>";

          $query2 = "select * from departamento where id_dep!='$departamento'";

          $resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");

          $numReg2 = pg_num_rows($resultado2);
          if($numReg2>0){
            while ($fila2=pg_fetch_array($resultado2)) {
              $nombre = $fila2['nombre'];
              $codigodep = $fila2['id_dep'];
              echo "<option value='$codigodep'>$nombre</option>";
            }
          }else{
            echo "No hay Registros";
          }

          pg_close($conexion);
          ?>
        </select>
      </div>
      <button class='w3-button w3-white w3-section w3-left w3-border w3-border-grey' type=submit>MODIFICAR</button>
    </form>

  </div>
</div>
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
</body>
</html>