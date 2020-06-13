    <?php

    $host="esc1.mysql.database.azure.com";
    $userName="AlfonsoOpazo@esc1";
    $db = "Blog";
    $pass = "Alfonzo2020";
    $Port=3306;
    $CertificadoSSL="/wwwroot/BaltimoreCyberTrustRoot.crt";

    //Conexion a mysql mediante Azure
    $con=mysqli_init(); 
    ysqli_ssl_set($con, NULL, NULL, $CertificadoSSL, NULL, NULL);
    mysqli_real_connect($con, $host, $userName, $pass, $db, $Port);


    if (mysqli_connect_errno($con)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }

    //$con=mysqli_init(); 
    //mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); 
    //mysqli_real_connect($con, "esc1.mysql.database.azure.com", "AlfonsoOpazo@esc1", {your_password}, {your_database,3306);

    //Crear conexion
    //$conexion = mysqli_connect($host,$userName,$pass,$db); 

    //verificar conexion
    //if ($conexion->connect_error) {
      //  die("Connection failed: ".$conexion->mysqli_connect_error());
    //} else{
        //echo "Conexion correcta"; 
    //}
     

?>