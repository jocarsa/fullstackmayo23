<?php
$imagen = imagecreatetruecolor(512, 512);
$blanco =  imagecolorallocate($imagen, 255,255,255);
$color =  imagecolorallocate($imagen, rand(0,255), rand(0,255), rand(0,255));
imagefill($imagen, 0, 0, $blanco);
imagefilledarc(
    $imagen, 
    256, 
    256, 
    400, 
    400, 
    0, 
    45, 
    $color, 
    IMG_ARC_PIE);
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);
?>