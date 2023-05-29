<?php
$datos = [1,2,3,4,5];
$numerodedatos = count($datos);
$suma = 0;
for($i = 0;$i<$numerodedatos;$i++){
    $suma += $datos[$i];
}
echo "Hay ".$numerodedatos." elementos en el array";
echo "<br>";
echo "Su suma es de: ".$suma;
$imagen = imagecreatetruecolor(512, 512);
$blanco =  imagecolorallocate($imagen, 255,255,255);
imagefill($imagen, 0, 0, $blanco);
for($i = 0;$i<20;$i++){
    $color =  imagecolorallocate($imagen, rand(0,255), rand(0,255), rand(0,255));
    $inicio = rand(0,360);
    $final = rand(0,360);

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
/*header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);*/
?>