<html>
<title>Nuevo Centro Turistico</title>
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
    <div class="w3-bar w3-blue-gray w3-card-2">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="CentroTuristico.php" class="w3-bar-item w3-button w3-padding-large">Ver Centros Turísticos</a>
    </div>
  </div>
</div>

<!-- The Contact Section -->
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <h2 class="w3-wide w3-center">Agregar un Centro Turístico</h2>
  <br>
  <div class="w3-row w3-padding-32">
    <form action="CentroTuristicoAgregado.php" method="get">
      <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
        <div class="w3-half">ID Centro Turístico
          <input size="5" maxlength="5" class=w3-input w3-border type=text required placeholder=ID name=Codigo>
        </div>
        <div class=w3-half>Nombre Centro Turístico
          <input class=w3-input w3-border type=text placeholder='Nombre Centro Turístico' required name=Nombre>
        </div>
        <br>
        <br>
        <div class=w3-half>Dirección   *Opcional
          <input class=w3-input w3-border type=text placeholder=Dirección name=Direccion>
        </div>
        <div class=w3-half>Departamento
          <select class=w3-select name=Departamento required>
            <option value="" disabled selected>Elegir Departamento</option>
            <?php
            /*Conexion a la base de datos*/
            $user = "postgres";
            $password = "root";
            $dbname = "AppTurismo";
            $port = "5432";
            $host = "localhost";
            $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
            $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
/*Envia todos los datos a la pagina de CentroTuristicoAgregado.php pero utiliza un query para mostrar todos los departamentos que se encuentran alctualmente registrados en la base de datos*/
            $query = "select * from departamento";

            $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

            $numReg = pg_num_rows($resultado);
            if($numReg>0){
              while ($fila=pg_fetch_array($resultado)) {
                $nombre = $fila['nombre'];
                $codigo = $fila['id_dep'];
                echo "<option value='$codigo'>$nombre</option>";
              }
            }else{
              echo "No hay Registros";
            }

            pg_close($conexion);
            ?>
          </select>
        </div>
        <button class='w3-button w3-white w3-section w3-left w3-border w3-border-grey' type=submit>AGREGAR</button>
      </form>

    </div>
  </div>
  <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>
</body>
</html>