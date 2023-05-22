{"entradas":[
<?php
$cadena = "";
$db = new mysqli("localhost", "aplicacion", "aplicacion", "aplicacion");
$peticion = "SELECT * FROM entradas";
$resultado = $db->query($peticion);
while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    $cadena .=  '{
        "imagen":"'.$fila['imagen'].'",
        "texto":"'.$fila['texto'].'",
        "fecha":"'.$fila['fecha'].'",
        "usuario":"'.$fila['FK_usuarios_nombrereal'].'"
    },';
}

$cadena = substr_replace($cadena ,"", -1);
echo $cadena;
   
   
?>
]}