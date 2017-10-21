<html>
<title>AppTurismo-QR ADMIN</title>
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
  <div class="w3-bar w3-yellow w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="indexAdminQR.html" class="w3-bar-item w3-button w3-padding-large">Crear otro codigo</a>
    </div>
  </div>
</div>
<div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px" id="contact">

  <h2 class="w3-wide w3-center">Se ha creado un Codigo QR</h2>





<?php
  require 'phpqrcode/qrlib.php';
  $dir = 'temp/';

  if(!file_exists($dir)){
    mkdir($dir);
  }


  if(isset($_GET['nombre'])){
    $filename = $_GET["nombre"];
    $contenido = "http://192.168.1.8:5555/AppTurismo/index". $filename. ".html";
    $filename = $dir . $filename . '.png';

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
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
</body>
</html>
