futeOnline2020
tabela time
    time_id - 
    time_refCampeonato
    time_nome - max 46 cc
    time_pontos
    time_golsFeitos
    time_golsSofridos
    time_vitorias
    time_derrotas
    time_empates
    time_dataCriado

tabela campeonato
    camp_id
    camp_senha
    camp_email
    camp_nome
    camp_numeroRodadas
    camp_totalTimes
    camp_dataCriado
    camp_dataUltimaPartida

tabela partida
    part_id
    part_refCampeonato
    part_timeCasaID
    part_VisitanteID
    part_placarCasa
    part_placarVisi
    part_rodada
    part_data
    
Regras:
O campeona
//por enquanto será aleatorio
Aleatorio 0 - 4to é criado por uma pessoa real.
Cada campeonato pode ter até X times.
A cada X tempo é liberado o botão para realizar 1 jogo aleatórios entre cada time do torneio local.


Sistema de Gols:

calcular Gols ->
//por enquanto será aleatorio
Aleatorio 0 - 4

sorteio de jogos ->
shuffle com array dos times




-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Abr-2019 às 01:43
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futeonline2020`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonato`
--

CREATE TABLE `campeonato` (
  `camp_id` int(9) NOT NULL,
  `camp_email` varchar(60) NOT NULL,
  `camp_senha` int(11) NOT NULL,
  `camp_nome` varchar(46) NOT NULL,
  `camp_numeroRodadas` int(5) NOT NULL,
  `camp_totalTimes` int(2) NOT NULL,
  `camp_dataCriado` datetime NOT NULL,
  `camp_dataUltimaPartida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `part_id` int(9) NOT NULL,
  `part_refCampeonato` int(9) NOT NULL,
  `part_timeCasaID` int(9) NOT NULL,
  `part_VisitanteID` int(9) NOT NULL,
  `part_placarCasa` int(2) NOT NULL,
  `part_placarVisi` int(2) NOT NULL,
  `part_rodada` int(5) NOT NULL,
  `part_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE `time` (
  `time_id` int(9) NOT NULL,
  `time_refCampeonato` int(9) NOT NULL,
  `time_nome` varchar(46) COLLATE utf8_bin NOT NULL,
  `time_pontos` int(4) NOT NULL,
  `time_golsFeitos` int(5) NOT NULL,
  `time_golsSofridos` int(5) NOT NULL,
  `time_vitorias` int(4) NOT NULL,
  `time_derrotas` int(4) NOT NULL,
  `time_empates` int(4) NOT NULL,
  `time_dataCriado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campeonato`
--
ALTER TABLE `campeonato`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campeonato`
--
ALTER TABLE `campeonato`
  MODIFY `camp_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partida`
--
ALTER TABLE `partida`
  MODIFY `part_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
