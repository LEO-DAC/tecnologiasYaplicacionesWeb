  -- phpMyAdmin SQL Dump
  -- version 4.8.5
  -- https://www.phpmyadmin.net/
  --
  -- Servidor: 127.0.0.1
  -- Tiempo de generación: 28-05-2019 a las 04:39:14
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
  -- Base de datos: `practica06`
  --

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `cliente`
  --

  CREATE TABLE `cliente` (
    `id` int(11) NOT NULL,
    `tipo` varchar(20) NOT NULL,
    `nombre` varchar(20) NOT NULL,
    `apellido` varchar(30) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  --
  -- Volcado de datos para la tabla `cliente`
  --

  INSERT INTO `cliente` (`id`, `tipo`, `nombre`, `apellido`) VALUES
  (57, 'esporÃ¡dico', 'Leonardo', 'Alonso Cepeda'),
  (58, 'esporÃ¡dico', 'Marco Aurelio', 'NuÃ±o Maganda');

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `habitacion`
  --

  CREATE TABLE `habitacion` (
    `id` int(11) NOT NULL,
    `tipo` varchar(20) NOT NULL,
    `disponible` tinyint(1) NOT NULL,
    `precio` double NOT NULL,
    `imagenHabitacion` varchar(200) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  --
  -- Volcado de datos para la tabla `habitacion`
  --

  INSERT INTO `habitacion` (`id`, `tipo`, `disponible`, `precio`, `imagenHabitacion`) VALUES
  (46, 'simple', 0, 4000, 'img1.jpeg'),
  (47, 'simple', 1, 4600, 'i.jpg'),
  (48, 'matrimonial', 1, 6700, '2016_04_18_iban_erc_0028.jpg'),
  (49, 'matrimonial', 1, 9000, 'th.jpg');

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `reservacion`
  --

  CREATE TABLE `reservacion` (
    `id` int(11) NOT NULL,
    `idCliente` int(11) NOT NULL,
    `idHabitacion` int(11) NOT NULL,
    `fechaEntrada` varchar(18) NOT NULL,
    `dias` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  --
  -- Volcado de datos para la tabla `reservacion`
  --

  INSERT INTO `reservacion` (`id`, `idCliente`, `idHabitacion`, `fechaEntrada`, `dias`) VALUES
  (6, 57, 46, '05/27/2019', 5);

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `usuario`
  --

  CREATE TABLE `usuario` (
    `id` int(11) NOT NULL,
    `username` varchar(20) NOT NULL,
    `password` varchar(20) NOT NULL,
    `admin` tinyint(1) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  --
  -- Volcado de datos para la tabla `usuario`
  --

  INSERT INTO `usuario` (`id`, `username`, `password`, `admin`) VALUES
  (77, 'admin', 'admin', 1);

  --
  -- Índices para tablas volcadas
  --

  --
  -- Indices de la tabla `cliente`
  --
  ALTER TABLE `cliente`
    ADD PRIMARY KEY (`id`);

  --
  -- Indices de la tabla `habitacion`
  --
  ALTER TABLE `habitacion`
    ADD PRIMARY KEY (`id`);

  --
  -- Indices de la tabla `reservacion`
  --
  ALTER TABLE `reservacion`
    ADD PRIMARY KEY (`id`),
    ADD KEY `idCliente` (`idCliente`),
    ADD KEY `idHabitacion` (`idHabitacion`);

  --
  -- Indices de la tabla `usuario`
  --
  ALTER TABLE `usuario`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT de las tablas volcadas
  --

  --
  -- AUTO_INCREMENT de la tabla `cliente`
  --
  ALTER TABLE `cliente`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

  --
  -- AUTO_INCREMENT de la tabla `habitacion`
  --
  ALTER TABLE `habitacion`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

  --
  -- AUTO_INCREMENT de la tabla `reservacion`
  --
  ALTER TABLE `reservacion`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

  --
  -- AUTO_INCREMENT de la tabla `usuario`
  --
  ALTER TABLE `usuario`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

  --
  -- Restricciones para tablas volcadas
  --

  --
  -- Filtros para la tabla `reservacion`
  --
  ALTER TABLE `reservacion`
    ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`idHabitacion`) REFERENCES `habitacion` (`id`),
    ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`);
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
