CREATE TABLE Usuario (
       id_usuario           INTEGER NOT NULL AUTO_INCREMENT,
       nome                 VARCHAR(50) NOT NULL,
       login                VARCHAR(20) NOT NULL,
       senha                VARCHAR(20) NULL,
       PRIMARY KEY (id_usuario)
);


CREATE TABLE Noticia (
       id_noticia           INTEGER NOT NULL AUTO_INCREMENT,
       titulo               VARCHAR(200) NOT NULL,
       data                 DATE NOT NULL,
       conteudo             TEXT NOT NULL,
       id_usuario           INTEGER NULL,
       PRIMARY KEY (id_noticia), 
       FOREIGN KEY (id_usuario)
                             REFERENCES Usuario(id_usuario)
);

