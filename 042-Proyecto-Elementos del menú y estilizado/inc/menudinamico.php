<?php
    $mysqli = mysqli_connect(
                "localhost", 
                "aplicacion", 
                "aplicacion", 
                "aplicacion"
            );
    $peticion = "SHOW TABLES";
    $resultado = mysqli_query($mysqli, $peticion);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<li><a href="?tabla='.$fila['Tables_in_aplicacion'].'">'.$fila['Tables_in_aplicacion'].'</a></li>';
    }
?>