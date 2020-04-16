<?php
    $host="localhost";
    $password="password";
    $userName="username";
    //Crear conexion
    $conexion = new mysqli_connect($host,$userName,$password); 

    //verificar conexion
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->mysqli_connect_error());
    } 
    echo "Conexion correcta";
?>
