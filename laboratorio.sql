-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Abr-2021 às 19:50
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `laudos`
--

CREATE TABLE `laudos` (
  `idlaudo` int(11) NOT NULL,
  `clinica` varchar(255) NOT NULL,
  `medico` varchar(255) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `dataa` varchar(255) NOT NULL,
  `idade` varchar(10) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `pressao` varchar(255) NOT NULL,
  `altura` varchar(255) NOT NULL,
  `resultado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `laudos`
--

INSERT INTO `laudos` (`idlaudo`, `clinica`, `medico`, `paciente`, `dataa`, `idade`, `peso`, `pressao`, `altura`, `resultado`) VALUES
(3, 'CLINICA', '1', 'FIRMINO ANDRE VALE CARVALHO DA SILVA', '2021-04-28', '18', '78KG', '10\'01', '1,92', 'NADA'),
(4, 'CLINICA VIDAS', '1', 'SILVANA VALE', '2021-04-28', '32', '74KG', '10\'01', '1,60', 'NADA'),
(5, 'CLINICA DE OLHOS', '2', 'Isabela Lavínia Nascimento', '2021-04-29', '21', '74KG', '11\'02', '1,76', 'UM PARAMETRO FORA DO NORMAL ENCONTRADO, SOLICITO EXAMES '),
(6, 'CLINICA SILVA', '2', 'Rosângela Caroline Silvana Rodrigues', '2021-04-30', '21', '74KG', '11\'18', '1,60', 'NENHUM PARAMETRO ENCONTRADO FORA DO NORMAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `idmedico` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `sit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`idmedico`, `nome`, `cpf`, `email`, `especialidade`, `senha`, `sit`) VALUES
(1, 'Firmino Andre', '987.654.451-12', 'firmino@medico.com', 'Psicologia', 'fbed84795bd4e2c25ee9d7cf99eb4cf0', 1),
(2, 'Pedro Marinho', '123.456.789-14', 'pedro123@medico.com', 'Cardiologia', 'd3ce9efea6244baa7bf718f12dd0c331', 1),
(3, 'Marcia', '213.321.542-12', 'marcia@medico.com', 'Pediatria', '3c6045d8fba20dcba9d3c82c6d843884', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `idpaciente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nomemae` varchar(255) NOT NULL,
  `cidadenasc` varchar(255) NOT NULL,
  `estadonasc` varchar(255) NOT NULL,
  `cidadeatual` varchar(255) NOT NULL,
  `estadoatual` varchar(255) NOT NULL,
  `nacionalidade` varchar(255) NOT NULL,
  `cadastrante` int(2) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nome`, `idade`, `cpf`, `nomemae`, `cidadenasc`, `estadonasc`, `cidadeatual`, `estadoatual`, `nacionalidade`, `cadastrante`, `senha`) VALUES
(1, 'FIRMINO ANDRE VALE CARVALHO DA SILVA', '18', '614.830.143-12', 'SILVANA VALE', 'Pindaré Mirim', 'Maranhão', 'Pindaré Mirim', 'Maranhão', '', 1, ''),
(8, 'SILVANA VALE', '21', '192.123.412-12', 'MARCIA SOUZA', 'Pindaré Mirim', 'Pará', 'Pindaré Mirim', 'Maranhão', 'BRASILEIRO', 1, ''),
(13, 'MARCIO ALENCAR', '29', '812.102.123.12', 'MARIA DO CARMO', 'SANTA INES', 'Maranhão', 'Pindaré Mirim', 'Maranhão', 'BRASILEIRO', 1, 'labsilva@labsilva'),
(14, 'Isabela Lavínia Nascimento', '21', '321.212.231-12', 'Teresinha Stefany Carolina Dias', 'SANTA INES', 'MARANHAO', 'PINDARE', 'MARANHAO', 'BRASILEIRA', 2, 'labsilva@labsilva'),
(15, 'Rosângela Caroline Silvana Rodrigues', '21', '200.121.321-13', 'SANDRA NASCIMENTO', 'BACABAL', 'Pará', 'SAO LUIS', 'Ceará', 'BRASILEIRA', 2, 'labsilva@labsilva'),
(16, 'GABRIELY SILVA', '19', '213.121.321-12', 'MARIA JOAQUINA SILVA', 'SANTA INES', 'Maranhão', 'SANTA INES', 'Maranhão', 'BRASILEIRA', 3, 'labsilva@labsilva');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `laudos`
--
ALTER TABLE `laudos`
  ADD PRIMARY KEY (`idlaudo`);

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idmedico`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idpaciente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `laudos`
--
ALTER TABLE `laudos`
  MODIFY `idlaudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `idmedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
