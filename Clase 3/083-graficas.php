<?php
$datos = [5,4,3,2,1];
$numerodedatos = count($datos);
$suma = 0;
for($i = 0;$i<$numerodedatos;$i++){
    $suma += $datos[$i];
}
//echo "Hay ".$numerodedatos." elementos en el array";
//echo "<br>";
//echo "Su suma es de: ".$suma;
$imagen = imagecreatetruecolor(512, 512);
$blanco =  imagecolorallocate($imagen, 255,255,255);
imagefill($imagen, 0, 0, $blanco);
$posicionanterior = 0;
for($i = 0;$i<$numerodedatos;$i++){
    $color =  imagecolorallocate($imagen, rand(0,255), rand(0,255), rand(0,255));
    $inicio = $posicionanterior;
    $final = $posicionanterior+($datos[$i]/$suma)*360;
    $posicionanterior += ($datos[$i]/$suma)*360;

    imagefilledarc(
        $imagen, 
        256, 
        256, 
        400, 
        400, 
        $inicio, 
        $final, 
        $color, 
        IMG_ARC_PIE);
}
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);
?>