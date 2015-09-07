-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Set-2015 às 06:44
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caronasolidaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE IF NOT EXISTS `agendamentos` (
`id` int(11) NOT NULL,
  `diaDaSemana` varchar(45) NOT NULL,
  `horarioDePartida` time NOT NULL,
  `horarioDeSaida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caronas`
--

CREATE TABLE IF NOT EXISTS `caronas` (
`id` int(20) NOT NULL,
  `pontoInicial` varchar(255) NOT NULL,
  `horarioDePartida` time NOT NULL,
  `horarioDeSaida` time NOT NULL,
  `incialLatitude` int(30) NOT NULL,
  `incialLongitude` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicos`
--

CREATE TABLE IF NOT EXISTS `historicos` (
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE IF NOT EXISTS `veiculos` (
`id` int(50) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `modeloDoCarro` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caronas`
--
ALTER TABLE `caronas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historicos`
--
ALTER TABLE `historicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `caronas`
--
ALTER TABLE `caronas`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historicos`
--
ALTER TABLE `historicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
ADD CONSTRAINT `fk_caronas` FOREIGN KEY (`id`) REFERENCES `caronas` (`id`);

--
-- Limitadores para a tabela `historicos`
--
ALTER TABLE `historicos`
ADD CONSTRAINT `fk_caronasHistoricos` FOREIGN KEY (`id`) REFERENCES `caronas` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_caronasUsers` FOREIGN KEY (`id`) REFERENCES `caronas` (`id`);

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
ADD CONSTRAINT `fk_caronasVeiculos` FOREIGN KEY (`id`) REFERENCES `caronas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
