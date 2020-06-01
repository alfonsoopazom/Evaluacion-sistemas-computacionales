/*Creacion de tablas de usuario*/
CREATE TABLE usuario(
    usuario_id INT NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro VARCHAR(250) NOT NULL,
    hora_registro VARCHAR(255) NOT NULL,
    PRIMARY KEY (usuario_id)
);
 /*contrasena2 VARCHAR(255) NOT NULL,*/

CREATE TABLE logeos(
    logeo_id INT NOT NULL AUTO_INCREMENT,
    correo VARCHAR(255) NOT NULL,
    hora VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL,
    fecha VARCHAR(50) NOT NULL,
    PRIMARY KEY (logeo_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE post(
    id_post INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    post TEXT NOT NULL,
    fecha_post VARCHAR(255),
    id_autor INT NOT NULL,
    PRIMARY KEY(id_post),
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)  
);
CREATE TABLE comentarios(
    id_comentario INT NOT NULL AUTO_INCREMENT,
    texto TEXT NOT NULL,
    fecha VARCHAR(255) NOT NULL,
    id_usuario INT NOT NULL,
    id_post INT NOT NULL,
    PRIMARY KEY (id_comentario),
    FOREIGN KEY (id_usuario) REFERENCES usuario(usuario_id),
    FOREIGN KEY (id_post) REFERENCES post(id_post)
);

CREATE TABLE autores(
    id_autor INT NOT NULL AUTO_INCREMENT,
    nombre_autor VARCHAR(255) NOT NULL,
    usuario_id INT NOT null,
    PRIMARY KEY (id_autor),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE invitados(
    id_invitado INT NOT NULL AUTO_INCREMENT,
    correo_invitado VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_invitado)
);


CREATE TABLE logeo_invitados(
    id_logeo_invitados INT NOT NULL AUTO_INCREMENT,
    fecha VARCHAR(255) NOT NULL,
    hora VARCHAR(255) NOT NULL,
    invitados_id INT NOT NULL,
    PRIMARY KEY (id_logeo_invitados),
    FOREIGN KEY (invitados_id) REFERENCES invitados(id_invitado)
);

/*Se debe agregar una tabla con la informacion de la sesion del ususario que se registra o accede al blog*/