-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Ago-2021 às 15:25
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_padaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comandas`
--

DROP TABLE IF EXISTS `comandas`;
CREATE TABLE IF NOT EXISTS `comandas` (
  `Codigo` int(11) NOT NULL,
  `Produtos` json DEFAULT NULL,
  `Data` date DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comandas`
--

INSERT INTO `comandas` (`Codigo`, `Produtos`, `Data`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, NULL, NULL),
(10, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `Codigo` int(11) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Valor` float NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Codigo`, `Nome`, `Valor`) VALUES
(1, 'Pão', 5.3),
(2, 'Bolo', 6.35),
(3, 'Torrada', 3.29),
(4, 'Pudim', 4.9),
(5, ' Café', 2.4),
(6, 'Chocolate quente', 3.9),
(7, 'Chá', 2.55),
(8, 'Cupcake', 4.85),
(9, 'Salgado', 3.99),
(10, 'Sanduíche', 5.35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo_produto` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Vendas` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`Id`, `Codigo_produto`, `Data`, `Vendas`) VALUES
(1, 6, '2021-08-13', 4),
(2, 1, '2021-08-12', 7),
(3, 1, '2021-08-13', 14),
(4, 5, '2021-08-13', 8),
(5, 7, '2021-08-13', 5),
(6, 3, '2021-08-13', 10),
(7, 4, '2021-08-13', 2),
(8, 9, '2021-08-13', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
