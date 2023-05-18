<?php

    echo "Comprobación de usuario:<br>";
    echo "Usuario: ".$_POST['usuario']."<br>";
    echo "Contraseña: ".$_POST['contrasena']."<br>";
    
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if(
        $usuario == "josevicente"
        &&
        $contrasena = "josevicente"
    ){
        echo "Te dejo pasar al panel de control";
    }else{
        echo "No te dejo pasar al panel de control";
    }
    
?>