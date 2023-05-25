<div id="paginado">
    <div id="contienepaginado">
<?php

    $elementosporpagina = 10;
    
    $peticion = "
        SELECT 
        COUNT(Identificador) AS cuenta 
        FROM ".$_GET['tabla']."
    ";

    $resultado = mysqli_query($mysqli, $peticion);
    while ($fila = mysqli_fetch_assoc($resultado)) {     
        //echo $fila['cuenta']; 
        $paginas = ceil($fila['cuenta']/$elementosporpagina);
        //echo "Me salen ".$paginas." páginas";
        for($i = 1;$i<=$paginas;$i++){
            echo "
            <a href='?tabla=".$_GET['tabla']."&pagina=".$i."'>
                <button class='botonpaginacion'>    
                    ".$i."
                </button>
            </a>
            ";
        }
    }
?>
    </div>
    </div>