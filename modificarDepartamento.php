<html>
<title>Modificar Departamento</title>
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
    <div class="w3-bar w3-orange w3-card-2">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="indexAdmin.html" class="w3-bar-item w3-button w3-padding-large">Regresar al Administrado</a>
      <a href="Departamento.php" class="w3-bar-item w3-button w3-padding-large">Ver Departamentos</a>>
    </div>
  </div>
</div>

<!-- The Contact Section -->
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <h2 class="w3-wide w3-center">Modificar un Departamento</h2>
  <br>
  <div class="w3-row w3-padding-32">
    <form action="DepartamentoModificado.php" method="get">
      <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
        <div class="w3-half">ID Departamento
          <?php
          /*Conexion a la base de datos*/
          $codigo = $_GET["id_dep"];
          $user = "postgres";
          $password = "root";
          $dbname = "AppTurismo";
          $port = "5432";
          $host = "localhost";
          $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
          $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
          /*Obtiene el codigo(id_dep) usando el metodo get que es enviado al momento de dar clic sobre modificar en la pagina de Departamento.php, los datos en los inputs son llenados utilizando un query donde el id_dep sea el mismo, al modificar lo que se deseaba con otro query se manda el id_dep, nombre, y region a DepartamentoModificado.php*/
          $query = "select * from departamento where id_dep='$codigo'";

          $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

          $numReg = pg_num_rows($resultado);
          if($numReg>0){
            while ($fila=pg_fetch_array($resultado)) {
              $nombre = $fila['nombre'];
              $region = $fila['region'];
            }
            echo "</table>";
          }else{
            echo "No hay Registros";
          }

          pg_close($conexion);

          echo "
          <input class=w3-input w3-border type=text required placeholder=ID name=Codigo size=3 maxlength=3 required=required value=$codigo readonly=readonly>
          </div>
          <div class=w3-half>Nombre Departamento
          <input class=w3-input w3-border type=text placeholder='Nombre Departamento' required name=Nombre value=$nombre>
          </div>
          <br>
          <br>
          <div class=w3-half>Región
          <select class=w3-select name=Region required>
          <option value='$region' selected>Anterior: $region</option>
          <option value='Metropolitana'>Metropolitana</option>
          <option value='Norte'>Norte</option>
          <option value='Nor-Oriente'>Nor-Oriente</option>
          <option value='Sur-Oriente'>Sur-Oriente</option>
          <option value='Central'>Central</option>
          <option value='Sur-Occidente'>Sur-Occidente</option>
          <option value='Nor-Occidente'>Nor-Occidente</option>
          <option value='Petén'>Petén</option>
          </select>  
          ";
          ?>
        </div>
      </div>
      <button class='w3-button w3-white w3-section w3-left w3-border w3-border-grey' type=submit>MODIFICAR</button>
    </form>
    <br>
    <br>
    <br>
    <center>
      <img src="images/mapa.jpg">
    </div>
  </div>
  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>
</body>
</html>