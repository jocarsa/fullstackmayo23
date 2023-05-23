<?php
$imagen = imagecreatetruecolor(512, 512);
$rojo = imagecolorallocate($imagen, 255, 0, 0);
$verde = imagecolorallocate($imagen, 0, 255, 0);
$blanco = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $blanco);
imagefilledarc(
    $imagen, 
    256, 
    256, 
    400, 
    400, 
    0, 
    45, 
    $rojo, 
    IMG_ARC_PIE);
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);
?>