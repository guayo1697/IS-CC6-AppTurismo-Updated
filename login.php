<?php
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
echo "$usuario";
echo "$contrasena";
if($usuario == "adminqr" And $contrasena == "adminqr"){
	header("Location: /AppTurismo/indexAdminQR.html ");
}
?>
