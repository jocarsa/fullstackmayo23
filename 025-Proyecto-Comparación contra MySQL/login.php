<?php
    // Compruebo que recibo datos del formulario
    echo "Comprobación de usuario:<br>";
    echo "Usuario: ".$_POST['usuario']."<br>";
    echo "Contraseña: ".$_POST['contrasena']."<br>";
    // Almaceno los datos en variables
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Me conecto a lal base de datos
    $mysqli = mysqli_connect(
        "localhost", 
        "aplicacion", 
        "aplicacion", 
        "aplicacion"
    );
    // Selecciono los usuarios
    $peticion = "
        SELECT 
        * 
        FROM 
        usuarios";
    $resultado = mysqli_query($mysqli, $peticion);
    // PAra cada registro de la base de datos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Compruebo si los datos de la base de datos coinciden con los datos del formulario
        if(
            $usuario == $fila['nombredeusuario']
            && 
            $contrasena == $fila['contrasena']
        ){
            // Esto ese ejecuta si coinciden
            echo "el usuario coincide<br>";
        }else{
            // Esto se ejecuta si no coinciden
            echo "el usuario no coincide<br>";
        }
    }

    
?>