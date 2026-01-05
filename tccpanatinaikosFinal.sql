-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05/01/2026 às 12:28
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
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) NOT NULL,
  `data_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `galeria`
--

INSERT INTO `galeria` (`id`, `imagem`, `data_upload`) VALUES
(11, 'imagens/693fb770c7ea4.png', '2025-12-15 07:23:28'),
(9, 'imagens/693fb73a5c462.png', '2025-12-15 07:22:34'),
(10, 'imagens/693fb753bf1d1.png', '2025-12-15 07:22:59'),
(8, 'imagens/693fb7199c345.png', '2025-12-15 07:22:01');

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
  `Datapubli` datetime NOT NULL,
  `tags` varchar(255) NOT NULL COMMENT 'vai ajudar nas buscas',
  `Imagem` varchar(255) NOT NULL COMMENT 'URL da imagem vinculada a noticia',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`ID`, `Titulo`, `Conteudo`, `Datapubli`, `tags`, `Imagem`) VALUES
(13, 'Vice-campeão da LTFB!!!', 'Após um fim de semana de jogos participando do campeonato da LTFB o Panatinaikos Uruguaiana se consagra vice-campeão da competição na categoria Sub-13', '2025-12-15 06:41:41', 'LTFB, campeonatos', 'imagens/693fada54fd20.png'),
(14, 'Campeões da Liga uruguaia', 'No sábado dia 07/12 em Rivera a gurizada do sub14 sangrou-se campeão do torneio \"Confraternidad\". 💪🏻🏀🏀🏆\r\n', '2025-12-15 06:47:15', 'Liga uruguaia, campeonatos', 'imagens/693faef367599.png'),
(15, 'Campeões da Liga CDA', 'No sábado em Artigas -Uruguai a categoria sub17 participou do torneio de inauguração das tabelas do clube CDA! ⛹🏻⛹🏻\r\nForam 3 jogos disputadíssimos de um ótimo nível mas conseguimos a vitória em um apenas!! 🙌🏻🏀🏀\r\nParabéns a equipe da casa que sagrou-se campeã! 👏🏻👏🏻🏆', '2025-12-15 06:58:44', 'Liga CDA, campeonatos', 'imagens/693fb1a45d202.png'),
(17, 'Participação na LNBB sub-15', 'No sábado a gurizada do Sub15 foi a Novo Hamburgo para mais uma etapa da LNBB. 💪🏻🏀🏀\r\nCom uma vitória e uma derrota, encerrou sua participação no torneio. 👏🏻👏🏻', '2025-12-15 07:03:08', 'LNBB, campeonatos', 'imagens/693fb2ac32f32.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `tipo`) VALUES
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
