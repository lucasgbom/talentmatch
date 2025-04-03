CREATE TABLE contratador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    endereco VARCHAR(250),
    nome VARCHAR(100),
    senha VARCHAR(100)
);

CREATE TABLE habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    experiencia VARCHAR(50),
    id_artista INT
);

CREATE TABLE artista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(100),
    disponivel BOOLEAN,
    nome VARCHAR(100),
    endereco VARCHAR(250),
    `email` varchar(256) NOT NULL
);

CREATE TABLE trabalho_post (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_fim DATE,
    data_inicio DATE,
    descricao VARCHAR(250),
    cache DOUBLE,
    id_contratador INT,
    id_habilidade INT,
    FOREIGN KEY(id_contratador) REFERENCES contratador (id),
    FOREIGN KEY(id_habilidade) REFERENCES habilidade (id)
);

ALTER TABLE habilidade ADD FOREIGN KEY(id_artista) REFERENCES artista (id);


