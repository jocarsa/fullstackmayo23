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
                    echo '
                    <div class="controlformulario">
                        <p>'.$fila['Field'].'</p>
                        <input type="text" name="'.$fila["Field"].'" value="'.$intermediario.'" >
                    </div>'; 
                }
                echo '<input type="submit">
                </form>';

?>