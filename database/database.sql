-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Fev-2021 às 23:02
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_pweb_sbll`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

DROP DATABASE `projeto_pweb_sbll`;
CREATE DATABASE `projeto_pweb_sbll`;
USE `projeto_pweb_sbll`;

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `isAdopted` tinyint(1) NOT NULL DEFAULT 0,
  `adoptedBy` varchar(100) DEFAULT NULL,
  `adoptedAt` date DEFAULT NULL,
  `registeredBy` varchar(100) DEFAULT NULL,
  `adoptionLocation` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`id`, `name`, `description`, `type`, `sex`, `isAdopted`, `adoptedBy`, `registeredBy`, `adoptionLocation`) VALUES
(1, 'giovanni giorgio', 'his name is', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', 'florença, itália'),
(2, '2', '2', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', 'silverstone circuit'),
(3, '3', '3', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', 'times square, nova iorque'),
(4, '4', '4', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', 'empire state building'),
(5, '5', '5', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', 'don quijote, dotonbori, osaka, japao'),
(6, '6', '6', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', '6'),
(7, '7', '7', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', '7'),
(8, '8', '8', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', '8'),
(9, '9', '9', 'Cachorro', 'Fêmea', 0, NULL, 'sandenson', '9'),
(10, '10', '10', 'Cacatua', 'Fêmea', 0, NULL, 'sandenson', '10'),
(11, '11', '11', 'Cacatua', 'Fêmea', 0, NULL, 'sandenson', '11'),
(12, '12', '12', 'Cacatua', 'Fêmea', 0, NULL, 'sandenson', '12'),
(13, '13', '13', 'Cacatua', 'Fêmea', 0, NULL, 'sandenson', '13'),
(14, '14', '14', 'Cacatua', 'Fêmea', 0, NULL, 'sandenson', '14'),
(15, '15', '15', 'Marcos', 'Fêmea', 0, NULL, 'sandenson', '15'),
(16, '16', '16', 'Marcos', 'Fêmea', 0, NULL, 'sandenson', '16'),
(17, '17', '17', 'Marcos', 'Fêmea', 0, NULL, 'sandenson', '17'),
(18, '18', '18', 'Marcos', 'Fêmea', 0, NULL, 'sandenson', '18'),
(19, '19', '19', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '19'),
(20, '20', '20', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '20'),
(21, '21', '21', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '21'),
(23, '23', '23', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '23'),
(24, '24', '24', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '24'),
(25, '25', '25', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '25'),
(26, '26', '26', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '26'),
(27, '27', '27', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '27'),
(28, '28', '28', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '28'),
(29, '29', '29', 'BONORO', 'Fêmea', 0, NULL, 'sandenson', '29'),
(30, '30', '30', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '30'),
(31, '31', '31', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '31'),
(32, '32', '32', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '32'),
(33, '33', '33', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '33'),
(34, '34', '34', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '34'),
(35, '35', '35', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '35'),
(36, '36', '36', 'Ford Pinto', 'Fêmea', 0, NULL, 'sandenson', '36'),
(37, '37', '37', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '37'),
(38, '38', '38', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '38'),
(39, '39', '39', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '39'),
(40, '40', '40', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '40'),
(41, '41', '41', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '41'),
(42, '42', '42', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '42'),
(43, '43', '43', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '43'),
(44, '44', '44', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '44'),
(45, '45', '45', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '45'),
(46, '46', '46', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '46'),
(47, '47', '47', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '47'),
(48, '48', '48', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '48'),
(49, '49', '49', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '49'),
(50, '50', '50', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '50'),
(51, '51', '51', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '51'),
(52, '52', '52', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '52'),
(53, '53', '53', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '53'),
(54, '54', '54', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '54'),
(55, '55', '55', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '55'),
(56, '56', '56', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '56'),
(57, '57', '57', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '57'),
(58, '58', '58', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '58'),
(59, '59', '59', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '59'),
(60, '60', '60', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '60'),
(61, '61', '61', 'ALIEN-X', 'Fêmea', 0, NULL, 'sandenson', '61');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imgs`
--

CREATE TABLE `imgs` (
  `petId` int(11) DEFAULT NULL,
  `userPk` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`name`, `birthday`, `email`, `username`, `address`, `cpf`, `password`) VALUES
('LULINHA', '2021-01-28', 'llto1@aluno.ifal.edu.br', '@lucasluciot', 'o manuel', '12345678947', 'juju4'),
('Luis Gustavo França', '1616-12-16', 'emaildoburgo@gmail.com', 'burgovski', 'do lado da area verde', 'cpf dele', 'senhadogustavo'),
('Leonardo Oliveira Farias', '1212-12-12', 'soresidentevil@gmail.com', 'lof', 'casa do cacebes (campo alegre)', 'cpf do lalo', 'senhadoleo'),
('Lucas Lucio Teixeira de Oliveira', '1111-11-11', 'a@a', 'luquitas', 'perto da casa do sambes', 'cpf do lulo', 'senhadolucas'),
('Matheus Pereira Araújo', '1515-12-15', 'emaildomatheusinho@gmail.com', 'matheusoide', 'casa do matheusinho', 'cpf dele', 'senhadomatheus'),
('Mateus Pereira Bazilio', '1313-12-13', 'emaildobaciliamos@gmail.com', 'onion_knight', 'casa do baciliano ramos', 'cpf do brasili', 'senhadobazilio'),
('Manuel Eduardo Nascimento Antunes', '1414-12-14', 'manuno@gmail.com', 'peixonalta', 'do lado de um rio (traipu)', 'cpf do minuano', 'senhadomanuel'),
('Luiz Gabriel Correia Sandes', '2002-11-04', 'lgabrielsandes@gmail.com', 'sandenson', 'meu endereço', 'cpf do sandes', 'senhadosandes'),
('Brunno Martins Santos', '1717-12-17', 'emaildostanislilo@gmail.com', 'stanislav', 'casa do stanislilo', 'cpf dele', 'senhadobrunno'),
('Marcos Vinícius Nascimento de Melo', '2222-11-11', 'emaildomarcos@gmail.com', 'z1wolfmaster1', 'perto da casa do sambes', 'cpf do marcos', 'senhadomarcos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adoptedBy` (`adoptedBy`),
  ADD KEY `registeredBy` (`registeredBy`);

--
-- Índices para tabela `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`adoptedBy`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`registeredBy`) REFERENCES `users` (`username`);

--
-- Limitadores para a tabela `pets_imgs`
--
ALTER TABLE `imgs`
  ADD CONSTRAINT `imgs_ibfk_1` FOREIGN KEY (`petId`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `imgs_ibfk_2` FOREIGN KEY (`userPk`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
