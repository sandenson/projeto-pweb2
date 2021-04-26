-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Abr-2021 às 22:49
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_pweb_sbll`
--

-- --------------------------------------------------------

DROP DATABASE `projeto_pweb_sbll`;
CREATE DATABASE `projeto_pweb_sbll`;
USE `projeto_pweb_sbll`;

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `is_adopted` tinyint(1) NOT NULL DEFAULT 0,
  `adopted_by` int(11) DEFAULT NULL,
  `adopted_at` date DEFAULT NULL,
  `registered_by` int(11) NOT NULL,
  `adoption_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`id`, `name`, `description`, `type`, `sex`, `is_adopted`, `adopted_by`, `adopted_at`, `registered_by`, `adoption_location`) VALUES
(1, 'giovanni giorgio', 'his name is', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, 'florença, itália'),
(2, '2', '2', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, 'silverstone circuit'),
(3, '3', '3', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, 'times square, nova iorque'),
(4, '4', '4', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, 'empire state building'),
(5, '5', '5', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, 'don quijote, dotonbori, osaka, japao'),
(6, '6', '6', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, '6'),
(7, '7', '7', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, '7'),
(8, '8', '8', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, '8'),
(9, '9', '9', 'Cachorro', 'Fêmea', 0, NULL, NULL, 8, '9'),
(10, '10', '10', 'Cacatua', 'Fêmea', 0, NULL, NULL, 8, '10'),
(11, '11', '11', 'Cacatua', 'Fêmea', 0, NULL, NULL, 8, '11'),
(12, '12', '12', 'Cacatua', 'Fêmea', 0, NULL, NULL, 8, '12'),
(13, '13', '13', 'Cacatua', 'Fêmea', 0, NULL, NULL, 8, '13'),
(14, '14', '14', 'Cacatua', 'Fêmea', 0, NULL, NULL, 8, '14'),
(15, '15', '15', 'Marcos', 'Fêmea', 0, NULL, NULL, 8, '15'),
(16, '16', '16', 'Marcos', 'Fêmea', 0, NULL, NULL, 8, '16'),
(17, '17', '17', 'Marcos', 'Fêmea', 0, NULL, NULL, 8, '17'),
(18, '18', '18', 'Marcos', 'Fêmea', 0, NULL, NULL, 8, '18'),
(19, '19', '19', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '19'),
(20, '20', '20', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '20'),
(21, '21', '21', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '21'),
(23, '23', '23', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '23'),
(24, '24', '24', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '24'),
(25, '25', '25', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '25'),
(26, '26', '26', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '26'),
(27, '27', '27', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '27'),
(28, '28', '28', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '28'),
(29, '29', '29', 'BONORO', 'Fêmea', 0, NULL, NULL, 8, '29'),
(30, '30', '30', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '30'),
(31, '31', '31', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '31'),
(32, '32', '32', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '32'),
(33, '33', '33', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '33'),
(34, '34', '34', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '34'),
(35, '35', '35', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '35'),
(36, '36', '36', 'Ford Pinto', 'Fêmea', 0, NULL, NULL, 8, '36'),
(37, '37', '37', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '37'),
(38, '38', '38', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '38'),
(39, '39', '39', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '39'),
(40, '40', '40', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '40'),
(41, '41', '41', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '41'),
(42, '42', '42', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '42'),
(43, '43', '43', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '43'),
(44, '44', '44', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '44'),
(45, '45', '45', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '45'),
(46, '46', '46', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '46'),
(47, '47', '47', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '47'),
(48, '48', '48', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '48'),
(49, '49', '49', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '49'),
(50, '50', '50', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '50'),
(51, '51', '51', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '51'),
(52, '52', '52', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '52'),
(53, '53', '53', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '53'),
(54, '54', '54', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '54'),
(55, '55', '55', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '55'),
(56, '56', '56', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '56'),
(57, '57', '57', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '57'),
(58, '58', '58', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '58'),
(59, '59', '59', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '59'),
(60, '60', '60', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '60'),
(61, '61', '61', 'ALIEN-X', 'Fêmea', 0, NULL, NULL, 8, '61');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet_images`
--

CREATE TABLE `pet_images` (
  `image_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `birthday`, `email`, `username`, `address`, `cpf`, `password`) VALUES
(1, 'LULINHA', '2021-01-28', 'llto1@aluno.ifal.edu.br', '@lucasluciot', 'o manuel', '12345678947', 'juju4'),
(2, 'Luis Gustavo França', '1616-12-16', 'emaildoburgo@gmail.com', 'burgovski', 'do lado da area verde', 'cpf dele', 'senhadogustavo'),
(3, 'Leonardo Oliveira Farias', '1212-12-12', 'soresidentevil@gmail.com', 'lof', 'casa do cacebes (campo alegre)', 'cpf do lalo', 'senhadoleo'),
(4, 'Lucas Lucio Teixeira de Oliveira', '1111-11-11', 'a@a', 'luquitas', 'perto da casa do sambes', 'cpf do lulo', 'senhadolucas'),
(5, 'Matheus Pereira Araújo', '1515-12-15', 'emaildomatheusinho@gmail.com', 'matheusoide', 'casa do matheusinho', 'cpf dele', 'senhadomatheus'),
(6, 'Mateus Pereira Bazilio', '1313-12-13', 'emaildobaciliamos@gmail.com', 'onion_knight', 'casa do baciliano ramos', 'cpf do brasili', 'senhadobazilio'),
(7, 'Manuel Eduardo Nascimento Antunes', '1414-12-14', 'manuno@gmail.com', 'peixonalta', 'do lado de um rio (traipu)', 'cpf do minuano', 'senhadomanuel'),
(8, 'Luiz Gabriel Correia Sandes', '2002-11-04', 'lgabrielsandes@gmail.com', 'sandenson', 'meu endereço', 'cpf do sandes', 'senhadosandes'),
(9, 'Brunno Martins Santos', '1717-12-17', 'emaildostanislilo@gmail.com', 'stanislav', 'casa do stanislilo', 'cpf dele', 'senhadobrunno'),
(10, 'Marcos Vinícius Nascimento de Melo', '2222-11-11', 'emaildomarcos@gmail.com', 'z1wolfmaster1', 'perto da casa do sambes', 'cpf do marcos', 'senhadomarcos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_images`
--

CREATE TABLE `user_images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pet_images`
--
ALTER TABLE `pet_images`
  ADD KEY `image_id` (`image_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_images`
--
ALTER TABLE `user_images`
  ADD KEY `image_id` (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pet_images`
--
ALTER TABLE `pet_images`
  ADD CONSTRAINT `image_id_fk` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pet_id_fk` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `user_images`
--
ALTER TABLE `user_images`
  ADD CONSTRAINT `image2_id_fk` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
