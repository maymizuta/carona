-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 06/10/2015 às 13:41
-- Versão do servidor: 5.6.24
-- Versão do PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `caronasolidaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int(11) NOT NULL,
  `diaDaSemana` varchar(45) NOT NULL,
  `horarioDePartida` time NOT NULL,
  `horarioDeSaida` time NOT NULL,
  `carona_id` int(20) NOT NULL COMMENT 'chave estrangeira de carona'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `caronas`
--

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
-- Fazendo dump de dados para tabela `caronas`
--

INSERT INTO `caronas` (`id`, `pontoInicial`, `horarioDePartida`, `horarioDeSaida`, `incialLatitude`, `incialLongitude`, `user_id`) VALUES
(1, 'inicio', '00:00:00', '00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicos`
--

CREATE TABLE IF NOT EXISTS `historicos` (
  `id` int(11) NOT NULL,
  `carona_id` int(20) NOT NULL COMMENT 'chave estrangeira de caronas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`) VALUES
(9, 'nome', 'email@example.com', 'bb60bd5703878f892334ebbb7374cd3ddddd3cd6');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

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
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `caronas`
--
ALTER TABLE `caronas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `caronas`
--
ALTER TABLE `caronas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
