-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2023 às 01:17
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
(2, 'Diego');

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
(1, 'Pix'),
(2, 'Boleto');

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
(1, 'Romance');

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `diretor`
--
ALTER TABLE `diretor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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
