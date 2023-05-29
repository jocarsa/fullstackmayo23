<?php

    echo '<select name="'.$fila['Field'].'"> ';
            $campo = $fila['Field'];
            $partido = explode("_",$fila['Field']);
            $tabla = $partido[1];
            $campo = $partido[2];
            $peticion2 = "
            SELECT 
            ".$campo." AS dato,
            Identificador AS Identificador
            FROM ".$tabla;
            $resultado2 = mysqli_query($mysqli, $peticion2);
            while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                echo '<option value="'.$fila2['Identificador'].'">'.$fila2['dato'].'</option>';
            }
            echo '</select>';

?>