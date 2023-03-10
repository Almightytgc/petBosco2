-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2023 a las 05:40:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petbosco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_veterinario` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `fecha`, `motivo`, `fk_cliente`, `fk_veterinario`, `fk_mascota`) VALUES
(12, '2023-03-14', 'El perro se encuentra con gripe', 12, 3, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `fechaNac` date NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `DUI` varchar(11) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `usuario`, `nombre`, `apellido`, `fechaNac`, `num_telefonico`, `direccion`, `DUI`, `contraseña`) VALUES
(12, 'pilin', 'Gustavo Ángel ', 'Diostío Najarro', '2004-04-14', '61621701', 'sierra morena', '00038406', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `Apodo_mascota` varchar(200) NOT NULL,
  `raza` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `Altura` varchar(200) NOT NULL,
  `condicionMascota` varchar(200) NOT NULL,
  `Peso` varchar(200) NOT NULL,
  `FechaNac` date NOT NULL,
  `especie` varchar(111) NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `Apodo_mascota`, `raza`, `color`, `Altura`, `condicionMascota`, `Peso`, `FechaNac`, `especie`, `fk_cliente`) VALUES
(31, 'Terry', 'Pitbull', 'Blanco', '55 cm', 'No', '15 libras', '2022-06-15', 'canino', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportemedico`
--

CREATE TABLE `reportemedico` (
  `id_reporteMedico` int(11) NOT NULL,
  `Tratamiento` varchar(200) NOT NULL,
  `Medicamento` varchar(200) NOT NULL,
  `ChequeoGeneral` varchar(200) NOT NULL,
  `fechaReporte` date NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportemedico`
--

INSERT INTO `reportemedico` (`id_reporteMedico`, `Tratamiento`, `Medicamento`, `ChequeoGeneral`, `fechaReporte`, `fk_cliente`) VALUES
(26, 'aaaaa', 'aaaaaaaa', 'aaaaaaaa', '2023-03-24', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id_veterinario` int(11) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `fechaNac` date NOT NULL,
  `Especialidad` varchar(200) NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id_veterinario`, `Nombres`, `Apellidos`, `usuario`, `fechaNac`, `Especialidad`, `num_telefonico`, `contraseña`) VALUES
(2, 'Alfredo Baltazar', 'Espinoza Juarez', 'afedoEspino', '2022-10-12', 'general', '123456', '12'),
(3, 'Víctor Alexander ', 'Guevara Campos', 'victer', '2000-03-23', 'Anestesiólogo', '54213698', 'victertilin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_cliente` (`fk_cliente`,`fk_veterinario`,`fk_mascota`),
  ADD KEY `fk_mascota` (`fk_mascota`),
  ADD KEY `fk_veterinario` (`fk_veterinario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD PRIMARY KEY (`id_reporteMedico`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  MODIFY `id_reporteMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD CONSTRAINT `reportemedico_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
