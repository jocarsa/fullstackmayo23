<?php 
    if(isset($_GET['operacion']) && $_GET['operacion'] == "eliminar"){
        
        $peticion = "
        DELETE 
        FROM ".$_GET['tabla']." 
        WHERE Identificador = ".$_GET['id']."
        ";
        $resultado = mysqli_query($mysqli, $peticion);
        header('Location:?tabla='.$_GET['tabla']);
    }
    
?>
<?php if(isset($_GET['tabla'])){?>
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
                $peticionsql = "INSERT INTO ".$_GET['tabla']." VALUES (NULL,";
                foreach ($_POST as $clave => $valor){
                    if($clave != "Identificador"){
                        $peticionsql .= "'".$valor."',";
                    }
                }
                $peticionsql = substr_replace($peticionsql ,"", -1);
                $peticionsql .= ")";
                echo "<br>".$peticionsql;
                $resultado = mysqli_query($mysqli, $peticionsql);
               header('Location: ?tabla='.$_GET['tabla']);
                
                break;
            case "actualizar":
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
                break;
            case "procesaactualizar":
                echo "Registrando un nuevo elemento en la base de datos...";
                $peticionsql = "UPDATE ".$_GET['tabla']." SET ";
                foreach ($_POST as $clave => $valor){
                    if($clave != "Identificador"){
                        $peticionsql .= $clave."='".$valor."',";
                    }
                }
                $peticionsql = substr_replace($peticionsql ,"", -1);
                $peticionsql .= " WHERE Identificador = ".$_POST['Identificador'];
                echo "<br>".$peticionsql;
                $resultado = mysqli_query($mysqli, $peticionsql);
               header('Location: ?tabla='.$_GET['tabla']);
                
                break;
        }
        
    }
                               }else{
    echo "Estas en el panel de control";
    // Gráfica de usuarios de Windows y Mac
    echo '
    <div class="caja">';
    
    
    
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
    
    
    
    // Gráfica de usuarios más activos
    $datos = "";
    $series = "";
        $peticion = "
        SELECT 
            clientes.usuario AS nombreusuario,
            COUNT(titulo) AS numero
            FROM `entradas` 
            LEFT JOIN clientes
            ON entradas.FK_clientes_nombrereal = clientes.Identificador
            GROUP BY (`FK_clientes_nombrereal`)
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
        
    echo '</div>';
}                            
?>