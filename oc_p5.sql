-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.14 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5151
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour oc_p5
CREATE DATABASE IF NOT EXISTS `oc_p5` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `oc_p5`;

-- Export de la structure de la table oc_p5. blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `chapo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Export de données de la table oc_p5.blog : ~4 rows (environ)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `titre`, `contenu`, `auteur`, `date`, `chapo`) VALUES
	(5, 'Nouveau blog', 'Bonjour, j\'ai l\'honneur de vous présenter mon nouveau blog, j\'espère qu\'il vous plaira.', 'Loic', '2017-04-12 09:36:06', 'Présentation nouveau blog.'),
	(6, 'Article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis suscipit erat. Maecenas dapibus felis non imperdiet mollis. Maecenas blandit odio eu bibendum porta. In hendrerit nulla vel condimentum viverra. Praesent id imperdiet ipsum. Sed nunc odio, euismod nec turpis eu, condimentum cursus mauris. Sed id elementum augue. Curabitur molestie risus sit amet libero euismod luctus ac ac urna. Aenean sodales, ipsum eget vehicula feugiat, urna ligula congue diam, nec faucibus orci diam eu arcu. Morbi laoreet et enim nec bibendum. Sed faucibus, risus vel facilisis egestas, urna neque venenatis ante, ut ultrices lectus velit ac leo. Integer lacinia ultrices diam at lobortis. Etiam suscipit nisi in sodales sollicitudin. Duis suscipit est mauris, non hendrerit urna rhoncus et. Proin vitae justo enim.', 'Loic', '2017-04-12 09:35:12', 'Essai nouvel article'),
	(8, 'Article 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean mollis suscipit erat. Maecenas dapibus felis non imperdiet mollis. Maecenas blandit odio eu bibendum porta. In hendrerit nulla vel condimentum viverra. Praesent id imperdiet ipsum. Sed nunc odio, euismod nec turpis eu, condimentum cursus mauris. Sed id elementum augue. Curabitur molestie risus sit amet libero euismod luctus ac ac urna. Aenean sodales, ipsum eget vehicula feugiat, urna ligula congue diam, nec faucibus orci diam eu arcu. Morbi laoreet et enim nec bibendum. Sed faucibus, risus vel facilisis egestas, urna neque venenatis ante, ut ultrices lectus velit ac leo. Integer lacinia ultrices diam at lobortis. Etiam suscipit nisi in sodales sollicitudin. Duis suscipit est mauris, non hendrerit urna rhoncus et. Proin vitae justo enim.', 'Loic', '2017-04-12 09:41:14', ''),
	(9, 'Essai Post', 'Decsription Longue', 'Loic', '2017-04-21 09:08:26', 'Desc Courte');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
