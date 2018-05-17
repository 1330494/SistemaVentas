-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2015 a las 18:03:49
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica7`
--
CREATE DATABASE practica7;

USE practica7;

-- --------------------------------------------------------

--
-- Estructura para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `folio` int(11) PRIMARY KEY AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `monto` double NOT NULL, 
  `descripcion` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura para la tabla `Productos`
--

CREATE TABLE `productos` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(512),
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `user_name`, `password`, `email`) VALUES
('Luis Enrique','Gomez Cordova', 'luis', 'LuisGo93', 'luis@correo.com.mx'),
('Maria','Hernandez Lopez', 'maria', 'mhernandezl', 'maria@correo.com.mx'),
('Johana Yasmin','Garcia Roque', 'yoana', 'rocke', 'yoana@correo.com.mx'),
('Francisco','Juarez Castro', 'Black_Boy', 'deepers', 'frank@correo.com.mx');

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`fecha`,`monto`,`descripcion`) VALUES
('2017/01/15',150.00,'3,Detergente Vive 1 Lt.,50.0'),
('2018/05/27', 33.90,'1,Crema corporal Hinds,33.9');

--
-- Volcado de datos para la tabla `user_logs`
--

INSERT INTO `productos` (`nombre`,`descripcion`,`precio`) VALUES
('Crema Ponds','Crema Corporal Ponds',28.90),
('Aceite Capullo','1 Lt. Aceite Capullo',38.4),
('Leche Lala','1 Lt. de Leche Entera Pasteurizada',13.50),
('Papas Nat. Sabritas','Papas Naturales Sabritas 80gr.',11.50);

-- --------------------------------------------------------
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
