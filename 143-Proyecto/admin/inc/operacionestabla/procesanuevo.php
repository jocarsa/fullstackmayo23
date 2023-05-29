<?php

echo "Registrando un nuevo elemento en la base de datos...";
                $peticionsql = "INSERT INTO ".$_GET['tabla']." VALUES (NULL,";
                foreach ($_POST as $clave => $valor){
                    if($clave != "Identificador"){
                        $peticionsql .= "'".$valor."',";
                    }
                }
                $peticionsql = substr_replace($peticionsql ,"", -1);
                $peticionsql .= ")";
                echo "<br>".$peticionsql;
                $resultado = mysqli_query($mysqli, $peticionsql);
               header('Location: ?tabla='.$_GET['tabla']);

?>