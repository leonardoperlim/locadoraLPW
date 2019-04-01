-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 19-Mar-2019 às 19:08
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_AutoLocadoraCarros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alugar`
--

CREATE TABLE `alugar` (
  `id_clientes` int(10) NOT NULL,
  `id_carro` int(10) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `valor_total` int(10) NOT NULL,
  `id_alugar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `alugar`
--

INSERT INTO `alugar` (`id_clientes`, `id_carro`, `data_inicio`, `data_fim`, `valor_total`, `id_alugar`) VALUES
(1, 2, '2019-03-19', '2019-03-23', 320, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `id_carro` int(10) NOT NULL,
  `marca` varchar(16) COLLATE utf8_bin NOT NULL,
  `modelo` varchar(16) COLLATE utf8_bin NOT NULL,
  `ano` int(4) NOT NULL,
  `cor` varchar(16) COLLATE utf8_bin NOT NULL,
  `placa` varchar(7) COLLATE utf8_bin NOT NULL,
  `valor_diaria` int(4) NOT NULL,
  `aluguel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id_carro`, `marca`, `modelo`, `ano`, `cor`, `placa`, `valor_diaria`, `aluguel`) VALUES
(2, 'Audi', 'A2', 2019, 'Prata', 'LKJ1234', 80, 1),
(3, 'Chevrolet', 'Corsa', 2003, 'Branco', 'IUY1942', 42, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_clientes` int(10) NOT NULL,
  `nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `telefone` char(8) COLLATE utf8_bin NOT NULL,
  `cpf` int(11) NOT NULL,
  `sexo` char(1) COLLATE utf8_bin NOT NULL,
  `email` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_clientes`, `nome`, `telefone`, `cpf`, `sexo`, `email`) VALUES
(1, 'Leonardo', '33987654', 2147483647, 'M', 'leonardoperlim@gmail.com'),
(3, 'Lopes', '78976554', 2147483647, 'M', 'lopes@hotmail.com'),
(4, 'Halana', '32878909', 2147483647, 'F', 'halana@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alugar`
--
ALTER TABLE `alugar`
  ADD PRIMARY KEY (`id_alugar`),
  ADD KEY `fk_carro` (`id_carro`),
  ADD KEY `fk_cliente` (`id_clientes`);

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id_carro`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_clientes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alugar`
--
ALTER TABLE `alugar`
  MODIFY `id_alugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `id_carro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_clientes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alugar`
--
ALTER TABLE `alugar`
  ADD CONSTRAINT `fk_carro` FOREIGN KEY (`id_carro`) REFERENCES `carro` (`id_carro`),
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_clientes`) REFERENCES `cliente` (`id_clientes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
