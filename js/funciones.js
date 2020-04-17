function horaActual() {
    //Funcion que retorna la hora actual
    var f = new Date();
    document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
}