<?php
// Gráfica de PC contra moviles
    $datos = "";
    $series = "";
        $peticion = "
        SELECT COUNT(navegador) AS numero 
        FROM registros 
        WHERE 
        navegador LIKE '%iPhone%'
        OR
        navegador LIKE '%Android%'
        ";       
        $resultado = mysqli_query($mysqli, $peticion);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $series .= "Móvil,";
            $datos .= $fila['numero'].",";
        }
        $peticion = "
        SELECT COUNT(navegador) AS numero 
        FROM registros 
        WHERE 
        navegador NOT LIKE '%iPhone%'
        AND
        navegador NOT LIKE '%Android%'";       
        $resultado = mysqli_query($mysqli, $peticion);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $series .= "PC";
            $datos .= $fila['numero']."";
        }
        echo '
        <img src="inc/grafica.php?datos='.$datos.'&series='.$series.'&titulo=Móviles versus PC" class="grafica">';
?>