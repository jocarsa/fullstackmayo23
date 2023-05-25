<?php 
    
    include "operacionestabla/borrar.php";
?>
<?php if(isset($_GET['tabla'])){?>
<h2><?php echo $_GET['tabla'] ?></h2>
<?php 
    if(!isset($_GET['operacion'])){
?>
<a href="?tabla=<?php echo $_GET['tabla']?>&operacion=nuevo"><button id="botonnuevo">Nuevo</button></a>
            <div class="caja">
                <table>
                    <?php include "operacionestabla/columnas.php" ?>
                    <?php include "operacionestabla/cuerpo.php" ?>
                </table>
               
            </div>
 <?php include "operacionestabla/paginacion.php" ?>
<?php
                                   
    }else{
        switch($_GET['operacion']){
            case "nuevo":
                include "operacionestabla/nuevo.php";
                break;
            case "procesanuevo":
                include "operacionestabla/procesanuevo.php";
                break;
            case "actualizar":
                include "operacionestabla/actualizar.php";
                break;
            case "procesaactualizar":
                include "operacionestabla/procesaactualizar.php";
                break;
        }
    }
    }else{
    echo "Estas en el panel de control";
    // Gráfica de usuarios de Windows y Mac
    echo '<div class="caja">';
        include "graficas/computadores.php";
        include "graficas/pccontramoviles.php";
        include "graficas/usuariosmasactivos.php";
   
    echo '</div>';
}                            
?>