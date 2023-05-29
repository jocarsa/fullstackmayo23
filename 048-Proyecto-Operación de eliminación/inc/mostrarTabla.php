<?php 
    if(isset($_GET['operacion']) && $_GET['operacion'] == "eliminar"){
        $mysqli = mysqli_connect(
            "localhost", 
            "aplicacion", 
            "aplicacion", 
            "aplicacion"
        );
    }
    $peticion = "
    DELETE 
    FROM ".$_GET['tabla']." 
    WHERE Identificador = ".$_GET['id']."
    ";
    $resultado = mysqli_query($mysqli, $peticion);
?>
<h2><?php echo $_GET['tabla'] ?></h2><a href=""><button id="botonnuevo">Nuevo</button></a>
            <div class="caja">
                <table>
                    <thead>
                        <tr>
                            <?php
                                $mysqli = mysqli_connect(
                                    "localhost", 
                                    "aplicacion", 
                                    "aplicacion", 
                                    "aplicacion"
                                );
                                $peticion = "
                                    SHOW COLUMNS FROM ".$_GET['tabla'];
                                $resultado = mysqli_query($mysqli, $peticion);
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo '<th>'.$fila['Field'].'</th>';
                                }
                            ?>
                            
                            
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect(
                                "localhost", 
                                "aplicacion", 
                                "aplicacion", 
                                "aplicacion"
                            );
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
                                    echo '<td>'.$valor.'</td>';
                                }
                                // Botones de actualizar y borrar
                                echo '         
                                        <td><a href=""><button class="botoneditar">Editar</button></a></td>
                                        <td><a href="?tabla='.$_GET['tabla'].'&operacion=eliminar&id='.$fila['Identificador'].'"><button class="botoneliminar">Eliminar</button></a></td>
                                    ';
                                // Final de la fila
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>