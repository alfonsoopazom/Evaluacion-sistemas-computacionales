    <?php

    $host="esc1.mysql.database.azure.com";
    $userName="AlfonsoOpazo@esc1";
    $db = "Blog";
    $pass = "Alfonzo2020";
    $Port=3306;
    $CertificadoSSL="BaltimoreCyberTrustRoot.crt.pem";

    //Conexion a mysql mediante Azure
    $conexion=mysqli_init(); 
    mysqli_ssl_set($conexion, NULL, NULL,$CertificadoSSL, NULL, NULL);
    mysqli_real_connect($conexion, $host, $userName, $pass, $db, $Port);


    if (mysqli_connect_errno($conexion)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }else {
        echo("Conexion exitosa");
    }

    //Crear conexion
    //$conexion = mysqli_connect($host,$userName,$pass,$db); 

    //verificar conexion
    //if ($conexion->connect_error) {
      //  die("Connection failed: ".$conexion->mysqli_connect_error());
    //} else{
        //echo "Conexion correcta"; 
    //}
     

?>