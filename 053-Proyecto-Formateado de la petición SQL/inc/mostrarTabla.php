<?php 
    if(isset($_GET['operacion']) && $_GET['operacion'] == "eliminar"){
        
        $peticion = "
        DELETE 
        FROM ".$_GET['tabla']." 
        WHERE Identificador = ".$_GET['id']."
        ";
        $resultado = mysqli_query($mysqli, $peticion);
    }
    
?>
<h2><?php echo $_GET['tabla'] ?></h2>
<?php 
    if(!isset($_GET['operacion'])){
?>
<a href="?tabla=<?php echo $_GET['tabla']?>&operacion=nuevo"><button id="botonnuevo">Nuevo</button></a>
            <div class="caja">
                <table>
                    <thead>
                        <tr>
                            <?php
                                
                                $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'];
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
<?php
                                   
                                  }else{
        switch($_GET['operacion']){
            case "nuevo":
                echo "Creando un elemento nuevo en: ".$_GET['tabla'];
                $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'];
                echo '<form method="POST" action="?tabla='.$_GET['tabla'].'&operacion=procesanuevo">';
                $resultado = mysqli_query($mysqli, $peticion);
                while ($fila = mysqli_fetch_assoc($resultado)) {     
                    echo '
                    <div class="controlformulario">
                        <p>'.$fila['Field'].'</p>
                        <input type="text" name="'.$fila['Field'].'" placeholder="Nuevo: '.$fila['Field'].'" >
                    </div>'; 
                }
                echo '<input type="submit">
                </form>';
                break;
            case "procesanuevo":
                echo "Registrando un nuevo elemento en la base de datos...";
                $peticionsql = "INSERT INTO ".$_GET['tabla']." VALUES (";
                foreach ($_POST as $clave => $valor){
                    if($clave != "Identificador"){
                        $peticionsql .= $clave."='".$valor."',";
                    }
                }
                $peticionsql .= ")";
                echo "<br>".$peticionsql;
                
                break;
        }
        
    }