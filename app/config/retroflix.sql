-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/12/2023 às 04:50
-- Versão do servidor: 10.4.28-MariaDB-log
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `retroflix`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`codigo`, `nome`, `email`, `senha`, `cpf`, `telefone`, `sexo`, `data_nascimento`) VALUES
(4, 'Bruno', 'boteistem@gmail.com', '55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251', '111111', '11111111', 'm', '2000-03-15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretor`
--

CREATE TABLE `diretor` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `diretor`
--

INSERT INTO `diretor` (`codigo`, `nome`) VALUES
(1, 'Bruno'),
(2, 'Diego'),
(3, 'Michael Curtiz'),
(4, 'Victor Fleming'),
(5, ' Akira Kurosawa'),
(6, 'Stanley Kubrick'),
(7, 'Alain Resnais'),
(8, 'Brian De Palma'),
(9, 'Nicholas Ray'),
(10, ' Spike Lee'),
(11, ' Ridley Scott'),
(12, 'Robert Zemeckis'),
(13, 'John Hughes'),
(14, 'Steven Spielberg'),
(15, 'The Wachowskis'),
(16, 'Quentin Tarantino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `imagem_capa` varchar(255) DEFAULT NULL,
  `codigo_diretor` int(11) DEFAULT NULL,
  `codigo_genero` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `preco_diario` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filme`
--

INSERT INTO `filme` (`codigo`, `titulo`, `data_lancamento`, `sinopse`, `imagem_capa`, `codigo_diretor`, `codigo_genero`, `link`, `preco_diario`) VALUES
(1, 'Casablanca ', '2042-11-26', 'Considerado um dos maiores filmes de amor de todos os tempos, Casablanca é um verdadeiro clássico do cinema norte-americano dirigido por Michael Curtiz. Passado na cidade de Casablanca, em Marrocos, durante a Segunda Guerra Mundial, o filme acompanha o reencontro de Rick e Ilsa, antigos amantes que voltam a se cruzar em circunstâncias peculiares.', '49ca439dea6bba00537032a952716fb29f88d7234ff6ddc892bcdb51439ecabe.webp', 3, 2, 'https://www.youtube.com/embed/VWmEkGkBW4w', 2),
(2, 'E o Vento Levou', '2039-12-15', 'Considerado um dos filmes mais famosos do mundo, o drama histórico é passado no sul dos Estados Unidos, durante a Guerra Civil Americana, e foi dirigido por Victor Fleming, George Cukor e Sam Wood. Em meio aos acontecimentos e fortes contrastes sociais, o longa-metragem acompanha o relacionamento conturbado.', '23ca76f9399f75f457ae953a534456d97695fb7ac216ecf1f1768136ef1f79c1.webp', 4, 1, 'https://www.youtube.com/embed/FBaiPef5PUM', 2),
(3, 'Os Sete Samurais', '2054-04-26', 'O filme japonês de Akira Kurosawa, um dos diretores mais influentes do país, é passado no século XVI, durante a época feudal. O longa-metragem se tornou uma enorme referência do cinema universal. Na narrativa, conhecemos uma vila de agricultores que é constantemente pilhada por ladrões. Para se defenderem, eles contratam sete samurais implacáveis.', 'bb253c7d914ad7de078e92d6a4da566d448e7a6b6e37f31449da568f78f3fb6f.webp', 5, 2, 'https://www.youtube.com/embed/wJ1TOratCTo', 2),
(4, '2001 - Uma Odisseia no Espaço', '2068-04-02', 'Para os apaixonados por ficção científica, ou mesmo para os curiosos, 2001 - Uma Odisseia no Espaço é um filme indispensável. O longa-metragem de Stanley Kubrick entrou para a história do cinema e ficou conhecido principalmente pelos efeitos visuais e trilha sonora arrebatadora. Passada quase sempre no espaço, a narrativa se estende por séculos e trata temas como viagens espaciais, vida alienígena, evolução humana e inteligência artificial.', '7d03a51b46a22f35c6ee9c3bb337fa5f105bc37297776010ddce2e299ca242e1.jpg', 6, 6, 'https://www.youtube.com/embed/7E9CD3Hucws', 2),
(5, ' Hiroshima, Meu Amor', '2059-06-10', 'O longa-metragem de drama e romance, com direção de Alain Resnais, é uma produção franco-japonesa inspirada no romance homônimo da escritora Marguerite Duras. Considerada polêmica na época em que foi lançada, a obra se tornou bastante influente, sendo apontada como um marco da Nouvelle Vague.', '78082e0e68e08f7ee1517b287185f1d95f78f01f36e8c216b2fbe87ad5ec3cd6.jpg', 7, 2, 'https://www.youtube.com/embed/DttLpVvwOK4', 2),
(6, 'Carrie, a Estranha', '1976-11-16', ' Baseado num dos maiores sucessos de Stephen King, o filme de terror sobrenatural, dirigido por Brian De Palma, segue os passos de uma adolescente que frequenta o ensino médio. Carrie é rejeitada pelos seus colegas de escola e, em casa, vive numa atmosfera sufocante, por causa da sua mãe controladora. De repente, tudo se altera quando a jovem descobre que tem poderes paranormais e consegue mexer objetos com a força da mente. A partir daí, ela tem a oportunidade de se vingar de todos aqueles que a machucaram no passado.', 'dad9d7d898281d0662f0dd430bada8e51cc1874ca64e277bc91d2776ea42b9be.jpg', 8, 7, 'https://www.youtube.com/embed/j9Mg-GRS46Y', 2),
(7, ' Matrix', '1999-03-31', 'Matrix é um filme de ação e ficção científica que desafia as noções tradicionais de realidade. Neo, interpretado por Keanu Reeves, descobre a verdade por trás do mundo que ele conhece e se junta a uma rebelião contra as máquinas que controlam a humanidade.', 'b98a6f4abd88c0679ba5d9a4caa1ab4fa1e83b50179e8ef5459d397107a8cf4d.jpg', 15, 10, 'https://www.youtube.com/embed/2KnZac176Hs', 2),
(8, 'Pulp Fiction ', '1994-10-14', ' Pulp Fiction é uma obra-prima do cinema independente. O filme entrelaça várias histórias, explorando temas como crime, redenção e a natureza humana de maneiras inovadoras e impactantes.\r\n\r\n ', '1a34bc87d83a36d926dd0b1798e17517f2585da4e08b6957d317fc8fc671f029.jpg', 16, 1, 'https://www.youtube.com/embed/s7EdQ4FqbhY', 2),
(9, 'Jurassic Park', '1993-06-11', 'Jurassic Park é um marco no cinema de aventura e ficção científica. Um parque de dinossauros geneticamente recriados torna-se uma ameaça quando as criaturas escapam de controle, colocando os visitantes em perigo.', '68c81e880f07e9816c5d21f01995ddab9db7438f6bc4d89c64c9e239f629b0d8.jpg', 14, 4, 'https://www.youtube.com/embed/QWBKEmWWL38', 2),
(10, ' Clube dos Cinco', '1985-02-07', ' Clube dos Cinco é um filme que explora a dinâmica entre cinco estudantes que, à primeira vista, parecem ser estereótipos de colegiais, mas que revelam camadas mais profundas durante uma detenção no sábado. ', 'e560a007e6195bdb82356004bd38bc139ed30ea28464e1178b1c3d3e84b2f901.webp', 13, 9, 'https://www.youtube.com/embed/EmqkaxOw6_o', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes_locacao`
--

CREATE TABLE `filmes_locacao` (
  `codigo_locacao` int(11) NOT NULL,
  `codigo_filme` int(11) NOT NULL,
  `numero_dias` int(11) DEFAULT NULL,
  `preco_diario` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`codigo`, `descricao`) VALUES
(3, 'Cartão'),
(4, 'Boleto'),
(5, 'Pix');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`codigo`, `nome`) VALUES
(1, 'Romance'),
(2, 'Drama'),
(3, 'Histórico'),
(4, 'Aventura'),
(5, 'Fantasia'),
(6, 'Ficção Científica'),
(7, 'Terror'),
(8, 'Mistério'),
(9, 'Comédia '),
(10, 'Ação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locacao`
--

CREATE TABLE `locacao` (
  `codigo` int(11) NOT NULL,
  `data_locacao` date DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `status_atual` tinyint(1) DEFAULT NULL,
  `codigo_cliente` int(11) DEFAULT NULL,
  `codigo_pagamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_diretor` (`codigo_diretor`),
  ADD KEY `codigo_genero` (`codigo_genero`);

--
-- Índices de tabela `filmes_locacao`
--
ALTER TABLE `filmes_locacao`
  ADD KEY `codigo_filme` (`codigo_filme`),
  ADD KEY `filmes_locacao_ibfk_1` (`codigo_locacao`);

--
-- Índices de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_cliente` (`codigo_cliente`),
  ADD KEY `codigo_pagamento` (`codigo_pagamento`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `diretor`
--
ALTER TABLE `diretor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `filme_ibfk_1` FOREIGN KEY (`codigo_diretor`) REFERENCES `diretor` (`codigo`),
  ADD CONSTRAINT `filme_ibfk_2` FOREIGN KEY (`codigo_genero`) REFERENCES `genero` (`codigo`);

--
-- Restrições para tabelas `filmes_locacao`
--
ALTER TABLE `filmes_locacao`
  ADD CONSTRAINT `filmes_locacao_ibfk_1` FOREIGN KEY (`codigo_locacao`) REFERENCES `locacao` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `filmes_locacao_ibfk_2` FOREIGN KEY (`codigo_filme`) REFERENCES `filme` (`codigo`);

--
-- Restrições para tabelas `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `locacao_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`codigo`),
  ADD CONSTRAINT `locacao_ibfk_2` FOREIGN KEY (`codigo_pagamento`) REFERENCES `forma_pagamento` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
