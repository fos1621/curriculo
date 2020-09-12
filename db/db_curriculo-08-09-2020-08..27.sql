-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Set-2020 às 13:27
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_curriculo`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_endereco` (IN `plogradouro_endereco` VARCHAR(60), IN `pcomplemento` VARCHAR(100), IN `pcidade_endereco` VARCHAR(45), IN `pestado_endereco` VARCHAR(45), IN `pcep_endereco` CHAR(8), IN `vid_pessoa` INT, IN `pbairro_endereco` VARCHAR(45), IN `pnumero_endereco` CHAR(8))  NO SQL
BEGIN

INSERT INTO tb_endereco (logradouro_endereco, complemento, cidade_endereco, estado_endereco, cep_endereco, id_pessoa, bairro_endereco, numero_endereco) VALUES (plogradouro_endereco, pcomplemento, pcidade_endereco, pestado_endereco, pcep_endereco, vid_pessoa, pbairro_endereco, pnumero_endereco);

SELECT * FROM tb_endereco WHERE id_endereco = LAST_INSERT_ID(); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_pessoa` (IN `pnomepessoa` VARCHAR(65), IN `psobrenomepessoa` VARCHAR(65), IN `psexopessoa` CHAR(1), IN `pdatanascimentopessoa` DATE, IN `vid_usuario` INT)  NO SQL
BEGIN
    
    INSERT INTO tb_pessoa (id_pessoa, nomepessoa, sobrenomepessoa, sexopessoa, datanascimentopessoa, id_usuario) VALUES (vid_usuario, pnomepessoa, psobrenomepessoa, psexopessoa, pdatanascimentopessoa, vid_usuario);
    
    SELECT * FROM tb_pessoa WHERE id_pessoa = vid_usuario;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_usuario` (IN `pemailusuario` VARCHAR(60), IN `psenhausuario` VARCHAR(60), IN `pinadmin` INT, IN `pinhabilitado` INT, IN `pnomeusuario` VARCHAR(70))  NO SQL
BEGIN
    
    INSERT INTO tb_user (emailusuario, senhausuario, inadmin, inhabilitado, nomeusuario) VALUES (pemailusuario, psenhausuario, pinadmin, pinhabilitado, pnomeusuario);
    
    SELECT * FROM tb_user  WHERE id_usuario = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_up_endereco` (IN `plogradouro_endereco` VARCHAR(60), IN `pcomplemento` VARCHAR(100), IN `pcidade_endereco` VARCHAR(45), IN `pestado_endereco` VARCHAR(45), IN `pcep_endereco` CHAR(8), IN `vid_pessoa` INT, IN `pbairro_endereco` VARCHAR(45), IN `pnumero_endereco` CHAR(8))  NO SQL
BEGIN

UPDATE tb_endereco set logradouro_endereco = plogradouro_endereco, complemento = pcomplemento, cidade_endereco = pcidade_endereco, estado_endereco = pestado_endereco, cep_endereco = pcep_endereco, id_pessoa = vid_pessoa, bairro_endereco = pbairro_endereco, numero_endereco = pnumero_endereco WHERE id_pessoa = vid_pessoa;

SELECT * FROM tb_endereco WHERE id_pessoa = vid_pessoa; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_up_pessoa` (IN `pnomepessoa` VARCHAR(65), IN `psobrenomepessoa` VARCHAR(65), IN `psexopessoa` CHAR(1), IN `pdatanascimentopessoa` DATE, IN `vid_usuario` INT)  NO SQL
BEGIN
    
    UPDATE tb_pessoa set nomepessoa = pnomepessoa, sobrenomepessoa = 			psobrenomepessoa, sexopessoa = psexopessoa, datanascimentopessoa = 			pdatanascimentopessoa WHERE id_usuario = vid_usuario;
    
    SELECT * FROM tb_pessoa WHERE id_usuario = vid_usuario;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos_adicionais`
--

CREATE TABLE `tb_cursos_adicionais` (
  `id_cursos_adicionais` int(11) NOT NULL,
  `dt_cadastro_cursos_adicionais` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao_cursos_adicionais` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `titulo_cursos_adicionais` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro_endereco` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `complemento` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cidade_endereco` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `estado_endereco` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `cep_endereco` char(8) COLLATE utf8_swedish_ci NOT NULL,
  `dt_cadastro_endereco` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pessoa` int(11) NOT NULL,
  `bairro_endereco` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `numero_endereco` char(8) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco`, `logradouro_endereco`, `complemento`, `cidade_endereco`, `estado_endereco`, `cep_endereco`, `dt_cadastro_endereco`, `id_pessoa`, `bairro_endereco`, `numero_endereco`) VALUES
