-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2018 a las 21:41:19
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pse`
--
CREATE DATABASE IF NOT EXISTS `pse` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `pse`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `bankCode` varchar(255) COLLATE utf8_bin NOT NULL,
  `bankInterface` varchar(255) COLLATE utf8_bin NOT NULL,
  `returnURL` varchar(255) COLLATE utf8_bin NOT NULL,
  `reference` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `language` varchar(255) COLLATE utf8_bin NOT NULL,
  `currency` varchar(255) COLLATE utf8_bin NOT NULL,
  `totalAmount` varchar(255) COLLATE utf8_bin NOT NULL,
  `taxAmoun` varchar(255) COLLATE utf8_bin NOT NULL,
  `devolutionBase` varchar(255) COLLATE utf8_bin NOT NULL,
  `tipAmount` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `userAgent` text COLLATE utf8_bin NOT NULL,
  `additionalData` varchar(255) COLLATE utf8_bin NOT NULL,
  `returnCode` varchar(255) COLLATE utf8_bin NOT NULL,
  `trazabilityCode` varchar(255) COLLATE utf8_bin NOT NULL,
  `transactionCycle` int(11) NOT NULL,
  `transactionID` varchar(255) COLLATE utf8_bin NOT NULL,
  `sessionID` varchar(255) COLLATE utf8_bin NOT NULL,
  `responseCode` int(11) NOT NULL,
  `responseReasonText` varchar(255) COLLATE utf8_bin NOT NULL,
  `bankProcessDate` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `requestDate` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `bankCode`, `bankInterface`, `returnURL`, `reference`, `description`, `language`, `currency`, `totalAmount`, `taxAmoun`, `devolutionBase`, `tipAmount`, `user_id`, `ipAddress`, `userAgent`, `additionalData`, `returnCode`, `trazabilityCode`, `transactionCycle`, `transactionID`, `sessionID`, `responseCode`, `responseReasonText`, `bankProcessDate`, `requestDate`) VALUES
(1, '1022', '0', 'http://localhost/payments/payments/terminate/cefca51aa98232bb0a6dc000f1d27e29', 'cefca51aa98232bb0a6dc000f1d27e29', 'Pago de productos electrónicos', 'ES', 'COP', '100000', '', '0', '0', 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '', 'SUCCESS', '1410912', 5, '1456795602', 'bc8b11f267971a519c051887bfa88d98', 1, 'Aprobada', '2018-04-09T21:28:36-05:00', '2018-04-09T21:28:00-05:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `documentType` varchar(255) COLLATE utf8_bin NOT NULL,
  `document` varchar(255) COLLATE utf8_bin NOT NULL,
  `firstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `company` varchar(255) COLLATE utf8_bin NOT NULL,
  `emailAddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `country` varchar(255) COLLATE utf8_bin NOT NULL,
  `province` varchar(255) COLLATE utf8_bin NOT NULL,
  `city` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `documentType`, `document`, `firstName`, `lastName`, `company`, `emailAddress`, `country`, `province`, `city`, `phone`, `mobile`, `created`, `modified`) VALUES
(7, 'CC', '1020462279', 'Jhonatan ', 'Suarez', 'Hola', 'jotsuar@gmail.com', 'CO', 'Antioquia', 'Medellín', '3136429175', '3136429175', '2018-04-09 21:28:00', '2018-04-09 21:28:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
