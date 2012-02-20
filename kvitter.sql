-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 12 december 2011 kl 08:44
-- Serverversion: 5.1.52
-- PHP-version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `kvitter`
--

-- --------------------------------------------------------

--
-- Struktur för tabell `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `tweet` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Data i tabell `tweets`
--

INSERT INTO `tweets` (`id`, `username`, `tweet`) VALUES
(1, 'Mikael', 'Hej hå, nu står dongen på tå'),
(2, 'Fus', 'Lolrofl terran emp zerg roaches, P UP'),
(3, 'Ricard', '@Valtech'),
(4, 'Kristian', 'är cool för school eller heter det så?'),
(5, 'Mikael', 'layin back'),
(9, 'Fus', 'OP'),
(10, 'Fus', 'hihihi');

-- --------------------------------------------------------

--
-- Struktur för tabell `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `pass`) VALUES
(1, 'Mikael', 'mikael'),
(2, 'Kristian', 'kristian'),
(3, 'Ricard', 'ricard'),
(4, 'Fus', 'fus'),
(5, 'Jokern', 'jokern');

-- --------------------------------------------------------

--
-- Struktur för tabell `user_follows_user`
--

CREATE TABLE IF NOT EXISTS `user_follows_user` (
  `username` varchar(255) NOT NULL,
  `follower` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data i tabell `user_follows_user`
--

INSERT INTO `user_follows_user` (`username`, `follower`) VALUES
('Mikael', 'Fus'),
('Mikael', 'Kristian'),
('Ricard', 'Fus');
