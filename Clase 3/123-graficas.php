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
$gris =  imagecolorallocate($imagen, 220,220,220);
imagefill($imagen, 0, 0, $blanco);

$fuente = 'arial.ttf';
$anchura = 800;
$incremento = 800/($numerodedatos+1);
for($y = 0;$y<50;$y++){
    imageline($imagen, 
              20, 
              380-$y*10*(360/$maximo), 
              780, 
              380-$y*10*(360/$maximo), 
              $gris);
            imagettftext($imagen, 10, 0, 5, 380-$y*10*(360/$maximo), $negro, $fuente, $y*10);
}
for($i = 0;$i<$numerodedatos;$i++){
    $color =  imagecolorallocate($imagen, rand(0,255), rand(0,255), rand(0,255));
    imagefilledrectangle(
        $imagen, 
        $incremento*($i+1)-25, 
        380, 
        $incremento*($i+1)+$incremento-4-25, 
        380-($datos[$i]*(360/$maximo)), 
        $color);
    imagettftext($imagen, 
                 10, 
                 0, 
                 $incremento*($i+1)-25+(($incremento*($i+1)+$incremento-4-25)-$incremento*($i+1)-25)/2, 
                 394, 
                 $negro, 
                 $fuente, 
                 $series[$i]);
}
imageline($imagen, 
              20, 
              20, 
              20, 
              380, 
              $negro); 
imageline($imagen, 
              20, 
              380, 
              780, 
              380, 
              $negro);

imagettftext($imagen, 20, 0, 10, 30, $negro, $fuente, $_GET['titulo']);


header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);

?>