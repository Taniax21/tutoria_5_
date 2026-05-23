-- Base SQL para inventario de productos
CREATE DATABASE IF NOT EXISTS `inventario_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventario_db`;

CREATE TABLE IF NOT EXISTS `productos` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(255) NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `cantidad` INT NOT NULL DEFAULT 0
);
