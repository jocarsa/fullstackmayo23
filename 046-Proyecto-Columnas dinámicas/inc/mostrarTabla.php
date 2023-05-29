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
                                entradas";
                            $resultado = mysqli_query($mysqli, $peticion);
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo '
                                    <tr>
                                        <td>'.$fila['Identificador'].'</td>
                                        <td>'.$fila['imagen'].'</td>
                                        <td>'.$fila['fecha'].'</td>
                                        <td>'.$fila['texto'].'</td>
                                        <td>'.$fila['titulo'].'</td>
                                        <td>'.$fila['FK_usuarios_nombrereal'].'</td>
                                        <td><a href=""><button class="botoneditar">Editar</button></a></td>
                                        <td><a href=""><button class="botoneliminar">Eliminar</button></a></td>
                                        <td></td>
                                    </tr>
                                    ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>