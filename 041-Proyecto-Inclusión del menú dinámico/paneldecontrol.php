<?php
    session_start();
    if(!isset($_SESSION['llave'])){die("Te has intentado colar");}
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Panel de control</title>
        <meta charset="utf-8">
        <link rel="Stylesheet" href="estilo/paneldecontrol.css">
    </head>
    <body>
        <header>
            <img src="img/logo.png" id="logo">
            <h1>Panel de control</h1>
        </header>
        <nav>
            <ul>
                <?php
                    include "inc/menudinamico.php";
                ?>
                
            </ul>
        </nav>
        <section>
            <h2>Entradas</h2><a href=""><button id="botonnuevo">Nuevo</button></a>
            <div class="caja">
                <table>
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Imagen</th>
                            <th>Fecha</th>
                            <th>Texto</th>
                            <th>Titulo</th>
                            <th>Usuario</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect(
                                "localhost", 
                                "aplicacion", 
                                "aplicacion", 
                                "aplicacion"
                            );
                            $peticion = "
                                SELECT 
                                * 
                                FROM 
                                entradas";
                            $resultado = mysqli_query($mysqli, $peticion);
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo '
                                    <tr>
                                        <td>'.$fila['Identificador'].'</td>
                                        <td>'.$fila['imagen'].'</td>
                                        <td>'.$fila['fecha'].'</td>
                                        <td>'.$fila['texto'].'</td>
                                        <td>'.$fila['titulo'].'</td>
                                        <td>'.$fila['FK_usuarios_nombrereal'].'</td>
                                        <td><a href=""><button class="botoneditar">Editar</button></a></td>
                                        <td><a href=""><button class="botoneliminar">Eliminar</button></a></td>
                                        <td></td>
                                    </tr>
                                    ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>