<?php

echo "Registrando un nuevo elemento en la base de datos...";
    $peticionsql = "UPDATE ".$_GET['tabla']." SET ";
    foreach ($_POST as $clave => $valor){
        if($clave == "Identificador"){
            
        }else{
            $peticionsql .= $clave."='".$valor."',";
        }
    }
    $peticionsql = substr_replace($peticionsql ,"", -1);
    $peticionsql .= " WHERE Identificador = ".$_POST['Identificador'];
    echo "<br>".$peticionsql;
    $resultado = mysqli_query($mysqli, $peticionsql);

$peticionsql = "UPDATE ".$_GET['tabla']." SET ";
foreach ($_FILES as $clave => $valor){
    if($clave == "imagen"){
            $directorio = "foto/";
            $archivo = $directorio . basename($_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
            $peticionsql .= $clave."='".basename($_FILES["imagen"]["name"])."',";
        }

    
}
$peticionsql = substr_replace($peticionsql ,"", -1);
    $peticionsql .= " WHERE Identificador = ".$_POST['Identificador'];
 $resultado = mysqli_query($mysqli, $peticionsql);
    
   header('Location: ?tabla='.$_GET['tabla']);

?>