<?php

    $nombre = "Jose Vicente";
    $codificado = sha1($nombre);
    echo "El nombre sin codificar es: ".$nombre;
    echo "<br>";
    echo "El nombre codificado es: ".$codificado;

    
?>