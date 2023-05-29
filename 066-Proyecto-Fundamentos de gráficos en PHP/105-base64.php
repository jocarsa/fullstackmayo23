<?php

    $nombre = "Jose Vicente";
    $codificado = base64_encode($nombre);
    echo "El nombre sin codificar es: ".$nombre;
    echo "<br>";
    echo "El nombre codificado es: ".$codificado;
    
?>