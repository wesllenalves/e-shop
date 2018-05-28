-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2018 às 17:51
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codigoCliente` int(11) NOT NULL,
  `nomeCliente` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipoUsuario` varchar(255) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `FKEndereco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigoCliente`, `nomeCliente`, `email`, `tipoUsuario`, `senha`, `cpf`, `celular`, `FKEndereco`) VALUES
(1, 'wesllen alves de sousa aa', 'wesllenalves@gmail.com', '', '123456789', '03230944143', '1111111', 1),
(2, 'wesllen alves de sousa', 'wesllenalves@gmail.com', '', '', '03230944143', '619817456595', 2),
(3, 'wesllen alves de sousa', 'wesllenalves@gmail.com', '', '123456', '03230944143', '619817456595', 3),
(4, 'wesllen alves de sousa', 'wesllenalves@gmail.com', '', '', '03230944143', '619817456595', 4),
(5, 'lucas maria da silva', 'teste@teste.com', 'comun', '123456', '03230944143', '619817456595', 5),
(6, 'teste teste', 'teste@teste.com', 'comun', '123456', '03230944156', '61981745566', 6),
(7, 'teste', 'admin@admin.com', 'admin', '123456', '03230944143', '61981745695', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `codigoEndereco` int(11) NOT NULL,
  `logadouro` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(65) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`codigoEndereco`, `logadouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`) VALUES
(1, 'cadas', '1245', 'green park', 'aguas caras', 'brasilia', 'df', '11111111'),
(2, 'cadas', '1245', 'green park', 'aguas caras', 'brasilia', 'df', '70645160'),
(3, 'cadas', '1245', 'green park', 'aguas caras', 'brasilia', 'df', '70645160'),
(4, 'cadas', '1245', 'green park', 'aguas caras', 'brasilia', 'df', '70645160'),
(5, 'lote 01/03 rua 20 norte ', '1614', 'green park', 'aguas claras', 'brasilia', 'df', '70645160'),
(6, 'lote 01/03 rua 20 norte ', '1610', 'green park', 'aguas claras', 'brasilia', 'go', '70645160'),
(7, 'rua 20 norte', '1614', 'green park', 'aguas claras', 'brasilia', 'df', '70645160');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `codigoFornecedor` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `nomeFornecedor` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`codigoFornecedor`, `cnpj`, `nomeFornecedor`, `telefone`, `email`) VALUES
(1, '', 'casa do sapato', '61981745395', 'wesllen@gmail.com'),
(2, '', 'casa do sapato', '61981745395', 'wesllen@gmail.com'),
(3, '', 'casa do sapato', '61981745395', 'wesllen@gmail.com'),
(4, '', 'casa do sapato', '61981745395', 'wesllen@gmail.com'),
(5, '', 'casa do sapato', '61981745395', 'wesllen@gmail.com'),
(6, '', 'casa do sapato', '61981745395', 'wesllen@gmail.com'),
(7, '', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(8, '1234567', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(9, '1234567', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(10, '1234567', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(11, '1234567', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(12, '1234567', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(13, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(14, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(15, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(16, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(17, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(18, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(19, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(20, '123456544554', 'casa do sapato', '6198174595', 'wesllen@gmail.com'),
(21, '01234566789', 'Casa dos tenis ', '6198475358', 'teste@teste.com'),
(22, '01234566789', 'Casa dos tenis ', '6198475358', 'teste@teste.com'),
(23, '01234566789', 'Casa dos tenis ', '6198475358', 'teste@teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigoProduto` int(11) NOT NULL,
  `nomeProduto` varchar(255) NOT NULL,
  `descricaoProduto` text NOT NULL,
  `qtdEstoque` int(11) NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `fotoProduto` varchar(255) NOT NULL,
  `FKFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigoProduto`, `nomeProduto`, `descricaoProduto`, `qtdEstoque`, `valor`, `fotoProduto`, `FKFornecedor`) VALUES
(1, 'tennis', 'novo', 3, '25.00', 'tenis-nike-air-behold-low-masculino.jpg', 20),
(2, 'sapatennis', 'um confortÃ¡vel sapato para o verao', 10, '80.00', 'main-product01.jpg', 22),
(3, 'sapatennis', 'testetes para testes', 100, '90.00', 'main-product02.jpg', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigoCliente`),
  ADD UNIQUE KEY `FKEndereco_constraint` (`FKEndereco`) USING BTREE;

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`codigoEndereco`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`codigoFornecedor`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigoProduto`,`FKFornecedor`),
  ADD KEY `FKFornecedor_codigoFornecedor_idx` (`FKFornecedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `codigoEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `codigoFornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codigoProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FKEndereco_constraint` FOREIGN KEY (`FKEndereco`) REFERENCES `endereco` (`codigoEndereco`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FKFornecedor_codigoFornecedor` FOREIGN KEY (`FKFornecedor`) REFERENCES `fornecedor` (`codigoFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
