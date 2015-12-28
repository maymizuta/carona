-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12-Out-2015 às 12:19
-- Versão do servidor: 5.6.24
-- PHP Version: 5.5.28

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

DROP TABLE IF EXISTS `agendamentos`;
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int(11) NOT NULL,
  `diaDaSemana` varchar(45) NOT NULL,
  `horarioDePartida` time NOT NULL,
  `horarioDeSaida` time NOT NULL,
  `carona_id` int(20) NOT NULL COMMENT 'chave estrangeira de carona'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caronas`
--

DROP TABLE IF EXISTS `caronas`;
CREATE TABLE IF NOT EXISTS `caronas` (
  `id` int(20) NOT NULL,
  `pontoInicial` varchar(255) NOT NULL,
  `horarioDePartida` time NOT NULL,
  `horarioDeSaida` time NOT NULL,
  `incialLatitude` int(30) NOT NULL,
  `incialLongitude` int(30) NOT NULL,
  `user_id` int(20) NOT NULL COMMENT 'Chave estrangeira de users'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caronas`
--

INSERT INTO `caronas` (`id`, `pontoInicial`, `horarioDePartida`, `horarioDeSaida`, `incialLatitude`, `incialLongitude`, `user_id`) VALUES
(1, 'inicio', '00:00:00', '00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicos`
--

DROP TABLE IF EXISTS `historicos`;
CREATE TABLE IF NOT EXISTS `historicos` (
  `id` int(11) NOT NULL,
  `carona_id` int(20) NOT NULL COMMENT 'chave estrangeira de caronas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL COMMENT 'id do ususer que esta pedindo carona',
  `carona_id` int(20) NOT NULL COMMENT 'id da carona ',
  `aceito` tinyint(1) DEFAULT NULL COMMENT 'Se o pedido for aceito ou nao. Se estiver em null, ele ainda nao foi avaliado ',
  `created` datetime DEFAULT NULL COMMENT 'data de criacao do pedido'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`) VALUES
(9, 'nome', 'email@example.com', 'bb60bd5703878f892334ebbb7374cd3ddddd3cd6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(50) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `modeloDoCarro` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
