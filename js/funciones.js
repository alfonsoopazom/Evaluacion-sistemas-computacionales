function horaActual() {
    //Funcion que retorna la hora actual
    var f = new Date();
    document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
}

function redireccionarLogin(){
    
    var ventana;
    ventana= document.getElementById('volver');
    ventana.addEventListener('click',function(event){
        event.preventDefault();
        setTimeout(location.href="inicio.php",50000)
        //alert("Saliendo...");
    }); 
}
function irausuario(){
    var usuario;
    usuario= document.getElementById('usuario-id');
    usuario.addEventListener('click',function(event){
        event.preventDefault();
        setTimeout(location.href="usuario.php",50000)
    });    
}

function home(){
    var home;
    home= document.getElementById(newLocal);
    home.addEventListener('click',function(event){
        event.preventDefault();
        setTimeout(location.href="bloghome.php",50000)
    });    
}