-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.19-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6284
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela livrosdb.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_livro` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `nome` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `autor` varchar(150) COLLATE utf8mb4_bin DEFAULT NULL,
  `paginas` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `imagem` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_inicio_leitura` date DEFAULT NULL,
  `data_fim_leitura` date DEFAULT NULL,
  `avaliacao` int(1) DEFAULT NULL,
  `resenha` text COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`cod_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela livrosdb.livros: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` (`id`, `cod_livro`, `nome`, `autor`, `paginas`, `imagem`, `data_inicio_leitura`, `data_fim_leitura`, `avaliacao`, `resenha`) VALUES
	(1, '-bF2CwAAQBAJ', 'Harry Potter: A Coleção Completa (1-7)', 'J.K. Rowling', '3326', 'http://books.google.com/books/content?id=-bF2CwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2022-05-02', NULL, 5, 'teste'),
	(7, '9TcQCwAAQBAJ', 'Harry Potter e a Ordem da Fênix', 'J.K. Rowling', '703', 'http://books.google.com/books/content?id=9TcQCwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2022-05-12', NULL, 5, NULL),
	(8, '_weKkH2lkZMC', 'Google Cheat', 'Não Informado', 'Não Informado', 'http://books.google.com/books/content?id=_weKkH2lkZMC&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2022-05-11', '2022-05-12', 3, 'Teste Observacao'),
	(9, '6zX3BwAAQBAJ', 'Database and Expert Systems Applications', 'Kim V. Andersen, John Debenham, Roland Wagner', '955', 'http://books.google.com/books/content?id=6zX3BwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2022-05-05', NULL, 5, 'sadsad'),
	(10, 'fkVICgAAQBAJ', 'The Network Security Test Lab', 'Michael Gregg', '480', 'http://books.google.com/books/content?id=fkVICgAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api', '2022-05-17', NULL, 5, NULL);
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
