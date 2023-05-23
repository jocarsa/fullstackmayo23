<?php
$titulo = $_GET['titulo'];
$cojodatos = $_GET['datos'];
$cojoseries = $_GET['series'];
$datos = explode(",",$cojodatos);
$series = explode(",",$cojoseries);
$numerodedatos = count($datos);
$maximo = 0;
for($i = 0;$i<$numerodedatos;$i++){
    if($datos[$i] > $maximo){
        $maximo = $datos[$i];
    }
}

$imagen = imagecreatetruecolor(800, 400);
$blanco =  imagecolorallocate($imagen, 255,255,255);
$negro =  imagecolorallocate($imagen, 50,50,50);
imagefill($imagen, 0, 0, $blanco);

$fuente = 'arial.ttf';
$anchura = 800;
$incremento = 800/($numerodedatos+1);
for($i = 0;$i<$numerodedatos;$i++){
    $color =  imagecolorallocate($imagen, rand(0,255), rand(0,255), rand(0,255));
    imagefilledrectangle($imagen, $incremento*($i+1), 380, $incremento*($i+1)+$incremento-4, 380-$datos[$i]*10, $color);
}
    
imagettftext($imagen, 20, 0, 10, 30, $negro, $fuente, $_GET['titulo']);


header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);

?>