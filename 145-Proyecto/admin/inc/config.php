<?php
/*
    $mysqli = mysqli_connect(
                "db5013117996.hosting-data.io", 
                "dbu5499422", 
                "MasterMedia123$", 
                "dbs11010497"
            ) or die("fallo de conexion");
$db = new mysqli("db5013117996.hosting-data.io", "dbu5499422", "MasterMedia123$", "dbs11010497");
 */

$mysqli = mysqli_connect(
                "localhost", 
                "ideaoniric", 
                "ideaoniric", 
                "ideaoniric"
            ) or die("fallo de conexion");
mysqli_set_charset($mysqli, "utf8mb4");

$db = new mysqli(
    "localhost",
    "ideaoniric", 
    "ideaoniric", 
    "ideaoniric");
$db->set_charset("utf8mb4");
  
?>