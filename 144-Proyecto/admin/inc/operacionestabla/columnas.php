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
    
    <tr>
        <?php

            $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'];
            $resultado = mysqli_query($mysqli, $peticion);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo '<th>
                <form action="?tabla='.$_GET['tabla'].'" method="GET" style="columns:1;"> 
                <input type="hidden" name="tabla" value="'.$_GET['tabla'].'">
                <input type="hidden" name="buscar" value="si">
                <input type="text" name="'.$fila['Field'].'" class="buscar" style="width:auto;">
                </form>
                </th>';
            }
        ?>


        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    
    </thead>