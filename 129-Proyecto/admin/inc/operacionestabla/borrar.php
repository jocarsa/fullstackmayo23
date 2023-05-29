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