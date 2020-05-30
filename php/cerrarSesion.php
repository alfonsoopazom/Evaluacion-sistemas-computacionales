<?php

    //elimina las cookie
    setcookie('usuarioC',$usuario,time()-3600,'/');
    setcookie('nombreC',$nombre,time()-3600,'/');
    setcookie('apellidoC',$apellido,time()-3600,'/');
    setcookie('correoC',$correo,time()-3600,'/');
    setcookie('contrasenaC',$contrasena,time()-3600,'/');

    //Destruye la sesion
    session_destroy();
    session_destroy();
    header("location:../inicio.php");
?>