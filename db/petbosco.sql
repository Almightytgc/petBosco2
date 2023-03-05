-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2023 a las 04:17:07
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
(3, 'fenix123', 'jun', 'lopez', '2023-03-01', '123', 'su casa', '123', '12'),
(4, '', 'Juancho José', 'Hernández Castro', '2023-03-08', '61621701', 'su casa ', '123456', '123'),
(5, '', 'Estefany Liseth ', 'Villafranco Silva', '2023-03-22', '61621701', 'su casa', '123', '123'),
(8, 'omairi', 'Juan Manuel', 'Flores Crisóstomo', '2022-03-31', '12345', '', '', '123');

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
(3, 'popi', 'doberman', 'rojo', '120', 'es bien feo ', '20 libras', '2023-03-01', 'canina ', 3),
(16, 'edwfwef', 'ewfwef', 'wefwef', 'wefwe', 'fwef', 'weff', '2022-03-31', 'fwef', 5),
(17, 'erger', 'ergre', 'gregregre', '70', 'le cuesta comer', '10', '2022-03-31', 'reggge', 4),
(18, 'fifi', 'chihuahua', 'amarillo', '70', 'le cuesta comer', '10', '2022-04-01', 'canino', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDpago` int(11) NOT NULL,
  `montoTotal` decimal(3,2) NOT NULL,
  `fecha` date NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportemedico`
--

INSERT INTO `reportemedico` (`id_reporteMedico`, `Tratamiento`, `Medicamento`, `ChequeoGeneral`, `fechaReporte`, `fk_cliente`, `fk_mascota`) VALUES
(11, 'durante 5 días', 'gripol', 'La mascota viene por gripe', '2023-03-22', 3, 3),
(12, 'durante una semana', 'pulgol', 'El gato viene por exceso de pulgas ', '2023-03-30', 3, 3),
(13, 'durante un mes ', 'fracturin', 'El hamster se fracturó una pierna', '2023-03-29', 3, 3),
(14, 'durante 5 días', 'Acetaminofen', 'El cocodrilo siente dolor de estomago', '2023-03-20', 3, 3),
(15, 'durante 2 días', 'sopa de loro', 'El loro no puede hablar', '2023-04-06', 3, 3);

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
  `constraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id_veterinario`, `Nombres`, `Apellidos`, `usuario`, `fechaNac`, `Especialidad`, `num_telefonico`, `constraseña`) VALUES
(2, 'Alfredo Baltazar', 'Espinoza Juarez', 'afedoEspino', '2022-10-12', 'general', '123456', '12');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IDpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  MODIFY `id_reporteMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
