<?php
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
