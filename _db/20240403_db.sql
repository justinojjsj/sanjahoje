-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 23/04/2024 às 00:22
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
-- Banco de dados: `db_inpe`
--
CREATE DATABASE IF NOT EXISTS `db_inpe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_inpe`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `data` varchar(30) NOT NULL,
  `chuva_manha` varchar(20) NOT NULL,
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
(4, '08/04/2024', '5%', '5%', '5%', '30°', '19°', '9', '06:14', '17:55', '10:28:15'),
(5, '23/04/2024', '5%', '5%', '5%', '30°', '16°', '7', '06:20', '17:43', '00:11:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Banco de dados: `db_noticias`
--
CREATE DATABASE IF NOT EXISTS `db_noticias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_noticias`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tempo` varchar(50) NOT NULL,
  `data_coleta` varchar(50) NOT NULL,
  `hora_coleta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados`
--

INSERT INTO `dados` (`id`, `titulo`, `url`, `tempo`, `data_coleta`, `hora_coleta`) VALUES
(1, 'Quase metade das cidades do Vale e região têm nomes com origem indígena; saiba quais são e veja os significados', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/19/quase-metade-das-cidades-do-vale-e-regiao-tem-nomes-com-origem-indigena-saiba-quais-sao-e-veja-os-significados.ghtml', 'Há 4 dias', '2024-04-23', '00:03:07'),
(2, 'Com novos óbitos por dengue registrados em Taubaté e Caçapava, região chega a 76 mortes pela doença', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/19/com-novos-obitos-registrados-em-taubate-e-cacapava-regiao-chega-a-76-mortes-pela-doenca.ghtml', 'Há 3 dias', '2024-04-23', '00:03:07'),
(3, 'Embraer entrega 25 aviões no 1° trimestre deste ano, alta de quase 70% no período', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/19/embraer-entrega-25-avioes-no-1-trimestre-deste-ano-alta-de-quase-70percent-no-periodo.ghtml', 'Há 3 dias', '2024-04-23', '00:03:07'),
(4, 'Busque sua vaga 🔎: cidades do Vale e região bragantina abrem semana com 2,7 mil vagas de emprego', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/busque-sua-vaga-cidades-do-vale-e-regiao-bragantina-emprego-abril.ghtml', 'Há 19 horas', '2024-04-23', '00:03:07'),
(5, 'Programa Bom Prato oferece 31 vagas de emprego no Vale do Paraíba; confira as oportunidades', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/programa-bom-prato-oferece-31-vagas-de-emprego-no-vale-do-paraiba-confira-as-oportunidades.ghtml', 'Há 16 horas', '2024-04-23', '00:03:07'),
(6, 'São José dos Campos reabre Hospital de Retaguarda exclusivamente para internações', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/sao-jose-dos-campos-reabre-hospital-de-retaguarda-exclusivamente-para-internacoes-de-casos-de-dengue.ghtml', 'Há 15 horas', '2024-04-23', '00:03:07'),
(7, 'Tutora é autuada por maus-tratos por alimentar cavalo com refrigerante; animal foi encontrado desnutrido e debilitado', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/tutora-e-autuada-por-maus-tratos-por-alimentar-cavalo-com-refrigerante-animal-foi-encontrado-desnutrido-e-debilitado.ghtml', 'Há 14 horas', '2024-04-23', '00:03:07'),
(8, 'Quase metade das cidades do Vale e região têm nomes com origem indígena; saiba quais são e veja os significados', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/19/quase-metade-das-cidades-do-vale-e-regiao-tem-nomes-com-origem-indigena-saiba-quais-sao-e-veja-os-significados.ghtml', 'Há 4 dias', '2024-04-23', '03:15:02'),
(9, 'Com novos óbitos por dengue registrados em Taubaté e Caçapava, região chega a 76 mortes pela doença', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/19/com-novos-obitos-registrados-em-taubate-e-cacapava-regiao-chega-a-76-mortes-pela-doenca.ghtml', 'Há 3 dias', '2024-04-23', '03:15:02'),
(10, 'Embraer entrega 25 aviões no 1° trimestre deste ano, alta de quase 70% no período', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/19/embraer-entrega-25-avioes-no-1-trimestre-deste-ano-alta-de-quase-70percent-no-periodo.ghtml', 'Há 3 dias', '2024-04-23', '03:15:02'),
(11, 'Busque sua vaga 🔎: cidades do Vale e região bragantina abrem semana com 2,7 mil vagas de emprego', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/busque-sua-vaga-cidades-do-vale-e-regiao-bragantina-emprego-abril.ghtml', 'Há 19 horas', '2024-04-23', '03:15:02'),
(12, 'Programa Bom Prato oferece 31 vagas de emprego no Vale do Paraíba; confira as oportunidades', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/programa-bom-prato-oferece-31-vagas-de-emprego-no-vale-do-paraiba-confira-as-oportunidades.ghtml', 'Há 16 horas', '2024-04-23', '03:15:02'),
(13, 'São José dos Campos reabre Hospital de Retaguarda exclusivamente para internações', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/sao-jose-dos-campos-reabre-hospital-de-retaguarda-exclusivamente-para-internacoes-de-casos-de-dengue.ghtml', 'Há 14 horas', '2024-04-23', '03:15:02'),
(14, 'Tutora é autuada por maus-tratos por alimentar cavalo com refrigerante; animal foi encontrado desnutrido e debilitado', 'https://g1.globo.com/sp/vale-do-paraiba-regiao/noticia/2024/04/22/tutora-e-autuada-por-maus-tratos-por-alimentar-cavalo-com-refrigerante-animal-foi-encontrado-desnutrido-e-debilitado.ghtml', 'Há 13 horas', '2024-04-23', '03:15:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Banco de dados: `db_testes`
--
CREATE DATABASE IF NOT EXISTS `db_testes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_testes`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
