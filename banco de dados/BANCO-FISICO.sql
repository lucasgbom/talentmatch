-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2025 às 16:28
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `talentmatch`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `data_` date DEFAULT NULL,
  `pagamento` int(11) DEFAULT NULL,
  `descricao` varchar(1280) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `habilidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `post`
--

INSERT INTO `post` (`id`, `titulo`, `data_`, `pagamento`, `descricao`, `latitude`, `longitude`, `idUsuario`, `habilidade`) VALUES
(1, 'Show de Rock', '2025-06-26', 1000, 'Busco banda para show de rock no Rio de Janeiro. Interessados, entrar em contato!', -22.91535200, -43.18702400, 7, 'Vocalista, Guitarrista'),
(2, 'Gravação de Música Pop', '2025-06-28', 1500, 'Procurando músicos para gravação de música pop. Guitarristas, baixistas e bateristas são bem-vindos.', -22.91154300, -43.18217500, 8, 'Guitarrista, Vocalista'),
(3, 'Parceria para Show de Jazz', '2025-07-02', 2000, 'Preciso de músicos para um show de jazz. Trompetistas, saxofonistas e pianistas são bem-vindos.', -22.90873500, -43.17706200, 9, 'Cantora, Compositora'),
(4, 'Gravação de Composição Original', '2025-07-05', 1200, 'Estou buscando músicos para gravação de minha música autoral. Todos os instrumentos são bem-vindos.', -22.90421700, -43.17133900, 10, 'Compositor, Tecladista'),
(5, 'Show de Reggae', '2025-07-10', 800, 'Procurando banda para show de reggae. Preciso de guitarrista, baixista e baterista.', -22.90056700, -43.16570100, 11, 'Vocalista, Compositora'),
(6, 'Produção de Música Eletrônica', '2025-07-12', 2000, 'Busco DJ e produtor musical para colaboração em projeto de música eletrônica.', -22.89681200, -43.16028900, 12, 'Produtora Musical, Cantora'),
(7, 'Sessão de Gravação de Voz', '2025-07-15', 500, 'Estou à procura de cantor(a) para gravar voz em música pop.', -22.89305700, -43.15487700, 13, 'Compositora, Cantora'),
(8, 'Parceria para Show de Blues', '2025-07-18', 1200, 'Procurando músicos para show de blues no próximo mês. Guitarrista e pianista são necessários.', -22.88930700, -43.14946500, 14, 'Cantora, Violonista'),
(9, 'Estúdio para Gravação de Álbuns', '2025-07-20', 3000, 'Ofereço estúdio para gravação de álbuns para bandas independentes. Contate-me para mais detalhes.', -22.88555400, -43.14405300, 15, 'Produtor Musical, DJ'),
(10, 'Sessão de Gravação de Música Gospel', '2025-07-22', 1000, 'Procuro cantor(a) gospel para gravação de música religiosa. Estúdio está disponível para gravações de alta qualidade.', -22.88180400, -43.13864000, 16, 'Cantora, Professora de Canto'),
(11, 'Gravação de Música Indie', '2025-07-25', 1800, 'Busco baterista e guitarrista para gravação de música indie. Estúdio e equipamentos estão prontos para começar.', -22.87805500, -43.13322800, 17, 'Cantor, Guitarrista'),
(12, 'Show de Música Popular Brasileira', '2025-07-30', 1500, 'Procurando músicos para show de música popular brasileira. Preciso de músicos de samba, MPB e bossa nova.', -22.87430500, -43.12781600, 18, 'Cantora, Compositora'),
(13, 'Trabalho de Produção Musical para Rap', '2025-08-02', 2000, 'Produtor musical oferece trabalho para gravar e mixar rap. Preciso de rappers e cantores para colaborar.', -22.87055500, -43.12240400, 19, 'Produtor Musical, Compositor'),
(14, 'Gravação de Música de Natal', '2025-08-05', 2500, 'Busco músicos para gravação de música natalina. Instrumentistas e vocalistas são bem-vindos.', -22.86680500, -43.11699200, 20, 'Cantora, Compositora'),
(15, 'Ensaios para Show de Música Latina', '2025-08-08', 1000, 'Procurando músicos para ensaios e apresentações de música latina. Violonistas e percussionistas são bem-vindos.', -22.86305600, -43.11158000, 21, 'Cantora, Compositora'),
(16, 'Parceria para Show de Música Pop', '2025-08-10', 1500, 'Procurando banda para show de música pop em evento internacional. Todos os músicos são bem-vindos!', -22.85930600, -43.10616800, 22, 'Cantora, Guitarrista'),
(17, 'Gravação de Música Country', '2025-08-12', 1200, 'Busco guitarrista e baixista para gravação de música country. Estúdio está disponível.', -22.85555600, -43.10075600, 23, 'Cantora, Compositora'),
(18, 'Show de Música Clássica', '2025-08-15', 2500, 'Procurando músicos para show de música clássica. Preciso de violinistas, pianistas e flautistas.', -22.85180700, -43.09534400, 24, 'Cantora, Pianista'),
(19, 'Produção de Música de Filmes', '2025-08-18', 3000, 'Busco compositor para trilha sonora de filme independente. Preciso de colaboração criativa.', -22.84805700, -43.08993200, 25, 'Compositora, Pianista'),
(20, 'Músico para Evento Corporativo', '2025-08-20', 2000, 'Procurando músico para evento corporativo, estilo jazz. Ideal para saxofonistas e pianistas.', -22.84430700, -43.08452000, 26, 'Cantora, Pianista'),
(21, 'Colaboração para Álbum de Música Pop', '2025-08-22', 1800, 'Procurando vocalista e guitarrista para álbum pop. Disponibilidade para gravações em estúdio.', -22.84055700, -43.07910800, 27, 'Compositora, Guitarrista'),
(22, 'Produção Musical de Música Eletrônica', '2025-08-25', 2200, 'Busco DJ e produtor para projeto de música eletrônica experimental. A colaboração será para novo EP.', -22.83680700, -43.07369600, 28, 'DJ, Produtor Musical'),
(23, 'Gravação de Música para Filme', '2025-08-28', 3000, 'Preciso de compositor para criar trilha sonora para filme independente. Oportunidade para mostrar talento.', -22.83305700, -43.06828400, 29, 'Compositora, Pianista'),
(24, 'Show de Música Brasileira', '2025-08-30', 1500, 'Procurando músicos para show de MPB e samba. Guitarristas e bateristas são bem-vindos!', -22.82930700, -43.06287200, 30, 'Cantora, Violonista'),
(25, 'Show de Música Indie', '2025-09-02', 1200, 'Procurando banda para show de indie e alternativo. Guitarristas, baixistas e bateristas são necessários.', -22.82555700, -43.05746000, 31, 'Cantora, Guitarrista'),
(26, 'Gravação de Música Gospel', '2025-09-05', 1000, 'Busco vocalista para gravação de música gospel. Estúdio e equipamentos de alta qualidade à disposição.', -22.82180700, -43.05204800, 32, 'Cantora, Compositora'),
(27, 'Gravação de Música Eletrônica', '2025-09-08', 2000, 'Procurando DJs para produção de álbum de música eletrônica. Estúdio está disponível para gravações.', -22.81805700, -43.04663600, 33, 'DJ, Produtor Musical'),
(28, 'Trabalho para Músicos de Jazz', '2025-09-10', 1500, 'Procurando músicos de jazz para colaboração em projeto. Guitarristas e pianistas são bem-vindos!', -22.81430700, -43.04122400, 34, 'Cantora, Compositora'),
(29, 'Gravação de Música para Publicidade', '2025-09-12', 3000, 'Preciso de compositor e músicos para trilha sonora de campanha publicitária. Disponibilidade urgente!', -22.81055700, -43.03581200, 35, 'Compositora, Produtora Musical');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `arquivoCaminho` varchar(256) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projeto`
--

