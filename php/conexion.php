<?php

    $host="localhost";
    $userName="root";
    $db = "blog";

    //Crear conexion
    $conexion = mysqli_connect($host,$userName,"",$db); 

    //verificar conexion
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->mysqli_connect_error());
    } else{
        //echo "Conexion correcta"; 
    }
     

?>