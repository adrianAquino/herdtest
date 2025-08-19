-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Ago-2025 às 20:15
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `herd`
--
CREATE DATABASE IF NOT EXISTS `herd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `herd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `codAnimais` int(11) NOT NULL,
  `numeracaoBrinco` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `pelagem` varchar(255) NOT NULL,
  `origem` varchar(255) NOT NULL,
  `situacaoReprodutiva` varchar(255) NOT NULL,
  `nomePai` varchar(255) DEFAULT NULL,
  `nomeMae` varchar(255) DEFAULT NULL,
  `valorMercadoAtual` decimal(10,2) NOT NULL,
  `situacaoComercial` varchar(255) NOT NULL,
  `animal_status` tinyint(1) NOT NULL DEFAULT 1,
  `idRaca` int(11) NOT NULL,
  `idPropriedades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtores`
--

CREATE TABLE `produtores` (
  `codProdutores` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `CPF` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `CEP` varchar(45) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `produtores_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtores`
--

INSERT INTO `produtores` (`codProdutores`, `nome`, `CPF`, `dataNascimento`, `email`, `telefone`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `CEP`, `login`, `senha`, `produtores_status`) VALUES
(1, 'Adrian', '14990855914', '2005-05-24', 'kauan.melo2013@hotmail.com', '449976438577', 'Rodovia PR485', '445', 'Santa Maria', 'Cafezal do Sul', 'PR', '87565000', 'adrian123', 'adrian123', 1),
(2, 'Ivanildo', '58923292915', '1966-11-16', 'ivanildorochademelo@gmail.com', '44999968305', 'Rua Suíça', '564', 'Centro', 'Cafezal do Sul', 'Paraná', '87565000', 'ivanildo123', 'ivanildo123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `propriedades`
--

CREATE TABLE `propriedades` (
  `codPropriedades` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `estrada` varchar(255) NOT NULL,
  `areaTotal` decimal(10,3) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `quantidadeAnimais` int(11) NOT NULL,
  `responsavelTecnico` varchar(255) DEFAULT NULL,
  `idProdutores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `codRaca` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipoRaca` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `origemRaca` varchar(255) NOT NULL,
  `raca_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`codRaca`, `nome`, `tipoRaca`, `descricao`, `origemRaca`, `raca_status`) VALUES
(1, 'Nelore', 'Gado', 'Raça zebuína originária da Índia, conhecida por sua pelagem branca ou cinza clara e pele escura, que a torna adaptada ao clima tropical', 'Estrangeira', 1),
(2, 'Holstein-Frisia', 'Gado', 'Raça bovina leiteira de grande porte, conhecida mundialmente pela sua alta produção de leite', 'Estrangeira', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`codAnimais`),
  ADD KEY `fk_propriedade_animal` (`idPropriedades`),
  ADD KEY `fk_raca_animal` (`idRaca`);

--
-- Índices para tabela `produtores`
--
ALTER TABLE `produtores`
  ADD PRIMARY KEY (`codProdutores`);

--
-- Índices para tabela `propriedades`
--
ALTER TABLE `propriedades`
  ADD PRIMARY KEY (`codPropriedades`),
  ADD KEY `fk_produtor_propriedade` (`idProdutores`);

--
-- Índices para tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`codRaca`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `codAnimais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtores`
--
ALTER TABLE `produtores`
  MODIFY `codProdutores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `propriedades`
--
ALTER TABLE `propriedades`
  MODIFY `codPropriedades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `codRaca` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animais`
--
ALTER TABLE `animais`
  ADD CONSTRAINT `fk_propriedade_animal` FOREIGN KEY (`idPropriedades`) REFERENCES `propriedades` (`codPropriedades`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_raca_animal` FOREIGN KEY (`idRaca`) REFERENCES `raca` (`codRaca`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `propriedades`
--
ALTER TABLE `propriedades`
  ADD CONSTRAINT `fk_produtor_propriedade` FOREIGN KEY (`idProdutores`) REFERENCES `produtores` (`codProdutores`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