INSERT INTO `projeto` (`id`, `titulo`, `arquivoCaminho`, `descricao`, `idUsuario`) VALUES
(1, 'Álbum de Rock', 'arquivos/album_rock.zip', 'Álbum de rock autoral com influências de grunge e indie. Buscando músicos para gravações.', 1),
(2, 'Projeto de Guitarra Solo', 'arquivos/projeto_guitarra_solo.zip', 'Projeto solo de guitarra com músicas instrumentais e improvisação. Buscando colaboração de outros músicos.', 2),
(4, 'Álbum de Rock', 'arquivos/album_rock.zip', 'Álbum de rock autoral com influências de grunge e indie. Buscando músicos para gravações.', 1),
(5, 'Projeto de Guitarra Solo', 'arquivos/projeto_guitarra_solo.zip', 'Projeto solo de guitarra com músicas instrumentais e improvisação. Buscando colaboração de outros músicos.', 2),
(7, 'Álbum de Rock', 'arquivos/album_rock.zip', 'Álbum de rock autoral com influências de grunge e indie. Buscando músicos para gravações.', 1),
(8, 'Projeto de Guitarra Solo', 'arquivos/projeto_guitarra_solo.zip', 'Projeto solo de guitarra com músicas instrumentais e improvisação. Buscando colaboração de outros músicos.', 2),
(10, 'Álbum de Rock', 'arquivos/album_rock.zip', 'Álbum de rock autoral com influências de grunge e indie. Buscando músicos para gravações.', 1),
(11, 'Projeto de Guitarra Solo', 'arquivos/projeto_guitarra_solo.zip', 'Projeto solo de guitarra com músicas instrumentais e improvisação. Buscando colaboração de outros músicos.', 2),
(14, 'Álbum de Rock', 'arquivos/album_rock.zip', 'Álbum de rock autoral com influências de grunge e indie. Buscando músicos para gravações.', 1),
(15, 'Projeto de Guitarra Solo', 'arquivos/projeto_guitarra_solo.zip', 'Projeto solo de guitarra com músicas instrumentais e improvisação. Buscando colaboração de outros músicos.', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `biografia` varchar(512) DEFAULT NULL,
  `fotoPerfil` varchar(256) DEFAULT NULL,
  `endereco` varchar(256) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `senha`, `biografia`, `fotoPerfil`, `endereco`, `latitude`, `longitude`, `email`) VALUES
