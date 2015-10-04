DROP TABLE IF EXISTS `agendamentos`;
DROP TABLE IF EXISTS `caronas`;
DROP TABLE IF EXISTS `historicos`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `veiculos`;


CREATE TABLE  `agendamentos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`diaDaSemana` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT 
NULL,
	`horarioDePartida` time NOT NULL,
	`horarioDeSaida` time NOT NULL,	PRIMARY KEY  (`id`))  DEFAULT 
CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE  `caronas` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`pontoInicial` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT 
NULL,
	`horarioDePartida` time NOT NULL,
	`horarioDeSaida` time NOT NULL,
	`incialLatitude` int(30) NOT NULL,
	`incialLongitude` int(30) NOT NULL,	PRIMARY KEY  (`id`))  DEFAULT 
CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE  `historicos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,	PRIMARY KEY  (`id`))  DEFAULT 
CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE  `users` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT 
NULL,	PRIMARY KEY  (`id`))  DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE  `veiculos` (
	`id` int(50) NOT NULL AUTO_INCREMENT,
	`placa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`cor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`cidade` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`estado` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`modeloDoCarro` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci 
NOT NULL,
	`marca` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,	
PRIMARY KEY  (`id`))  DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;


