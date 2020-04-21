<html>
<head>
  <link href="css/post.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
</head>
<body>
  <h1>
    POST
  </h1>
  <div class="box">
    <form action="blog-post.php" method="POST">

        <p>Titulo del Post</p>
        <input type="text" id="titulo" name="titulo" >
        <p>Resumen del Post</p>
        <input type="text" id="resumen" name="resumen" >
        <p>Cuerpo del Post</p>
        <input type="text" id="cuerpo" name="cuerpo" >
        <input type="submit" name="boton1" value="Enviar"></input>     
    </form>
    </div>
    
    <p>
    <?php
      //echo($_COOKIE['cookieU']);
    ?>
    </p>
    
</body>
</html>
