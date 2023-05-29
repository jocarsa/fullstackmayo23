<?php

    require "blacklist.php";
    require "inyeccion.php";
    require "config.php";
    require "registro.php";

    $peticion = "
    UPDATE ".$_GET['tabla']."
    SET ".$_GET['campo']." = '".$_GET['texto']."'
    WHERE Identificador = '".$_GET['identificador']."'
    ";
   
    if($db->query($peticion)){
        echo "ok";
    }else{
        "ko";
    }

?>