<?php
// Gráfica de computadores
    $datos = "";
    $series = "";
        $peticion = "
        SELECT COUNT(navegador) AS numero 
        FROM registros 
        WHERE navegador LIKE '%Windows%'";       
        $resultado = mysqli_query($mysqli, $peticion);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $series .= "Windows,";
            $datos .= $fila['numero'].",";
        }
        $peticion = "
        SELECT COUNT(navegador) AS numero 
        FROM registros 
        WHERE navegador LIKE '%Mac%'";       
        $resultado = mysqli_query($mysqli, $peticion);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $series .= "Mac";
            $datos .= $fila['numero']."";
        }
        echo '
        <img src="inc/grafica.php?datos='.$datos.'&series='.$series.'&titulo=Visitas por sistema operativo" class="grafica">';
?>