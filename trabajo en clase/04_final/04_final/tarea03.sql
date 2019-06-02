-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 05:44:04
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea03`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basquetbolista`
--

CREATE TABLE `basquetbolista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `posicion` varchar(20) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `basquetbolista`
--

INSERT INTO `basquetbolista` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(2, 'michael jordan', 'defensa', 'pymes', 'jordan@mail.es'),
(3, 'yaoming', 'defensa', 'pymes', 'yao@nba.us'),
(4, 'Kobe Bryant', 'defensa', 'mecatronica', 'kobe@nba.es'),
(5, 'Kevin Durant', 'medio', 'pymes', 'kevinDurant@nba.es'),
(6, 'Chris Paul', 'base', 'iti', 'chrisPAul@nba.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbolista`
--

CREATE TABLE `futbolista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `posicion` varchar(20) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `futbolista`
--

INSERT INTO `futbolista` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(5, 'ronaldo', 'delantero', 'mecatronica', 'ronaldo@hotmail.com'),
(6, 'messi', 'delantero', 'iti', 'messi@hotmail.com'),
(7, 'cuau', 'defensa', 'pymes', 'cuau@gmail.com'),
(8, 'roberto carlos', 'medio', 'manufactura', 'roberto@gmail.com'),
(9, 'casillas', 'portero', 'mecatronica', 'casillas@fifa.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'leonardo'),
(2, 'daniel'),
(3, 'luis'),
(4, 'carlos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pssw` varchar(20) NOT NULL,
  `status_id` tinyint(1) NOT NULL,
  `user_type_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `pssw`, `status_id`, `user_type_id`) VALUES
(1, 'leo@hotmail.com', '123', 1, 'user'),
(2, 'nuevo@gmail.com', '9789', 1, '1'),
(3, 'new@me.com', '5646', 0, 'nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `date_logged` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_log`
--

INSERT INTO `user_log` (`id`, `date_logged`, `user_id`) VALUES
(1, '2019-05-07', 2),
(2, '2019-05-22', 1),
(3, '2019-05-12', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'juan'),
(2, 'josé'),
(3, 'manuel'),
(4, 'miguel'),
(5, 'pablo'),
(6, 'paco');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `basquetbolista`
--
ALTER TABLE `basquetbolista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `futbolista`
--
ALTER TABLE `futbolista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `basquetbolista`
--
ALTER TABLE `basquetbolista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `futbolista`
--
ALTER TABLE `futbolista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
