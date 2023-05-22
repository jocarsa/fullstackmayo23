<?php

$db = new mysqli("localhost", "aplicacion", "aplicacion", "aplicacion");
$peticion = "
INSERT 
INTO clientes 
VALUES
(NULL,
'".$_GET['nombre']."',
'".$_GET['correo']."',
'".$_GET['usuario']."',
'".$_GET['contrasena']."',
'')";
$resultado = $db->query($peticion);

   echo '{"mensaje":"Tu usuario es correcto","usuario":"'.$_GET['usuario'].'"}';
?>
