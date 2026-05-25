-- Base SQL para cursos académicos
CREATE DATABASE IF NOT EXISTS `cursos_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cursos_db`;

CREATE TABLE IF NOT EXISTS `docentes` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `curso` VARCHAR(255) NOT NULL,
  `docente_id` INT UNSIGNED NOT NULL,
  `creditos` INT NOT NULL DEFAULT 0,
  FOREIGN KEY (`docente_id`) REFERENCES `docentes`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT IGNORE INTO `docentes` (`nombre`) VALUES
  ('Ana Martínez'),
  ('Nicolas Espinosa'),
  ('Tania Ximena'),
  ('Juan Sarmiento'),
  ('Carlos Pérez'),
  ('Lucía Gómez');

