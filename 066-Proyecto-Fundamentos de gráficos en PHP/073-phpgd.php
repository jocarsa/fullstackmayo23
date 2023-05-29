<?php
$imagen = imagecreatetruecolor(512, 512);
$rojo = imagecolorallocate($imagen, 255, 0, 0);
imagefilledrectangle($imagen, 50, 50, 150, 150, $rojo);
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);
?>