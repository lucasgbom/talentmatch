CREATE TABLE contratador (
    nome VARCHAR(256),
    senha VARCHAR(256),
    endereco VARCHAR(256),
    foto VARCHAR(256),
    descricao VARCHAR(500),
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(256)
);

CREATE TABLE genero_musical (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    id_artista INT
);

CREATE TABLE habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    experiencia VARCHAR(256),
    id_artista INT
);

CREATE TABLE artista (
    biografia VARCHAR(500),
    senha VARCHAR(256),
    nome VARCHAR(256),
    foto_perfil VARCHAR(256),
    endereco VARCHAR(256),
    disponivel BOOLEAN,
    id INT AUTO_INCREMENT PRIMARY KEY,
    x VARCHAR(256),
    instagram VARCHAR(256),
    spotify VARCHAR(256),
    email VARCHAR(256)
);

CREATE TABLE projeto (
    arquivo_caminho VARCHAR(256),
    descricao VARCHAR(500),
    id_artista INT,
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY(id_artista) REFERENCES artista (id)
);

CREATE TABLE trabalho_post (
    data_fim DATE,
    requisitos VARCHAR(500),
    data_inicio DATE,
    cache DOUBLE,
    descricao VARCHAR(256),
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_artista INT,
    id_contratador INT,
    id_habilidade INT,
    FOREIGN KEY(id_artista) REFERENCES artista (id),
    FOREIGN KEY(id_contratador) REFERENCES contratador (id),
    FOREIGN KEY(id_habilidade) REFERENCES habilidade (id)
);

ALTER TABLE genero_musical ADD FOREIGN KEY(id_artista) REFERENCES artista (id);
ALTER TABLE habilidade ADD FOREIGN KEY(id_artista) REFERENCES artista (id);
