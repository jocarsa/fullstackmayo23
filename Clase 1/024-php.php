<?php
// https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
// Me conecto a una base de datos
$mysqli = mysqli_connect(
    "localhost", 
    "aplicacion", 
    "aplicacion", 
    "aplicacion"
);
$peticion = "
    SELECT 
    * 
    FROM 
    usuarios";
$resultado = mysqli_query($mysqli, $peticion);
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "El nombre de usuario es:".$fila['nombredeusuario']."<br>";
    echo "El mail de usuario es:".$fila['mail']."<br>";
    echo "<hr>";
}
?>