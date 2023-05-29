<?php

    $nombre = "Jose Vicente";
    $codificado = base64_encode($nombre);
    $descodificado = base64_decode($codificado);
    echo "El nombre sin codificar es: ".$nombre;
    echo "<br>";
    echo "El nombre codificado es: ".$codificado;
    echo "<br>";
    echo "El nombre descodificado es: ".$descodificado;
    
?>