-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 15/05/2024 às 16:39
-- Versão do servidor: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ccr`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `data_coleta` varchar(30) NOT NULL,
  `hora_coleta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados`
--

INSERT INTO `dados` (`id`, `titulo`, `texto`, `data_coleta`, `hora_coleta`) VALUES
(1, 'Do km 259 até km 265 em São José dos Campos', 'Presidente Dutra: Pista sentido RIO - SP com tráfego intenso na pista Expressa. Obs: Em Volta Redonda, devido obra com tráfego fluindo pela faixa da esquerda . km inicial: 259 / km final: 265', '15/05/2024', '16:39:06'),
(2, 'Do km 219 até km 221 em São José dos Campos', 'Presidente Dutra: Pista sentido RIO - SP com tráfego intenso na pista Marginal. Obs: Em Guarulhos, obra de 24 horas com interdição da faixa da esquerda. km inicial: 219 / km final: 221', '15/05/2024', '16:39:06');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
