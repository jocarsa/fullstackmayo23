<?php
//header('Content-Type: image/jpeg');
$imagen = imagecreatefromjpeg("josevicente.jpg");
$miniatura = imagecreatetruecolor(256, 256);
imagecopyresized($miniatura, $imagen, 0, 0, 0, 0, 256, 256, 400, 400);

$fuente = 'arial.ttf';
$white = imagecolorallocate($miniatura, 255, 255, 255);
imagettftext($miniatura, 20, 0, 10, 200, $white, $fuente, "Hola");
imagejpeg($miniatura,"miniatura.jpg");
?>