-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jul-2021 às 14:29
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jornal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `autor_id` int(10) UNSIGNED NOT NULL,
  `autor_login` varchar(255) COLLATE utf8_bin NOT NULL,
  `autor_passe` varchar(255) COLLATE utf8_bin NOT NULL,
  `autor_nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`autor_id`, `autor_login`, `autor_passe`, `autor_nome`) VALUES
(1, 'franciscologin', 'ola123.', 'Francisco Brandão dos Santos'),
(2, 'teste', 'ba953b14f6eb823ab2004d83a1431af3', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `categoria_nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nome`) VALUES
(1, 'Desporto'),
(2, 'Política'),
(3, 'Sociedade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `noticia_id` int(10) UNSIGNED NOT NULL,
  `noticia_titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `noticia_intro` varchar(255) COLLATE utf8_bin NOT NULL,
  `noticia_desenv` varchar(255) COLLATE utf8_bin NOT NULL,
  `noticia_foto` varchar(255) COLLATE utf8_bin NOT NULL,
  `noticia_data` date DEFAULT NULL,
  `noticia_autor` int(10) UNSIGNED DEFAULT NULL,
  `noticia_cat` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `noticia_titulo`, `noticia_intro`, `noticia_desenv`, `noticia_foto`, `noticia_data`, `noticia_autor`, `noticia_cat`) VALUES
(1, 'Luís Filipe Vieira suspeito de outros desvios no Benfica', 'Empresa de Rei dos Frangos ! ', 'Luís Filipe Vieira, que pode ver-se livre da prisão domiciliária com a prestação de caução de três milhões de euros, no âmbito da Operação Cartão Vermelho, está a braços com outra investigação em que também é suspeito de crimes de fraude fiscal e branquea', 'e7c9231777d6f2de9d4ce6c37d8062bf.jpg', '2021-07-09', 2, 1),
(2, 'António Costa diz que o país não pode distrair-se com ', 'Primeiro ministro fala sobre os casos de Covid a população Portuguesa Concerteza ', 'O líder do PS afirmou que Portugal deve estar mobilizado para aplicar os dinheiros da bazuca europeia.', 'dd794d057e1006cf02f9c9bcaff6c12c.jpg', '2021-07-08', 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `fk1` (`noticia_autor`),
  ADD KEY `fk2` (`noticia_cat`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `autor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `noticia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`noticia_autor`) REFERENCES `autor` (`autor_id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`noticia_cat`) REFERENCES `categoria` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
