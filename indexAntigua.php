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

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);
$historia = "";
while ($fila=pg_fetch_array($resultado)) {
$nombre = $fila['nombre'];
$historia = $fila['historia'];
$arquitectura = $fila['arquitectura'];
$conservacion = $fila['conservacion'];
}



 echo "
 	<title>$nombre</title>
 	<meta charset='UTF-8'>
 	<meta name='viewport' content='width=device-width, initial-scale=1'>
 	<link rel='stylesheet' href='w3.css'>
 	<style>
 	body {font-family: 'Times New Roman', Georgia, Serif;}
 	h1,h2,h3,h4,h5,h6 {
 	    font-family: 'Playfair Display';
 	    letter-spacing: 5px;
 	}
 	</style>
 	<body>

 	<!-- Barra Navegacion-->
 	<div class='w3-top'>
 	  <div class='w3-bar w3-white w3-padding w3-card' style='letter-spacing:4px;'>
 	    <a href='index.html' class='w3-bar-item w3-button'>Gourmet au Catering</a>
 	    <!-- Right-sided navbar links. Hide them on small screens -->
 	    <div class='w3-right w3-hide-small'>
 	      <a href='#historia' class='w3-bar-item w3-button'>Historia</a>
 	      <a href='#menu' class='w3-bar-item w3-button'>Menu</a>
 	      <a href='#contact' class='w3-bar-item w3-button'>Contact</a>
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
	<div class='w3-content' style='max-width:1100px'>

  	<!-- historia -->
  	<div class='w3-row w3-padding-64' id='historia'>
    <div class='w3-col m6 w3-padding-large w3-hide-small'>
    <img src='granjaguar.jpg' class='w3-round w3-image' alt='Table Setting' width='600' height='750'>
    </div> <div class='w3-col m6 w3-padding-large'>
 	      <h1 class='w3-center'>HISTORIA</h1><br> 
 	      <h5 class='w3-center'>MAS HISTORIA</h5>
 	      <p class='w3-large'> $historia</p>
</div>
</div>";

?>


  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Menu</h1><br>
      <h4>Bread Basket</h4>
      <p class="w3-text-grey">Assortment of fresh baked fruit breads and muffins 5.50</p><br>
    
      <h4>Honey Almond Granola with Fruits</h4>
      <p class="w3-text-grey">Natural cereal of honey toasted oats, raisins, almonds and dates 7.00</p><br>
    
      <h4>Belgian Waffle</h4>
      <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
    
      <h4>Scrambled eggs</h4>
      <p class="w3-text-grey">Scrambled eggs, roasted red pepper and garlic, with green onions 7.50</p><br>
    
      <h4>Blueberry Pancakes</h4>
      <p class="w3-text-grey">With syrup, butter and lots of berries 8.50</p>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="/w3images/tablesetting.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" width="500" height="750">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste. Do not hesitate to contact us.</p>
    <p class="w3-text-blue-grey w3-large"><b>Catering Service, 42nd Living St, 43043 New York, NY</b></p>
    <p>You can also contact us by phone 00553123-2323 or email catering@catering.com, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
