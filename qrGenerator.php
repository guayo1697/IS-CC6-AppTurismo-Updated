<?php
  require 'phpqrcode/qrlib.php';
  $dir = 'temp/';

  if(!file_exists($dir)){
    mkdir($dir);
  }

  $filename = $dir . 'test2.png';

  $size = 10;
  $level = 'M';
  $frameSize = 3;
  $contenido = 'Guayo come polla';

  QRcode::png($contenido, $filename, $level, $size, $frameSize);

  echo '<img src="' . $filename . '"/>';
?>
