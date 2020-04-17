
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

CREATE TABLE post(
    id_post INT NOT NULL AUTO_INCREMENT,
    post TEXT,
    fecha_post VARCHAR(255),
    id_usuario INT NOT NULL
    PRIMARY KEY(id_post)
);

CREATE TABLE comentarios(
    id_comentario INT NOT NULL AUTO_INCREMENT,
    texto TEXT NOT NULL,
    fecha VARCHAR(255) NOT NULL,
    id_usuario INT NOT NULL,
    PRIMARY KEY (id_comentario)

);