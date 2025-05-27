START TRANSACTION;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    nomeUsuario VARCHAR(100),
    senha VARCHAR(256),
    biografia VARCHAR(512),
    fotoPerfil VARCHAR(256),
    endereco VARCHAR(256),
    latitude DECIMAL(10, 8),  
    longitude DECIMAL(11, 8) ,
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
    latitude DECIMAL(10, 8),  
    longitude DECIMAL(11, 8),
    idUsuario INT,
    habilidade VARCHAR(100),
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

CREATE TABLE usuario_post (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT NOT NULL,
    idPost INT NOT NULL,
    UNIQUE KEY unique_usuario_post (idUsuario, idPost),
    FOREIGN KEY (idUsuario) REFERENCES usuario(id),
    FOREIGN KEY (idPost) REFERENCES post(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
