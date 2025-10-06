-- Base de datos: blog
CREATE DATABASE IF NOT EXISTS `blog` 
  DEFAULT CHARACTER SET utf8mb4 
  COLLATE utf8mb4_general_ci;
USE `blog`;

-- Tabla de artículos
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla de usuarios
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos de ejemplo para usuarios
INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee'),
(2, 'manolete', 'manolete@gmail.com', '12cdb9b24211557ef1802bf5a875fd2c'),
(3, 'pepe', 'pepe@gmail.com', '926e27eecdbc7a18858b3798ba99bddd');
