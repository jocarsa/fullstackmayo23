<tbody>
<?php
    if(!isset($_GET['pagina'])){
        $pagina = 1;
    }else{
        $pagina = $_GET['pagina'];
    }
    $peticion = "
        SELECT 
        * 
        FROM 
        ".$_GET['tabla']."";
    if(isset($_GET['buscar'])){
        foreach ($_GET as $clave => $valor){
            if($clave == "tabla"){
                
            }else if($clave == "buscar"){
                
            }else if($clave == "pagina"){
                
            }else{
                $peticion .= " WHERE ".$clave." LIKE '%".$valor."%'";
            }
        }
    }else{
     $peticion .= "
        LIMIT 10
        OFFSET ".(($pagina-1)*10)."
        "
        
        ;
        }
    echo "<div class='codigo'>SQL> ".$peticion."</div>";
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
            }
            else if(strpos($clave, "foto") !== false){
                echo "<img src='foto/".$valor."'>";
            }else if(strpos($clave, "fecha") !== false){
                echo date("Y-m-d H:i:s", $valor);
            }else{
                echo $valor;
            }

            echo '</td>';
        }
        // Botones de actualizar y borrar
        echo '         
                <td><a href="?tabla='.$_GET['tabla'].'&operacion=actualizar&id='.$fila['Identificador'].'"><button class="botoneditar"><img src="img/iconoeditar.svg"></button></a></td>
                <td>
                <a href="?tabla='.$_GET['tabla'].'&operacion=eliminar&id='.$fila['Identificador'].'"><button class="botoneliminar"><img src="img/iconoeliminar.svg"></button></a></td>
            ';
        // Final de la fila
        echo '</tr>';
    }
?>
</tbody>