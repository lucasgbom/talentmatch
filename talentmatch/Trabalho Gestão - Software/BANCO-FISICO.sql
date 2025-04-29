START TRANSACTION;

CREATE TABLE artista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    nomeUsuario VARCHAR(100),
    senha VARCHAR(256),
    biografia VARCHAR(500),
    fotoPerfil VARCHAR(256),
    endereco VARCHAR(256),
    disponivel BOOLEAN,
    x VARCHAR(256),
    instagram VARCHAR(256),
    spotify VARCHAR(256),
    email VARCHAR(256)
);

CREATE TABLE contratador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    senha VARCHAR(256),
    endereco VARCHAR(256),
    foto VARCHAR(256),
    descricao VARCHAR(500),
    email VARCHAR(256)
);

CREATE TABLE generoMusical (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    idArtista INT,
    FOREIGN KEY (idArtista) REFERENCES artista(id)
);

CREATE TABLE habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    experiencia VARCHAR(256),
    idArtista INT,
    FOREIGN KEY (idArtista) REFERENCES artista(id)
);

CREATE TABLE projeto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    arquivoCaminho VARCHAR(256),
    descricao VARCHAR(500),
    idArtista INT,
    FOREIGN KEY (idArtista) REFERENCES artista(id)
);

CREATE TABLE trabalhoPost (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dataInicio DATE,
    dataFim DATE,
    requisitos VARCHAR(500),
    cache DOUBLE,
    descricao VARCHAR(256),
    idArtista INT,
    idContratador INT,
    idHabilidade INT,
    FOREIGN KEY (idArtista) REFERENCES artista(id),
    FOREIGN KEY (idContratador) REFERENCES contratador(id),
    FOREIGN KEY (idHabilidade) REFERENCES habilidade(id)
);

COMMIT;
