<?php
/*Requiere la libreria encontrada en internet para crear los codigos qr, guarda la imagen en la carpeta /temp en donde el nombre de la imagen en el codigo junto con "QR" en un archivo .png*/
  require 'phpqrcode/qrlib.php';
  $dir = 'temp/';

  if(!file_exists($dir)){
    mkdir($dir);
  }

  $filename = $_GET["nombre"];
  $contenido = $_GET["contenido"];
  $filename = $dir . $filename .'.png';

  $size = 10;
  $level = 'M';
  $frameSize = 3;
  QRcode::png($contenido, $filename, $level, $size, $frameSize);
  echo '<img src="' . $filename . '"/>';
?>
