START TRANSACTION;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    nomeUsuario VARCHAR(100),
    senha VARCHAR(256),
    biografia VARCHAR(512),
    fotoPerfil VARCHAR(256),
    endereco VARCHAR(256),
    disponivel BOOLEAN,
    email VARCHAR(256)
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
    titulo VARCHAR(100),
    data_ DATE,
    pagamento INT,
    descricao VARCHAR(1280),
    idUsuario INT,
    habilidade VARCHAR(100),
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

COMMIT;