(15, 'Rua Jaspe', 'Casa 3', 'Osasco', 'SP', '06280210', '2020-09-05 02:59:58', 2, 'Mutinga', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_experiencias`
--

CREATE TABLE `tb_experiencias` (
  `id_experiencias` int(11) NOT NULL,
  `dt_cadastro_experiencias` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `empresa_experiencias` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `cargo_experiencias` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `inicio_experiencias` date NOT NULL,
  `fim_experiencias` date DEFAULT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fone`
--

CREATE TABLE `tb_fone` (
  `id_fone` int(11) NOT NULL,
  `ddd_fone` char(2) COLLATE utf8_swedish_ci NOT NULL,
  `numero_fone` char(9) COLLATE utf8_swedish_ci NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `dt_cadastro_fone` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_formacao_academica`
--

CREATE TABLE `tb_formacao_academica` (
  `id_formacao_academica` int(11) NOT NULL,
  `dt_cadastro_formacao_academica` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formacao_academica` mediumblob NOT NULL,
  `mes_formacao_academica` char(2) COLLATE utf8_swedish_ci NOT NULL,
  `ano_formacao_academica` char(4) COLLATE utf8_swedish_ci NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_habilidades`
--

CREATE TABLE `tb_habilidades` (
  `id_habilidades` int(11) NOT NULL,
  `dt_cadastro_habilidades` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `habilidades` varchar(500) COLLATE utf8_swedish_ci NOT NULL,
  `tb_habilidadescol` mediumblob NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nascionalidade`
--

CREATE TABLE `tb_nascionalidade` (
  `id_nascionalidade` int(11) NOT NULL,
  `nascionalidade` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `dt_cadastro_nascionalidade` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_objetivo`
--

CREATE TABLE `tb_objetivo` (
  `id_objetivo` int(11) NOT NULL,
  `dt_cadastro_objetivo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao_objetivo` mediumblob,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nomepessoa` varchar(65) COLLATE utf8_swedish_ci NOT NULL,
  `sobrenomepessoa` varchar(65) COLLATE utf8_swedish_ci NOT NULL,
  `sexopessoa` char(1) COLLATE utf8_swedish_ci NOT NULL,
  `datanascimentopessoa` date NOT NULL,
  `dt_cadastro_pessoa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`id_pessoa`, `nomepessoa`, `sobrenomepessoa`, `sexopessoa`, `datanascimentopessoa`, `dt_cadastro_pessoa`, `id_usuario`) VALUES
(2, 'Filipe', 'Santos', 'M', '1998-08-19', '2020-09-04 01:26:55', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_usuario` int(11) NOT NULL,
  `emailusuario` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `senhausuario` char(60) COLLATE utf8_swedish_ci NOT NULL,
  `dt_cadastro_usuario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inadmin` int(11) NOT NULL,
  `inhabilitado` int(11) NOT NULL,
  `nomeusuario` varchar(70) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_usuario`, `emailusuario`, `senhausuario`, `dt_cadastro_usuario`, `inadmin`, `inhabilitado`, `nomeusuario`) VALUES
(2, 'fos@gmail.com', '$2y$12$PM6Jx7YCQ2pLzZK3ke.HsO.1tqzm7yBf5U0krabVH0/09qjCOuTNi', '2020-09-03 21:56:52', 0, 1, 'fos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cursos_adicionais`
--
ALTER TABLE `tb_cursos_adicionais`
  ADD PRIMARY KEY (`id_cursos_adicionais`),
  ADD KEY `fk_tb_cursos_adicionais_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_tb_endereco_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_experiencias`
--
ALTER TABLE `tb_experiencias`
  ADD PRIMARY KEY (`id_experiencias`),
  ADD KEY `fk_tb_experiencias_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_fone`
--
ALTER TABLE `tb_fone`
  ADD PRIMARY KEY (`id_fone`),
  ADD KEY `fk_tb_fone_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_formacao_academica`
--
ALTER TABLE `tb_formacao_academica`
  ADD PRIMARY KEY (`id_formacao_academica`),
  ADD KEY `fk_tb_formacao_academica_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_habilidades`
--
ALTER TABLE `tb_habilidades`
  ADD PRIMARY KEY (`id_habilidades`),
  ADD KEY `fk_tb_habilidades_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_nascionalidade`
--
ALTER TABLE `tb_nascionalidade`
  ADD PRIMARY KEY (`id_nascionalidade`),
  ADD KEY `fk_tb_nascionalidade_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_objetivo`
--
ALTER TABLE `tb_objetivo`
  ADD PRIMARY KEY (`id_objetivo`),
  ADD KEY `fk_tb_objetivo_tb_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cursos_adicionais`
--
ALTER TABLE `tb_cursos_adicionais`
  MODIFY `id_cursos_adicionais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_experiencias`
--
ALTER TABLE `tb_experiencias`
  MODIFY `id_experiencias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_fone`
--
ALTER TABLE `tb_fone`
  MODIFY `id_fone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_formacao_academica`
--
ALTER TABLE `tb_formacao_academica`
  MODIFY `id_formacao_academica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_habilidades`
--
ALTER TABLE `tb_habilidades`
  MODIFY `id_habilidades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nascionalidade`
--
ALTER TABLE `tb_nascionalidade`
  MODIFY `id_nascionalidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_objetivo`
--
ALTER TABLE `tb_objetivo`
  MODIFY `id_objetivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_cursos_adicionais`
--
ALTER TABLE `tb_cursos_adicionais`
  ADD CONSTRAINT `fk_tb_cursos_adicionais_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_tb_endereco_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_experiencias`
--
ALTER TABLE `tb_experiencias`
  ADD CONSTRAINT `fk_tb_experiencias_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_fone`
--
ALTER TABLE `tb_fone`
  ADD CONSTRAINT `fk_tb_fone_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_formacao_academica`
--
ALTER TABLE `tb_formacao_academica`
  ADD CONSTRAINT `fk_tb_formacao_academica_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_habilidades`
--
ALTER TABLE `tb_habilidades`
  ADD CONSTRAINT `fk_tb_habilidades_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_nascionalidade`
--
ALTER TABLE `tb_nascionalidade`
  ADD CONSTRAINT `fk_tb_nascionalidade_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_objetivo`
--
ALTER TABLE `tb_objetivo`
  ADD CONSTRAINT `fk_tb_objetivo_tb_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_user` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
