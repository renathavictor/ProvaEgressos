-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: 29-Maio-2019 às 15:04
-- Versão do servidor: 8.0.16
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egressos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `courses`
--

CREATE TABLE `courses` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `campus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `courses`
--

INSERT INTO `courses` (`id`, `name`, `campus`) VALUES
(1, 'Sistemas para Internet', 'ifpb-jp'),
(2, 'Redes de Computadores', 'ifpb-jp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL,
  `github` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `course`, `linkedin`, `github`) VALUES
(1, 'Luiz Carlos Chaves', 'lucachaves@gmail.com', '$2y$10$q0GsV5xZIbuDPyNwFF64tu/JOJuoC2HtFSAL7opEL3AZVARFskVze', 'Sistemas para Internet', 'https://www.linkedin.com/luiz', 'https://www.github.com/luiz'),
(2, 'Renatha', 'renatha@email.com', '$2y$10$/GM9r.4hXKZm58yn2xTGPeHOriwN2zsZrelVK2zM7fjjTtOrac36K', 'tsi', 'https://www.linkedin.com/renatha', 'https://www.github.com/renatha'),
(4, 'teste dois', 'teste@email.com', '$2y$10$9R2gSSs0Rq551Rk13s3na.WcVC1.cUrIMj05RZ3F0jOzgSEXhuASW', NULL, NULL, NULL),
(5, 'dasdad dasdasd', 'luca@email.com', '$2y$10$j6gY.g7voqGA/49pwOAxuOdhUbnnFq5cJzueI/RHK8L5te2rD9DwO', NULL, NULL, NULL),
(6, 'teste dad', 'dasd@emailcom', '$2y$10$HVNzL6cRKWJOTrEZgeJMceXvkZb3osv8l60VTnWY3.y3SFYY746oq', NULL, NULL, NULL),
(7, 'teste testando', 'testando@email.com', '$2y$10$EMhdfLl0Hzy9kcuvhjRCkepG268MXA.4YPRcHuK8oOeM/fgotlDt.', NULL, NULL, NULL),
(8, 'Alana Morais', 'alana_mm@hotmail.com', '$2y$10$j/M0WSD8i73j6jaQ/H2bKO9E63Ukgsfo1Tzr05G/0DKymWnJS1TSq', 'tsi', 'https://www.linkedin.com/in/alana-morais-b6b0a195/', ''),
(9, 'Alisson Sena', 'alisson.sena@gmail.com', '$2y$10$x4V2h56Iq.yRgpMRPBw3FumcLELy1mELpZGdGpINgw1GHHvWAM2iS', '', 'https://www.linkedin.com/in/alisson-sena/', ''),
(10, 'André Vinagre', 'andrenvinagre@gmail.com', '$2y$10$vgLmHARgBfoiYDKrNSNA/eWJGad0E4iGEe3wt.SNJFOYZunWbGIAK', '', 'https://www.linkedin.com/in/andre-vinagre/', ''),
(11, 'Andreza Vieira', 'andreza_sv@yahoo.com.br', '$2y$10$vi75S80qdWOnXmcMnnh1Z.8181eqZeHeP0cxyZFBup64W.HJvKbrW', 'tsi', 'https://www.linkedin.com/in/andrezavieira/', ''),
(12, 'Anna Clara Nobrega', 'acrnobrega@hotmail.com', '$2y$10$8aY0uERGhFn.AA8xPA8V8O6xgHem5LwxM2OAbtgVtd9hBCVjoLSwG', NULL, NULL, NULL),
(13, 'Andréa Bezerra', 'dsi.andrea@hotmail.com', '$2y$10$RyM8R0pK/sEJbFUb5eK7SurGT9HHDpTN53tH.yM4IRJ19SJ6Lz6ae', NULL, NULL, NULL),
(14, 'Alex Martins', 'alexmbezerrajp@gmail.com', '$2y$10$vTRmS0B3pXjYoCTT3f7LyuMuh0p7IRLznSdljXfoIShFgUcbHb3uG', '', 'https://www.linkedin.com/alex', ''),
(15, 'Ângelo Negreiros', 'angelolvnegreiros@hotmail', '$2y$10$zabhAYuuTKimTcEbJoQfTeQhclMI9GEUW.jo/SDGKMyC72gN8sE.a', NULL, NULL, NULL),
(16, 'Alessandra Silva', 'alessandra@email.com', '$2y$10$pCDbaovKp87ZbeDTe.MrxeUxX3KEDUsQzLrCAcfeSQ/e6f.fJAmZq', NULL, NULL, NULL),
(17, 'Alexandre Dias', 'dias.jbr@gmail.com', '$2y$10$O872.Q4ZIiVswPVSm7hpVeCtmRi2.iJqyGGoVj0FYVUdQov0ROsWC', NULL, NULL, NULL),
(18, 'dasdasd eqweqwe', 'dasdads@emaill.com', '$2y$10$M0hQL3VPFQjCjUuAe0esOeycFZ8ce2YxX33j2BH0zUgrEjNdFyhiO', 'Sistemas para Internet', 'https://www.linkedin.com/dasdd2', 'https://www.github.com/dasd2'),
(19, 'André Alencar', 'andrealencar@outlook.com.br', '$2y$10$htXm1BouhddCHCgXd5hNEOC4TTtaWHKhzVToFz.FxmkyUjd0VfEU2', 'Escolha o seu curso', 'https://www.linkedin.com/in/andreealencar', 'https://github.com/andreealencar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
