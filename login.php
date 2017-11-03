<?php
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
echo "$usuario";
echo "$contrasena";
if($usuario == "admin" And $contrasena == "admin"){
	header("Location: /AppTurismo/indexAdmin.html ");
}else{
	echo"<html>
<title>AppTurismo-LOGIN FAILED</title>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='w3.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<style>
body {font-family: 'Lato', sans-serif}
.mySlides {display: none}
</style>
<body>
  <!-- Navbar -->
  <div class='w3-top'>
    <div class='w3-bar w3-blue w3-card-2'>
      <a class='w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right' href='javascript:void(0)' onclick='myFunction()' title='Toggle Navigation Menu'><i class='fa fa-bars'></i></a>
      <a href='index.html' class='w3-bar-item w3-button w3-padding-large'>HOME</a>
      <a href='indexLogin.html' class='w3-bar-item w3-button w3-padding-large'>Intentar de Nuevo</a>
    </div>
  </div>
</div>

<!-- The Contact Section -->
<div class='w3-container w3-content w3-padding-64' style='max-width:800px' id='contact'>
  <h2 class='w3-wide w3-center'>LOGIN FAILED</h2>
  <br>
  <div class='w3-row w3-padding-32'>
    <center><H1>El usuario o contraseña son incorrectos!</H1><center>

  </div>
</div>
<footer class='w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge'>
  <i class='fa fa-facebook-official w3-hover-opacity'></i>
  <i class='fa fa-instagram w3-hover-opacity'></i>
  <i class='fa fa-linkedin w3-hover-opacity'></i>
  <p class='w3-medium'>Powered by <a href='https://www.w3schools.com/w3css/default.asp' target='_blank'>w3.css</a></p>
</footer>
</body>
</html>
";
}
?>
