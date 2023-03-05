-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-03-2023 a las 13:11:09
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

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
  `id_cita` int NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fk_cliente` int NOT NULL,
  `fk_veterinario` int NOT NULL,
  `fk_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `fechaNac` date NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `DUI` varchar(11) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `typeUser` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `usuario`, `nombre`, `apellido`, `fechaNac`, `num_telefonico`, `direccion`, `DUI`, `contraseña`, `typerUser`) VALUES
(3, 'fenix123', 'jun', 'lopez', '2023-03-01', '123', 'su casa', '123', '12', 0),
(4, '', 'Juancho José', 'Hernández Castro', '2023-03-08', '61621701', 'su casa ', '123456', '123', 0),
(5, '', 'Estefany Liseth ', 'Villafranco Silva', '2023-03-22', '61621701', 'su casa', '123', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int NOT NULL,
  `Apodo_mascota` varchar(200) NOT NULL,
  `raza` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `Altura` varchar(200) NOT NULL,
  `condicionMascota` varchar(200) NOT NULL,
  `Peso` varchar(200) NOT NULL,
  `FechaNac` date NOT NULL,
  `especie` varchar(111) NOT NULL,
  `fk_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `IDpago` int NOT NULL,
  `montoTotal` decimal(3,2) NOT NULL,
  `fecha` date NOT NULL,
  `fk_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportemedico`
--

CREATE TABLE `reportemedico` (
  `id_reporteMedico` int NOT NULL,
  `Tratamiento` varchar(200) NOT NULL,
  `Medicamento` varchar(200) NOT NULL,
  `ChequeoGeneral` varchar(200) NOT NULL,
  `fechaReporte` date NOT NULL,
  `fk_cliente` int NOT NULL,
  `fk_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportemedico`
--

INSERT INTO `reportemedico` (`id_reporteMedico`, `Tratamiento`, `Medicamento`, `ChequeoGeneral`, `fechaReporte`, `fk_cliente`, `fk_mascota`) VALUES
(11, 'durante 5 días', 'gripol', 'La mascota viene por gripe', '2023-03-22', 3, 3),
(12, 'durante una semana', 'pulgol', 'El gato viene por exceso de pulgas ', '2023-03-30', 3, 3),
(13, 'durante un mes ', 'fracturin', 'El hamster se fracturó una pierna', '2023-03-29', 3, 3),
(14, 'durante 5 días', 'Acetaminofen', 'El cocodrilo siente dolor de estomago', '2023-03-20', 3, 3),
(15, 'durante 2 días', 'sopa de loro', 'El loro no puede hablar', '2023-04-06', 3, 3),
(17, 'durante 6 meses', 'corazol', 'El gato terminó una relación amorosa', '2023-03-30', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id_veterinario` int NOT NULL,
  `fechaNac` date NOT NULL,
  `Especialidad` varchar(200) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `Constraseña` varchar(30) NOT NULL,
  `typeUser` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IDpago` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  MODIFY `id_reporteMedico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD CONSTRAINT `reportemedico_ibfk_1` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`),
  ADD CONSTRAINT `reportemedico_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
