<?php
require "../inc/blacklist.php";
require "../inc/inyeccion.php";
require "../inc/config.php";
require "../inc/registro.php";

$peticion = "
INSERT 
INTO entradas 
VALUES
(NULL,
'imagen',
'".date('U')."',
'".$_POST['mensaje']."',
'titulo',
'josevicente')";
//echo $peticion;
mysqli_query($mysqli, $peticion);

   echo '{"mensaje":"Tu usuario es correcto","usuario":"'.$_GET['usuario'].'"}';
?>