-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-02-2023 a las 01:26:07
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.1.9

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
-- Estructura de tabla para la tabla `citacliente`
--

CREATE TABLE `citacliente` (
  `id_citaCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaveterinario`
--

CREATE TABLE `citaveterinario` (
  `id_cita` int(11) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `fk_veterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
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

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `fechaNac`, `num_telefonico`, `direccion`, `DUI`, `contraseña`) VALUES
(1, 'ale', 'jimenez', '2023-02-14', '22866916', 'mi casa', '12345678900', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicavet`
--

CREATE TABLE `clinicavet` (
  `id_clinicaVet` int(11) NOT NULL,
  `nombreVeterinaria` varchar(11) NOT NULL,
  `numTelefonico` varchar(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `ContraseñaAdmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clinicavet`
--

INSERT INTO `clinicavet` (`id_clinicaVet`, `nombreVeterinaria`, `numTelefonico`, `direccion`, `ContraseñaAdmin`) VALUES
(1, 'PetBosco', '1234245', 'una casa y giro', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `fecha` date NOT NULL,
  `id_expediente` int(11) NOT NULL,
  `fk_reporteMedico` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fk_cliente` int(11) NOT NULL,
  `especie` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `Apodo_mascota`, `raza`, `color`, `Altura`, `condicionMascota`, `Peso`, `FechaNac`, `fk_cliente`, `especie`) VALUES
(1, 'michus', 'gato', 'negro', '100cm', 'ningun medicamento', '12kg', '2023-02-23', 1, 'anaranjado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedero`
--

CREATE TABLE `monedero` (
  `id_monedero` int(11) NOT NULL,
  `saldoDisp` decimal(3,2) NOT NULL,
  `tarjetaOcupada` varchar(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDpago` int(11) NOT NULL,
  `montoTotal` decimal(3,2) NOT NULL,
  `fecha` date NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_veterinario` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportemedico`
--

CREATE TABLE `reportemedico` (
  `Tratamiento` varchar(200) NOT NULL,
  `Medicamento` varchar(200) NOT NULL,
  `ChequeoGeneral` varchar(200) NOT NULL,
  `fechaReporte` date NOT NULL,
  `id_reporteMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `fechaNac` date NOT NULL,
  `Especialidad` varchar(200) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL,
  `fk_clinicaVeterinario` int(11) NOT NULL,
  `Constraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`fechaNac`, `Especialidad`, `Nombres`, `Apellidos`, `num_telefonico`, `id_veterinario`, `fk_mascota`, `fk_clinicaVeterinario`, `Constraseña`) VALUES
('2023-02-12', 'e', 'pedrito', 'aguilar', '12345', 1, 1, 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citacliente`
--
ALTER TABLE `citacliente`
  ADD PRIMARY KEY (`id_citaCliente`),
  ADD KEY `fk_agendarCitasCliente` (`fk_cliente`);

--
-- Indices de la tabla `citaveterinario`
--
ALTER TABLE `citaveterinario`
  ADD KEY `fk_veterinarioCita` (`fk_veterinario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `clinicavet`
--
ALTER TABLE `clinicavet`
  ADD PRIMARY KEY (`id_clinicaVet`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `fk_reporteExpediente` (`fk_reporteMedico`),
  ADD KEY `fk_mascotaExpediente` (`fk_mascota`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk_clienteMascota` (`fk_cliente`);

--
-- Indices de la tabla `monedero`
--
ALTER TABLE `monedero`
  ADD PRIMARY KEY (`id_monedero`),
  ADD KEY `fk_ClienteMonedero` (`fk_cliente`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDpago`),
  ADD KEY `fk_clientePago` (`fk_cliente`),
  ADD KEY `fk_veterinarioPago` (`fk_veterinario`),
  ADD KEY `fk_mascotaPago` (`fk_mascota`);

--
-- Indices de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD PRIMARY KEY (`id_reporteMedico`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`),
  ADD KEY `fk_mascotaVet` (`fk_mascota`),
  ADD KEY `fk_clinicaVeterinariaVeterinario` (`fk_clinicaVeterinario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citacliente`
--
ALTER TABLE `citacliente`
  MODIFY `id_citaCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clinicavet`
--
ALTER TABLE `clinicavet`
  MODIFY `id_clinicaVet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IDpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  MODIFY `id_reporteMedico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citacliente`
--
ALTER TABLE `citacliente`
  ADD CONSTRAINT `fk_agendarCitasCliente` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `citaveterinario`
--
ALTER TABLE `citaveterinario`
  ADD CONSTRAINT `fk_veterinarioCita` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `fk_mascotaExpediente` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reporteExpediente` FOREIGN KEY (`fk_reporteMedico`) REFERENCES `reportemedico` (`id_reporteMedico`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_clienteMascota` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `monedero`
--
ALTER TABLE `monedero`
  ADD CONSTRAINT `fk_ClienteMonedero` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_clientePago` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mascotaPago` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_veterinarioPago` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `fk_clinicaVeterinariaVeterinario` FOREIGN KEY (`fk_clinicaVeterinario`) REFERENCES `clinicavet` (`id_clinicaVet`),
  ADD CONSTRAINT `fk_mascotaVet` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;