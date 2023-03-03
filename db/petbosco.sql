-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2023 a las 18:01:03
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `fechaNac` date NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `DUI` varchar(11) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `fechaNac`, `num_telefonico`, `direccion`, `DUI`, `contraseña`) VALUES
(3, 'jun', 'lopez', '2023-03-01', '123', 'su casa', '123', '12');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `Apodo_mascota`, `raza`, `color`, `Altura`, `condicionMascota`, `Peso`, `FechaNac`, `especie`, `fk_cliente`) VALUES
(3, 'popi', 'doberman', 'rojo', '120', 'es bien feo ', '20 libras', '2023-03-01', 'canina ', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDpago` int(11) NOT NULL,
  `montoTotal` decimal(3,2) NOT NULL,
  `fecha` date NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `fk_cliente` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reportemedico`
--

INSERT INTO `reportemedico` (`id_reporteMedico`, `Tratamiento`, `Medicamento`, `ChequeoGeneral`, `fechaReporte`, `fk_cliente`, `fk_mascota`) VALUES
(5, 'sdfsdf', 'sdfsdf', 'sdafsdf', '2023-03-21', 3, 3),
(7, '2 veces al dia', 'cocaina', 'aristides', '2023-03-09', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id_veterinario` int(11) NOT NULL,
  `fechaNac` date NOT NULL,
  `Especialidad` varchar(200) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `Constraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDpago`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD PRIMARY KEY (`id_reporteMedico`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_mascota` (`fk_mascota`);

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
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IDpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  MODIFY `id_reporteMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `reportemedico_ibfk_1` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reportemedico_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
