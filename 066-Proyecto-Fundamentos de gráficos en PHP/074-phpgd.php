<?php
$imagen = imagecreatetruecolor(512, 512);
$rojo = imagecolorallocate($imagen, 255, 0, 0);
$verde = imagecolorallocate($imagen, 0, 255, 0);
imagefilledrectangle($imagen, 50, 50, 150, 150, $rojo);
imagefilledrectangle($imagen, 250, 250, 150, 150, $verde);
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);
?>