<?php
$imagen = imagecreatetruecolor(512, 512);
$rojo = imagecolorallocate($imagen, 255, 0, 0);
$verde = imagecolorallocate($imagen, 0, 255, 0);
$blanco = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $blanco);
imagefilledellipse($imagen, 256, 256, 200, 200, $rojo);
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);
?>