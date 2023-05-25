<?php

echo "Actualizando un elemento existente en: ".$_GET['tabla'];
                // Primero cargo los datos el registro que estoy solicitando
                $peticion = "SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'];
                $resultado = mysqli_query($mysqli, $peticion);
                $precargado = [];
                while ($fila = mysqli_fetch_assoc($resultado)) {  
                    foreach ($fila as $clave => $valor){
                        $precargado[$clave] = $valor;
                    }
                }
                // Luego vuelvo los registros sobre el fomulario
                $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'];
                echo '<form method="POST" action="?tabla='.$_GET['tabla'].'&operacion=procesaactualizar">';
                $resultado = mysqli_query($mysqli, $peticion);
                while ($fila = mysqli_fetch_assoc($resultado)) { 
                    $intermediario = $precargado[$fila['Field']];
                    echo '<div class="controlformulario">';
                    echo '<p>'.$fila['Field'].'</p>';
                    if(strpos($fila['Field'], "FK") !== false){
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
                            echo '<option value="'.$fila2['Identificador'].'" ';
                            if($fila2['Identificador'] == $intermediario){
                                echo " selected ";
                            }
                            echo '>'.$fila2['dato'].'</option>';
                        }
                        echo '</select>';
                    }else{
                        echo '<input type="text" name="'.$fila["Field"].'" value="'.$intermediario.'" >';
                    }
                    echo '</div>'; 
                }
                echo '<input type="submit">
                </form>';

?>