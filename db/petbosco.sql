-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2023 a las 22:00:09
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
-- Estructura de tabla para la tabla `citacliente`
--

CREATE TABLE `citacliente` (
  `id_citaCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaveterinario`
--

CREATE TABLE `citaveterinario` (
  `id_cita` int(11) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clinicavet`
--

INSERT INTO `clinicavet` (`id_clinicaVet`, `nombreVeterinaria`, `numTelefonico`, `direccion`, `ContraseñaAdmin`) VALUES
(1, 'PetBosco', '1234245', 'una casa y giro', '');

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
  `especie` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDpago` int(11) NOT NULL,
  `montoTotal` decimal(3,2) NOT NULL,
  `fecha` date NOT NULL
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
  `fechaReporte` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indices de la tabla `citacliente`
--
ALTER TABLE `citacliente`
  ADD PRIMARY KEY (`id_citaCliente`);

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
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDpago`);

--
-- Indices de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD PRIMARY KEY (`id_reporteMedico`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`);

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
  MODIFY `id_reporteMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
