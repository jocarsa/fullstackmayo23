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