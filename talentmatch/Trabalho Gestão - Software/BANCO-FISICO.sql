START TRANSACTION;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    nomeUsuario VARCHAR(100),
    senha VARCHAR(256),
    fotoPerfil VARCHAR(256),
    endereco VARCHAR(256),
    disponivel BOOLEAN,
    email VARCHAR(256)
);


CREATE TABLE generoMusical (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    idUsuario INT,
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

CREATE TABLE habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    experiencia VARCHAR(256),
    idUsuario INT,
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

CREATE TABLE projeto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    arquivoCaminho VARCHAR(256),
    descricao VARCHAR(500),
    idUsuario INT,
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

CREATE TABLE post (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dataInicio DATE,
    dataFim DATE,
    requisitos VARCHAR(500),
    cache DOUBLE,
    descricao VARCHAR(256),
    idUsuario INT,
    idHabilidade INT,
    FOREIGN KEY (idUsuario) REFERENCES usuario(id),
    FOREIGN KEY (idHabilidade) REFERENCES habilidade(id)
);

COMMIT;
