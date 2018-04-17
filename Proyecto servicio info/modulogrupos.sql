-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2018 a las 22:53:33
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modulogrupos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `name`) VALUES
(1, 'Facultad de Telemática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrerarea`
--

CREATE TABLE `carrerarea` (
  `id` int(11) NOT NULL,
  `plan` varchar(15) NOT NULL,
  `name` int(50) NOT NULL,
  `idCampus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coursesteachers`
--

CREATE TABLE `coursesteachers` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCourse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `group` varchar(2) NOT NULL,
  `generation` varchar(20) NOT NULL,
  `periods` int(11) NOT NULL,
  `idCarrerArea` int(11) NOT NULL,
  `isOficial` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lows`
--

CREATE TABLE `lows` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `studentsName` varchar(60) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `type` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `type`) VALUES
(1, 'master'),
(2, 'administrador'),
(3, 'coordinador'),
(4, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusers`
--

CREATE TABLE `rolusers` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `accountNumber` varchar(8) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `secondLastName` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `idTypeStudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `studentsgroup`
--

CREATE TABLE `studentsgroup` (
  `id` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `accountNumber` varchar(8) NOT NULL,
  `names` varchar(40) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `secondLastName` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `idCampus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `accountNumber`, `names`, `lastName`, `secondLastName`, `email`, `idCampus`) VALUES
(2, '20145969', 'Brandon Alejandro', 'Mosqueda', 'González', 'bmosuqueda@ucol.mx', 1),
(3, '20137417', 'Empanado', 'Rolón', 'Castellanos', 'hrolon@ucol.mx', 1),
(4, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(5, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(6, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(7, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(8, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(9, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(10, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(11, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(12, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(13, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(14, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(15, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(16, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(17, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(18, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(19, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(20, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1),
(21, '20136520', 'Rebeca Noelia', 'Flores', 'Urtiz', 'rflores@ucol.mx', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrerarea`
--
ALTER TABLE `carrerarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCampus` (`idCampus`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGroup` (`idGroup`);

--
-- Indices de la tabla `coursesteachers`
--
ALTER TABLE `coursesteachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCourse` (`idCourse`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCarrerArea` (`idCarrerArea`);

--
-- Indices de la tabla `lows`
--
ALTER TABLE `lows`
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rolusers`
--
ALTER TABLE `rolusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUser`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `studentsgroup`
--
ALTER TABLE `studentsgroup`
  ADD KEY `idGroup` (`idGroup`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCampus` (`idCampus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrerarea`
--
ALTER TABLE `carrerarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coursesteachers`
--
ALTER TABLE `coursesteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rolusers`
--
ALTER TABLE `rolusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrerarea`
--
ALTER TABLE `carrerarea`
  ADD CONSTRAINT `carrerarea_ibfk_1` FOREIGN KEY (`idCampus`) REFERENCES `campus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `coursesteachers`
--
ALTER TABLE `coursesteachers`
  ADD CONSTRAINT `coursesteachers_ibfk_1` FOREIGN KEY (`idCourse`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursesteachers_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`idCarrerArea`) REFERENCES `carrerarea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lows`
--
ALTER TABLE `lows`
  ADD CONSTRAINT `lows_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rolusers`
--
ALTER TABLE `rolusers`
  ADD CONSTRAINT `rolusers_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rolusers_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `studentsgroup`
--
ALTER TABLE `studentsgroup`
  ADD CONSTRAINT `studentsgroup_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentsgroup_ibfk_2` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idCampus`) REFERENCES `campus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
