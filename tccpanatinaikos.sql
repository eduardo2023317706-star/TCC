-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18/12/2025 às 14:23
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tccpanatinaikos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `escalação`
--

DROP TABLE IF EXISTS `escalação`;
CREATE TABLE IF NOT EXISTS `escalação` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `JogoID` int DEFAULT NULL,
  `JogadorID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `JogoID` (`JogoID`),
  KEY `JogadorID` (`JogadorID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `escalação`
--

INSERT INTO `escalação` (`ID`, `JogoID`, `JogadorID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogador`
--

DROP TABLE IF EXISTS `jogador`;
CREATE TABLE IF NOT EXISTS `jogador` (
  `Nome` varchar(255) NOT NULL,
  `Posição` varchar(255) NOT NULL,
  `camisa` int NOT NULL,
  `capitão` tinyint(1) NOT NULL,
  `ID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `jogador`
--

INSERT INTO `jogador` (`Nome`, `Posição`, `camisa`, `capitão`, `ID`) VALUES
('Escobar', 'ala-armador', 4, 1, 1),
('Medina', 'ala-armador', 7, 0, 2),
('Bueno', 'ala-pivo', 10, 0, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Local` varchar(255) NOT NULL,
  `Time adversario` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`ID`, `Data`, `Local`, `Time adversario`) VALUES
(1, '2025-10-21', 'CT Panatinaikos', 'G.N.U basquete');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Titulo` text NOT NULL,
  `Conteudo` text NOT NULL,
  `Datapubli` date NOT NULL,
  `tags` varchar(255) NOT NULL COMMENT 'vai ajudar nas buscas',
  `Imagem` varchar(255) NOT NULL COMMENT 'URL da imagem vinculada a noticia',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`ID`, `Titulo`, `Conteudo`, `Datapubli`, `tags`, `Imagem`) VALUES
(1, 'Foto de teste', 'Essa é uma foto de teste para a apresentação da ursula', '2025-12-16', 'ursula, foto, teste', 'imagens/6941a888c4321.png'),
(2, 'Foto de teste', 'ahhhhhhhhhhhhhhhhhhhhhh', '2025-12-16', 'ursula, foto, teste', 'imagens/6941a89e62313.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `senha`, `tipo`) VALUES
(1, 'admin', 'pana123', 'admin');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `escalação`
--
ALTER TABLE `escalação`
  ADD CONSTRAINT `escalação_ibfk_1` FOREIGN KEY (`JogoID`) REFERENCES `jogos` (`ID`),
  ADD CONSTRAINT `escalação_ibfk_2` FOREIGN KEY (`JogadorID`) REFERENCES `jogador` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
