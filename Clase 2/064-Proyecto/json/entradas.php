{"entradas":[
<?php
$cadena = "";
$db = new mysqli("localhost", "aplicacion", "aplicacion", "aplicacion");
$peticion = "SELECT * FROM entradas";
$resultado = $db->query($peticion);
while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    $cadena .=  '{
        "imagen":"http://localhost/fullstackmayo23/Clase%202/063-Proyecto/foto/'.$fila['imagen'].'",
        "texto":"'.$fila['texto'].'",
        "fecha":"'.$fila['fecha'].'",
        "usuario":"'.$fila['FK_usuarios_nombrereal'].'"
    },';
}

$cadena = substr_replace($cadena ,"", -1);
echo $cadena;
   
   
?>
]}