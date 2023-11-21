-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Nov-2023 às 15:23
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saep_database`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `id` int(11) NOT NULL,
  `numero` int(16) NOT NULL,
  `cliente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gerente` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `telefone`, `cpf`, `email`, `gerente`) VALUES
(1, 'Teste', '4977', '455', 'teste@email.com', 1),
(2, 'Bernardo EleutÃ©rio', '(47)99999-9999', '1231312', 'aadad@gmail.com', 1),
(3, 'Heitor', '99999999999', '99999999', 'heitor@gmail.com', 1),
(4, 'Bernardo EleutÃ©rio', '(47)99999-9999', '1231312', 'lele@gmail.com', 1),
(5, 'Bernardo EleutÃ©rio', '(47)99999-9999', '1231312', 'aadad@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` int(15) NOT NULL,
  `email` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `senha`, `email`) VALUES
(1, 'Leticia', 1234, 'lele@gmail.com'),
(2, 'MaLu', 12323, 'malu@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerentes`
--

CREATE TABLE `gerentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` int(15) NOT NULL,
  `email` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerentes`
--

INSERT INTO `gerentes` (`id`, `nome`, `senha`, `email`) VALUES
(1, 'Leticia', 1234, 'lele@gmail.com'),
(2, 'Malu', 123123, 'malu1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gerentes`
--
ALTER TABLE `gerentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartao`
--
ALTER TABLE `cartao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gerentes`
--
ALTER TABLE `gerentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
