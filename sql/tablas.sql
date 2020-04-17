
/*Creacion de tablas de usuario*/
CREATE TABLE usuario(
    usuario_id INT NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    contrasena2 VARCHAR(255) NOT NULL,
    PRIMARY KEY (usuario_id)
);

CREATE TABLE logeos(
    logeo_id INT NOT NULL AUTO_INCREMENT,
    correo VARCHAR(255) NOT NULL,
    hora VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL,
    PRIMARY KEY (logeo_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);


