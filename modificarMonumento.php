<html>
<title>Modificar Monumento</title>
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
    <div class="w3-bar w3-indigo w3-card-2">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="indexAdmin.html" class="w3-bar-item w3-button w3-padding-large">Regresar al Administrador</a>
      <a href="Monumento.php" class="w3-bar-item w3-button w3-padding-large">Ver Monumentos</a>
    </div>
  </div>
</div>

<!-- The Contact Section -->
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <h2 class="w3-wide w3-center">Modificar un Monumento</h2>
  <br>
  <div class="w3-row w3-padding-64">
    <form action="MonumentoModificado.php" method="get">
      <div class="w3-row-padding" style="margin:0 -64x 8px 64px">
        <div class="w3-half">ID Monumento
          <?php
          $user = "postgres";
          $password = "root";
          $dbname = "AppTurismo";
          $port = "5432";
          $host = "localhost";
          $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
          $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

          $codigo = $_GET["codigo"];
          $query2 = "select * from monumento where codigo='$codigo'";

          $resultado2 = pg_query($conexion, $query2) or die("Error en la Consulta SQL");

          $numReg2 = pg_num_rows($resultado2);
          if($numReg2>0){
            while ($fila2=pg_fetch_array($resultado2)) {
              $nombre = $fila2['nombre'];
              $fecha = $fila2['fecha_construccion'];
              $uso = $fila2['uso'];
              $extra = $fila2['extra'];
              $centro = $fila2['id_centro'];
              $ubicacion = $fila2['ubicacion'];
            }
            echo "</table>";
          }else{
            echo "No hay Registros";
          }

          $query3 = "select * from centro_turistico where id_centro='$centro'";

          $resultado3 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");

          $numReg3 = pg_num_rows($resultado3);
          if($numReg3>0){
            while ($fila3=pg_fetch_array($resultado3)) {
              $nombrecentro = $fila3['nombre'];
            }
            echo "</table>";
          }else{
            echo "No hay Registros";
          }

          echo"<input size='5' maxlength='5' class=w3-input w3-border type=text required placeholder=ID name=Codigo readonly=readonly value=$codigo>
          </div>
          <div class='w3-half'>Nombre de Monumento
          <input size='5'  class=w3-input w3-border type=text required placeholder='Nombre de Monumento' name=Nombre value='$nombre'>
          </div>
          <div class=w3-half>Fecha de Construcción
          <input class=w3-input w3-border type=date placeholder='Fecha de Construcción' required name=Fecha value=$fecha>
          </div>
          <br>
          <br>
          <div class=w3-half>Ubicación
          <input class=w3-input w3-border type=text placeholder=Ubicación required name=Ubicacion value='$ubicacion'>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <div>Extra
          <textarea class='w3-input w3-border' style='resize:none' name=Extra placeholder='Extra'>$extra</textarea>
          </div>
          <br>
          <div class=w3-half>Centro Turistico
          <select class=w3-select name=Centro required>
          <option value=$centro selected>Anterior: $nombrecentro</option>";

          $query = "select * from centro_turistico where id_centro!='$centro'";

          $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

          $numReg = pg_num_rows($resultado);
          if($numReg>0){
            while ($fila=pg_fetch_array($resultado)) {
              $nombre = $fila['nombre'];
              $codigocentro = $fila['id_centro'];
              echo "<option value='$codigocentro'>$nombre</option>";
            }
          }else{
            echo "No hay Registros";
          }

          $codigo = $_GET["codigo"];
          $query4 = "select * from informacion where codigo='$codigo'";

          $resultado4 = pg_query($conexion, $query4) or die("Error en la Consulta SQL");

          $numReg4 = pg_num_rows($resultado4);
          if($numReg4>0){
            while ($fila4=pg_fetch_array($resultado4)) {
              $historia = $fila4['historia'];
              $arquitectura = $fila4['arquitectura'];
              $conservacion = $fila4['conservacion'];
              $cultura = $fila4['cultura_popular'];
            }
          }else{
            echo "No hay Registros";
          }
          echo "$historia";
          echo"</select>
          </div>Uso
          <div class=w3-half>
          <input class=w3-input w3-border type=text placeholder=Uso required name=Uso value='$uso'>
          </div>
          <br>
          <br>
          <br>
          <br>
          <div>Historia
          <textarea class='w3-input w3-border' style='resize:vertical' name=Historia placeholder='Historia'>$historia</textarea>
          </div>
          <div>Arquitectura
          <textarea class='w3-input w3-border' style='resize:vertical' name=Arquitectura placeholder='Arquitectura'>$arquitectura</textarea>
          </div>
          <div>Conservación
          <textarea class='w3-input w3-border' style='resize:vertical' name=Conservacion placeholder='Conservación'>$conservacion</textarea>
          </div>
          <div>Cultura Popular
          <textarea class='w3-input w3-border' style='resize:vertical' name=Cultura placeholder='Cultura Popular'>$cultura</textarea>
          </div>";

          pg_close($conexion);
          ?>
          <button class='w3-button w3-white w3-section w3-left w3-border w3-border-grey' type=submit>MODIFICAR</button>
        </form>

      </div>
    </div>
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
      <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>
  </body>
  </html>