<?php
header('Content-Type: image/jpeg');
$imagen = imagecreatefromjpeg("josevicente.jpg");
$miniatura = imagecreatetruecolor(256, 256);
imagecopyresized($miniatura, $imagen, 0, 0, 0, 0, 256, 256, 400, 400);
imagejpeg($miniatura);
?>