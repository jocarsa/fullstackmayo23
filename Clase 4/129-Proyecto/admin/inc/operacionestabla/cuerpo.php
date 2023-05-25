<tbody>
<?php

    $peticion = "
        SELECT 
        * 
        FROM 
        ".$_GET['tabla'];
    $resultado = mysqli_query($mysqli, $peticion);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Principio de la fila
        echo '<tr>';
        // Proceso cada uno de los campos
        foreach ($fila as $clave => $valor){
            echo '<td>';
            if (strpos($clave, "FK") !== false) {
                //echo "me voy a otra tabla";
                $columna = $clave;
                $partido = explode("_",$columna);
                $nombredelatabla = $partido[1];
                $nombredelacolumna = $partido[2];
                $peticion2 = "

                    SELECT 
                    ".$nombredelacolumna." AS dato 
                    FROM 
                    ".$nombredelatabla."
                    WHERE Identificador = ".$valor;

                //echo $peticion2;
                $resultado2 = mysqli_query($mysqli, $peticion2);
                while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                    echo $fila2["dato"];
                }
            }else if(strpos($clave, "imagen") !== false){
                echo "<img src='foto/".$valor."'>";
            }else{
                echo $valor;
            }

            echo '</td>';
        }
        // Botones de actualizar y borrar
        echo '         
                <td><a href="?tabla='.$_GET['tabla'].'&operacion=actualizar&id='.$fila['Identificador'].'"><button class="botoneditar">Editar</button></a></td>
                <td>
                <a href="?tabla='.$_GET['tabla'].'&operacion=eliminar&id='.$fila['Identificador'].'"><button class="botoneliminar">Eliminar</button></a></td>
            ';
        // Final de la fila
        echo '</tr>';
    }
?>
</tbody>