<?php

// Gráfica de usuarios más activos
    $datos = "";
    $series = "";
        $peticion = "
        SELECT 
            clientes.usuario AS nombreusuario,
            COUNT(titulo) AS numero
            FROM `entradas` 
            LEFT JOIN clientes
            ON entradas.FK_clientes_nombrecompleto = clientes.Identificador
            GROUP BY (`FK_clientes_nombrecompleto`)
        ";       
        $resultado = mysqli_query($mysqli, $peticion);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $series .= $fila['nombreusuario'].",";
            $datos .= $fila['numero'].",";
        }
        
        
        $series = substr_replace($series ,"", -1);
     $datos = substr_replace($datos ,"", -1);
        echo '
        <img src="inc/grafica.php?datos='.$datos.'&series='.$series.'&titulo=Usuarios más activos" class="grafica">';

?>