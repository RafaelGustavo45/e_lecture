-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           12.1.2-MariaDB - MariaDB Server
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para marca_pagina_individual
CREATE DATABASE IF NOT EXISTS `marca_pagina_individual` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci */;
USE `marca_pagina_individual`;

-- Copiando estrutura para tabela marca_pagina_individual.andamento
CREATE TABLE IF NOT EXISTS `andamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_livro_fk` int(11) NOT NULL,
  `pagina_atual` int(11) NOT NULL DEFAULT 0,
  `data_criacao` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_livro_fk` (`id_livro_fk`),
  CONSTRAINT `1` FOREIGN KEY (`id_livro_fk`) REFERENCES `estante` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela marca_pagina_individual.estante
CREATE TABLE IF NOT EXISTS `estante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(255) NOT NULL,
  `paginas_totais` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
