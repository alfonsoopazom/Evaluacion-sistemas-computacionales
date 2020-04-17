
function validarLogin() {
    var usuario,pass;
    //Datos Login
    usuario = document.getElementById("user").value;
    pass = document.getElementById("pass").value;

    if (usuario =='') {
        alert("El campo Usuario esta vacio");
        return false;
    }
    else if (pass =='') {
        alert("El campo Contraseña esta vacio");
        return false;
    }
}