(1, 'paulo', NULL, '123', 'Vocalista de rock, com experiência em apresentações ao vivo e gravações de álbuns. Buscando novas parcerias musicais e colaborações.', 'perfil_padrao.png', NULL, NULL, NULL, 'q@1'),
(2, 'lemuel', '', '1234', NULL, '', NULL, -5.10170273, -38.36278283, 'lemuel@gmail.com'),
(6, 'Ana Costa', '966666666', 'senha101', 'Produtora musical e cantora de música eletrônica. Em busca de novas parcerias criativas para projetos de produção musical.', 'perfil_padrao.png', 'Rua das Laranjeiras, 101', -22.91535200, -43.18702400, 'ana.costa@gmail.com'),
(7, 'Felipe Almeida', '955555555', 'senha102', 'Cantora e compositora pop, apaixonada por música e sempre buscando novos desafios criativos e colaborações.', 'perfil_padrao.png', 'Avenida Central, 202', -22.91154300, -43.18217500, 'felipe.almeida@gmail.com'),
(8, 'Laura Fernandes', '944444444', 'senha103', 'Cantora e violonista de MPB, com uma paixão por melodias suaves e letras poéticas. Buscando colaborações com outros músicos.', 'perfil_padrao.png', 'Rua da Paz, 303', -22.90873500, -43.17706200, 'laura.fernandes@gmail.com'),
(9, 'Ricardo Gomes', '933333333', 'senha104', 'Produtor musical e DJ com especialização em música eletrônica. Abertos a novas colaborações para projetos de dance music e house.', 'perfil_padrao.png', 'Rua do Sol, 404', -22.90421700, -43.17133900, 'ricardo.gomes@gmail.com'),
(10, 'Sofia Pereira', '922222222', 'senha105', 'Cantora gospel com experiência em apresentações ao vivo e gravações em estúdio. Em busca de parcerias para novos projetos.', 'perfil_padrao.png', 'Avenida Brasil, 505', -22.90056700, -43.16570100, 'sofia.pereira@gmail.com'),
(11, 'Marcos Silva', '911111111', 'senha106', 'Vocalista e guitarrista indie, com foco em música alternativa. Procurando novos desafios e projetos colaborativos.', 'perfil_padrao.png', 'Rua das Palmeiras, 606', -22.89681200, -43.16028900, 'marcos.silva@gmail.com'),
(12, 'Juliana Souza', '900000000', 'senha107', 'Cantora e compositora de música popular brasileira, em busca de colaborações com músicos e produtores de MPB.', 'perfil_padrao.png', 'Rua do Comércio, 707', -22.89305700, -43.15487700, 'juliana.souza@gmail.com'),
(13, 'Ricardo Lima', '988877777', 'senha108', 'Produtor musical, especializado em rap e hip-hop. Em busca de colaborações criativas para produção de beats e letras.', 'perfil_padrao.png', 'Rua das Acácias, 808', -22.88930700, -43.14946500, 'ricardo.lima@gmail.com'),
(14, 'Beatriz Rocha', '977666666', 'senha109', 'Cantora e compositora de músicas natalinas e religiosas, com uma paixão por melodias que tocam o coração.', 'perfil_padrao.png', 'Rua dos Jasmins, 909', -22.88555400, -43.14405300, 'beatriz.rocha@gmail.com'),
(15, 'Eduardo Costa', '966555555', 'senha110', 'Cantora e compositora de música latina. Buscando músicos de salsa, samba e outros ritmos latinos para colaborar.', 'perfil_padrao.png', 'Rua das Palmeiras, 1010', -22.88180400, -43.13864000, 'eduardo.costa@gmail.com'),
(16, 'Gabriela Ferreira', '955444444', 'senha111', 'Vocalista pop, com foco em apresentações internacionais e colaborações com grandes nomes da música pop.', 'perfil_padrao.png', 'Avenida São João, 1111', -22.87805500, -43.13322800, 'gabriela.ferreira@gmail.com'),
(17, 'Lucas Martins', '944333333', 'senha112', 'Guitarrista e compositor country, com foco em músicas autênticas e acústicas. Procurando novos músicos para parcerias.', 'perfil_padrao.png', 'Avenida das Américas, 1212', -22.87430500, -43.12781600, 'lucas.martins@gmail.com'),
(18, 'Carla Mendes', '933222222', 'senha113', 'Cantora clássica e pianista, apaixonada por música erudita e performances ao vivo em grandes palcos.', 'perfil_padrao.png', 'Rua das Andorinhas, 1313', -22.87055500, -43.12240400, 'carla.mendes@gmail.com'),
(19, 'Rafael Ribeiro', '922111111', 'senha114', 'Compositora de trilhas sonoras para filmes, com experiência em cinema independente e produções de baixo orçamento.', 'perfil_padrao.png', 'Rua do Limoeiro, 1414', -22.86680500, -43.11699200, 'rafael.ribeiro@gmail.com'),
(20, 'Paula Barbosa', '911000000', 'senha115', 'Cantora de jazz e blues, com um estilo único e uma voz inconfundível. Em busca de colaborações para novos projetos.', 'perfil_padrao.png', 'Rua das Cegonhas, 1515', -22.86305600, -43.11158000, 'paula.barbosa@gmail.com'),
(21, 'Felipe Souza', '900999999', 'senha116', 'Compositora de música pop, com ênfase em composições originais e inovações sonoras. Buscando novas parcerias criativas.', 'perfil_padrao.png', 'Avenida Rio Branco, 1616', -22.85930600, -43.10616800, 'felipe.souza@gmail.com'),
(22, 'Clara Martins', '988888888', 'senha117', 'DJ e produtor de música eletrônica, com um estilo único de deep house. Em busca de novas colaborações para lançamentos.', 'perfil_padrao.png', 'Rua das Orquídeas, 1717', -22.85555600, -43.10075600, 'clara.martins@gmail.com'),
(23, 'Gustavo Alves', '977777777', 'senha118', 'Compositora de trilhas sonoras para filmes e comerciais. Com experiência em todos os estilos musicais e pronta para novos desafios.', 'perfil_padrao.png', 'Rua dos Lírios, 1818', -22.85180700, -43.09534400, 'gustavo.alves@gmail.com'),
(24, 'Jéssica Ribeiro', '966666666', 'senha119', 'Cantora e violonista brasileira, com um estilo único que mistura MPB com samba e bossa nova. Em busca de novos shows e gravações.', 'perfil_padrao.png', 'Avenida das Nações, 1919', -22.84805700, -43.08993200, 'jessica.ribeiro@gmail.com'),
(25, 'Bruno Carvalho', '955555555', 'senha120', 'Cantora indie e compositora de músicas autorais, com um toque suave e introspectivo. Em busca de novos projetos de gravação.', 'perfil_padrao.png', 'Rua das Camélias, 2020', -22.84430700, -43.08452000, 'bruno.carvalho@gmail.com'),
(26, 'Vanessa Costa', '944444444', 'senha121', 'Cantora gospel, apaixonada por letras emocionantes e performance ao vivo. Em busca de colaborações para álbuns religiosos.', 'perfil_padrao.png', 'Rua do Lago, 2121', -22.84055700, -43.07910800, 'vanessa.costa@gmail.com'),
(27, 'Lucas Silva', '933333333', 'senha122', 'DJ e produtor musical com foco em música eletrônica, criando novas sonoridades e tendências no mercado.', 'perfil_padrao.png', 'Rua do Sertão, 2222', -22.83680700, -43.07369600, 'lucas.silva@gmail.com'),
(28, 'Viviane Oliveira', '922222222', 'senha123', 'Compositora e pianista, com foco em trilhas sonoras para filmes. Procurando novos projetos e oportunidades de colaboração.', 'perfil_padrao.png', 'Avenida Brasil, 2323', -22.83305700, -43.06828400, 'viviane.oliveira@gmail.com'),
(29, 'Matheus Santos', '911111111', 'senha124', 'Cantora e violonista de música brasileira, com um estilo suave e melódico. Em busca de novas parcerias artísticas.', 'perfil_padrao.png', 'Rua das Figueiras, 2424', -22.82930700, -43.06287200, 'matheus.santos@gmail.com'),
(30, 'Aline Ramos', '900000000', 'senha125', 'Compositora e cantora indie, com um foco em letras profundas e sonoridades experimentais. Buscando parcerias para novos álbuns.', 'perfil_padrao.png', 'Rua da Independência, 2525', -22.82555700, -43.05746000, 'aline.ramos@gmail.com'),
(31, 'Daniel Costa', '988877777', 'senha126', 'Cantora de MPB, com a intenção de misturar novas sonoridades com o clássico da música brasileira. Em busca de parcerias para shows e gravações.', 'perfil_padrao.png', 'Rua dos Jacarandás, 2626', -22.82180700, -43.05204800, 'daniel.costa@gmail.com'),
(32, 'Amanda Silva', '977666666', 'senha127', 'Cantora gospel, com uma voz única para performances ao vivo e gravações em estúdios. Em busca de novas oportunidades.', 'perfil_padrao.png', 'Avenida dos Bandeirantes, 2727', -22.81805700, -43.04663600, 'amanda.silva@gmail.com'),
(33, 'Fernanda Souza', '966555555', 'senha128', 'DJ e produtor de música eletrônica experimental. Criando novas sonoridades e tendências dentro da música digital.', 'perfil_padrao.png', 'Rua da Aurora, 2828', -22.81430700, -43.04122400, 'fernanda.souza@gmail.com'),
(34, 'Juliana Lima', '955444444', 'senha129', 'Cantora de jazz e blues, com foco em apresentações intimistas e autênticas. Em busca de novos shows e parcerias artísticas.', 'perfil_padrao.png', 'Rua dos Búfalos, 2929', -22.81055700, -43.03581200, 'juliana.lima@gmail.com'),
(35, 'João Barbosa', '944333333', 'senha130', 'Compositora e produtora musical, especializada em criar trilhas sonoras emocionantes para filmes e comerciais.', 'perfil_padrao.png', 'Avenida das Nações, 3030', -22.80680700, -43.03040000, 'joao.barbosa@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_post`
--

CREATE TABLE `usuario_post` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `nomeU` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario_post`
--

INSERT INTO `usuario_post` (`id`, `idUsuario`, `idPost`, `nomeU`) VALUES
(1, 2, 17, 'lemuel'),
(2, 2, 1, 'lemuel');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario_post`
--
ALTER TABLE `usuario_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_usuario_post` (`idUsuario`,`idPost`),
  ADD KEY `idPost` (`idPost`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `usuario_post`
--
ALTER TABLE `usuario_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `usuario_post`
--
ALTER TABLE `usuario_post`
  ADD CONSTRAINT `usuario_post_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_post_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`);
COMMIT;
