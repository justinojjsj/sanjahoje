-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 08/04/2024 às 13:30
-- Versão do servidor: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_inpe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `data` varchar(30) NOT NULL,
  `chuva_manha` varchar(5) NOT NULL,
  `chuva_tarde` varchar(5) NOT NULL,
  `chuva_noite` varchar(5) NOT NULL,
  `temp_max` varchar(5) NOT NULL,
  `temp_min` varchar(5) NOT NULL,
  `ind_uv` varchar(5) NOT NULL,
  `amanhecer` varchar(10) NOT NULL,
  `entardecer` varchar(10) NOT NULL,
  `hora_coleta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados`
--

INSERT INTO `dados` (`id`, `data`, `chuva_manha`, `chuva_tarde`, `chuva_noite`, `temp_max`, `temp_min`, `ind_uv`, `amanhecer`, `entardecer`, `hora_coleta`) VALUES
(1, '03/04/2024', '5%', '5%', '5%', '30°', '18°', '9', '06:12', '18:00', ''),
(3, '08/04/2024', '5%', '5%', '5%', '35°', '19°', '9', '06:14', '17:55', '10:25:11'),
(4, '08/04/2024', '5%', '5%', '5%', '30°', '19°', '9', '06:14', '17:55', '10:28:15');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
