SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS 'utilisateurs'
CREATE TABLE IF NOT EXISTS 'utilisateurs' (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

DROP TABLE IF EXISTS 'Books'
CREATE TABLE IF NOT EXISTS 'Books' (
    'id' int(11) NOT NULL AUTO_INCREMENT,
    'Name'varchar(100),
    'isbn'int(13),
    'Author'varchar(100),
    'Date' datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    'Disponibility'int(2),
    'statut' varchar(2),
    'IsActive' boolean,
    'IsDeleted' boolean,
    'CreatedUser' int(11),
    'ModifiedUser' int(11),
    'CreatedDate' datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    'ModifiedDate' datetime,
    PRIMARY KEY('id')
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;