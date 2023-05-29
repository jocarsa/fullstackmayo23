<?php

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

?>