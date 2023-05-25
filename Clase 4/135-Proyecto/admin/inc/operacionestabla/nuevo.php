<?php

echo "Creando un elemento nuevo en: ".$_GET['tabla'];
$peticion = "SHOW COLUMNS FROM ".$_GET['tabla'];
echo '<form method="POST" action="?tabla='.$_GET['tabla'].'&operacion=procesanuevo">';
$resultado = mysqli_query($mysqli, $peticion);
while ($fila = mysqli_fetch_assoc($resultado)) {     
    echo '
    <div class="controlformulario">
        <p>'.$fila['Field'].'</p>';
        if(strpos($fila['Field'], "fecha") !== false){
            echo '<input type="date" name="'.$fila['Field'].'"  >';
        }else if(strpos($fila['Field'], "Identificador") !== false){
            echo '<input type="number" name="'.$fila['Field'].'"  >';
        }else{
            echo '<input type="text" name="'.$fila['Field'].'" placeholder="Nuevo: '.$fila['Field'].'" >';
        }
        
    echo '</div>'; 
}
echo '<input type="submit">
</form>';

?>