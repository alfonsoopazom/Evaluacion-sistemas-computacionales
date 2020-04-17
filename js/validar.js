function validar(){
    var nombre;
    var correo;
    var contrasena;
    var contrasena1;

    nombre=document.getElementById("usuario").value;
    correo=document.getElementById("correo").value;
    correo=document.getElementById("contrasena").value;
    correo=document.getElementById("contrasena1").value;

    if (nombre =='') {
        alert("El campo Nombre esta vacio");
        return false;//Se detiene el envio de datos
    }else if(correo ==''){
        alert("El campo Correo esta vacio")
        return false;
    }else if(contrasena ==''){
        alert("El campo Contrasena esta vacio")
        return false;
    }else if(contrasena1==''){
        alert("El campo Validar contrasena esta vacio")
        return false;
    }
}