-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2019 a las 08:46:54
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jagui_tour`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `urlAvatarC` varchar(120) NOT NULL,
  `nombreC` varchar(60) NOT NULL,
  `apellidosC` varchar(60) NOT NULL,
  `edadC` int(3) NOT NULL,
  `tipoTelefono` varchar(9) NOT NULL,
  `numTelefono` varchar(17) NOT NULL,
  `emailC` varchar(70) NOT NULL,
  `passCliente` varchar(32) NOT NULL,
  `numTarjeta` varchar(16) NOT NULL,
  `passport` tinyint(1) NOT NULL,
  `privilegios` tinyint(1) NOT NULL DEFAULT '3',
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `urlAvatarC`, `nombreC`, `apellidosC`, `edadC`, `tipoTelefono`, `numTelefono`, `emailC`, `passCliente`, `numTarjeta`, `passport`, `privilegios`) VALUES
(1, 'uploads/no_image.png', 'Fernando', 'Montes Aguilar', 18, 'Celular', '123123141231231', 'sb-w47jqh52804@personal.example.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234553111122333', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `emailComentario` varchar(50) NOT NULL,
  `mensaje` varchar(50) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `nombre`, `emailComentario`, `mensaje`, `fecha`, `estatus`) VALUES
(1, 'Jorge', 'jorge@mail.com', 'Hola que tal', '12/12/1999', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `mensaje` varchar(30) NOT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE IF NOT EXISTS `destinos` (
  `idDestino` int(11) NOT NULL AUTO_INCREMENT,
  `urlDestino` varchar(120) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `infoD` varchar(1500) NOT NULL,
  PRIMARY KEY (`idDestino`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`idDestino`, `urlDestino`, `destino`, `lugar`, `infoD`) VALUES
(2, 'uploads/exclusive.jpg', 'Mexico', 'Playa del carmen', 'asd'),
(3, 'uploads/Tokyo_80109801_1050x590_tcm9-33862.jpg', 'JapÃ³n', 'Tokio', 'Tokio, la ajetreada capital de JapÃ³n, mezcla lo ultramoderno y lo tradicional, desde los rascacielos iluminados con neones hasta los templos histÃ³ricos. En Tokio hay restaurantes temÃ¡ticos de todo tipo. Por ejemplo, podrÃ­as comer con gatos, perros, conejos, loros, erizos (Hedgehog CafÃ©), serpientes, bÃºhos, robots (Robot Restaurant), monstruos espaciales, restaurantes ninjas, samurais, vampiros, piratas, restaurantes tipo cÃ¡rcel, restaurantes tipo trenâ€¦ Â¿Cual eliges?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `idFaqs` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `pregunta` varchar(50) NOT NULL,
  `respuesta` varchar(50) NOT NULL,
  PRIMARY KEY (`idFaqs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriai`
--

CREATE TABLE IF NOT EXISTS `galeriai` (
  `idImagen` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriap`
--

CREATE TABLE IF NOT EXISTS `galeriap` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `U_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriapu`
--

CREATE TABLE IF NOT EXISTS `galeriapu` (
  `idImagen` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE IF NOT EXISTS `hoteles` (
  `idHotel` int(11) NOT NULL AUTO_INCREMENT,
  `urlHotel` varchar(120) NOT NULL,
  `nombreHotel` varchar(30) NOT NULL,
  `estrellas` int(1) NOT NULL,
  `infoH` varchar(1500) NOT NULL,
  `idDestino` int(11) NOT NULL,
  PRIMARY KEY (`idHotel`),
  KEY `idDestino` (`idDestino`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`idHotel`, `urlHotel`, `nombreHotel`, `estrellas`, `infoH`, `idDestino`) VALUES
(3, 'uploads/barcelo.jpg', 'Barcelo', 5, 'El Grupo BarcelÃ³, fundado en 1931 por SimÃ³n BarcelÃ³ en la isla de Mallorca (EspaÃ±a), es un grupo turÃ­stico verticalmente integrado que estÃ¡ formado por la divisiÃ³n hotelera BarcelÃ³ Hotel Group, que cuenta con mÃ¡s de 250 hoteles y mÃ¡s de 55.000 habitaciones en 22 paÃ­ses; y por la divisiÃ³n de viajes Ãvoris, que dispone de mÃ¡s de 700 agencias de viajes en 4 continentes, varios touroperadores y receptivos, e incluso una compaÃ±Ã­a aÃ©rea. Al cierre de 2018 el grupo, cuya plantilla estÃ¡ formada por 33.378 personas, obtuvo una cifra de negocios de 4.383,4 millones de euros y un EBITDA de 348 millones de euros.\r\n\r\nDesde 1989 la compaÃ±Ã­a canaliza su labor social a travÃ©s de la FundaciÃ³n BarcelÃ³, que colabora en proyectos de salud, educaciÃ³n, desarrollo econÃ³mico y cultura de paÃ­ses subdesarrollados.', 2),
(4, 'uploads/fukuoka-gion-eng.jpg', 'Mitsui Garden', 5, 'We strive to offer our sophisticated guests an unforgettable hotel experience,\r\nto leave a strong impression having tended to all their needs.\r\nWe want to earn the â€œThank youâ€ we receive from our departing guests,\r\nto have them remember us and wish to return in the future.\r\nIt is both our joy and pride to ensure the all-round satisfaction of our valued guests.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE IF NOT EXISTS `transportes` (
  `idTransporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombreT` varchar(30) NOT NULL,
  `tipoT` varchar(16) NOT NULL,
  `descripcionT` varchar(250) NOT NULL,
  PRIMARY KEY (`idTransporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`idTransporte`, `nombreT`, `tipoT`, `descripcionT`) VALUES
(2, 'Herradura Occidente', 'Autobus', 'Siempre en busca de estar a la vanguardia en el mejor servicio para sus clientes mediante los avances tecnolÃ³gicos, ha implementado una fÃ¡cil y cÃ³moda manera de viajar para todos sus pasajeros.'),
(6, 'TOP', 'Autobus', 'Disfruta momentos inolvidables con tu familia y amigos. Nuestro personal altamente calificado se encargara que tengas un traslado placentero, seguro y cÃ³modo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `urlAvatarUser` varchar(120) NOT NULL,
  `nombreUser` varchar(60) NOT NULL,
  `apellidosUser` varchar(60) NOT NULL,
  `emailUser` varchar(70) NOT NULL,
  `passUser` varchar(32) NOT NULL,
  `privilegiosUser` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `urlAvatarUser`, `nombreUser`, `apellidosUser`, `emailUser`, `passUser`, `privilegiosUser`) VALUES
(1, 'uploads/unnamed.jpg', 'Antonio', 'Tapia Montero', 'atm1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajeg`
--

CREATE TABLE IF NOT EXISTS `viajeg` (
  `idViajeG` int(11) NOT NULL AUTO_INCREMENT,
  `idDestino` int(11) NOT NULL,
  `lugarG` varchar(50) NOT NULL,
  `idHotel` int(11) NOT NULL,
  `idTransporte` int(11) NOT NULL,
  `nPersonasAdd` int(2) NOT NULL,
  `precioA` int(5) NOT NULL,
  `precioN` int(5) NOT NULL,
  `infoVG` varchar(1500) NOT NULL,
  `fechaSG` date NOT NULL,
  `fechaRG` date NOT NULL,
  PRIMARY KEY (`idViajeG`),
  KEY `idDestino` (`idDestino`),
  KEY `idDestino_2` (`idDestino`),
  KEY `idTransporte` (`idTransporte`),
  KEY `idHotel` (`idHotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `viajeg`
--

INSERT INTO `viajeg` (`idViajeG`, `idDestino`, `lugarG`, `idHotel`, `idTransporte`, `nPersonasAdd`, `precioA`, `precioN`, `infoVG`, `fechaSG`, `fechaRG`) VALUES
(10, 2, 'Playa del carmen', 3, 2, 12, 1213, 123, 'Toda la informaciÃ³n del viaje va aqui', '2019-07-17', '2019-07-18'),
(12, 3, 'Tokio', 4, 6, 20, 5234, 2300, '-Desde el primer dÃ­a podremos visitar las grandes tiendas de Harajuku o perdernos en la historia del JapÃ³n con los templos de las cercanÃ­as.', '2019-08-24', '2019-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajep`
--

CREATE TABLE IF NOT EXISTS `viajep` (
  `idViajeP` int(11) NOT NULL AUTO_INCREMENT,
  `destinoP` varchar(350) NOT NULL,
  `lugarP` varchar(50) NOT NULL,
  `fechaSP` date NOT NULL,
  `fechaRP` date NOT NULL,
  `hotelP` varchar(200) NOT NULL,
  `transporteP` varchar(30) NOT NULL DEFAULT 'n/a',
  `adultos` int(2) NOT NULL DEFAULT '0',
  `infantes` int(2) NOT NULL DEFAULT '0',
  `nombresApVP` varchar(200) NOT NULL DEFAULT 'n/a',
  `edadesVP` varchar(100) NOT NULL DEFAULT 'n/a',
  `infoVP` varchar(500) NOT NULL DEFAULT 'n/a',
  `precioT` float NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '2',
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idViajeP`),
  KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `viajep`
--

INSERT INTO `viajep` (`idViajeP`, `destinoP`, `lugarP`, `fechaSP`, `fechaRP`, `hotelP`, `transporteP`, `adultos`, `infantes`, `nombresApVP`, `edadesVP`, `infoVP`, `precioT`, `estado`, `idCliente`) VALUES
(1, '1', 'Ixtapa', '2019-07-17', '2019-07-19', 'sin nombre', 'Volaris', 2, 0, 'Antonio Tapia Montero, Otro mas', '22, 22', '', 0, 1, 1),
(6, '2', 'Playa del carmen', '2019-08-14', '2019-08-22', 'Barcelo', 'Herradura Occidente', 0, 0, 'n/a', 'n/a', '-PodrÃ¡n disfrutar...', 8000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajerosg`
--

CREATE TABLE IF NOT EXISTS `viajerosg` (
  `idViajerosG` int(11) NOT NULL AUTO_INCREMENT,
  `adultosG` int(11) NOT NULL DEFAULT '0',
  `infantesG` int(11) NOT NULL DEFAULT '0',
  `nombresApVG` varchar(350) DEFAULT 'n/a',
  `edadesVG` varchar(350) NOT NULL DEFAULT 'n/a',
  `estadoVG` int(11) NOT NULL DEFAULT '2',
  `pagoTG` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idViajeG` int(11) NOT NULL,
  PRIMARY KEY (`idViajerosG`),
  KEY `idCliente` (`idCliente`,`idViajeG`),
  KEY `idViajeG` (`idViajeG`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `viajerosg`
--

INSERT INTO `viajerosg` (`idViajerosG`, `adultosG`, `infantesG`, `nombresApVG`, `edadesVG`, `estadoVG`, `pagoTG`, `idCliente`, `idViajeG`) VALUES
(1, 0, 0, 'n/a', 'n/a', 1, 1213, 1, 10),
(2, 2, 1, 'Mario Guzman,Pepe Guzman,Maria Guzman', '18,18,9', 1, 3762, 1, 10),
(3, 0, 0, 'n/a', 'n/a', 1, 1213, 1, 10),
(5, 0, 0, 'n/a', 'n/a', 1, 1213, 1, 10),
(6, 0, 0, 'n/a', 'n/a', 1, 1213, 1, 10);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD CONSTRAINT `hoteles_ibfk_1` FOREIGN KEY (`idDestino`) REFERENCES `destinos` (`idDestino`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajeg`
--
ALTER TABLE `viajeg`
  ADD CONSTRAINT `viajeg_ibfk_1` FOREIGN KEY (`idDestino`) REFERENCES `destinos` (`idDestino`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viajeg_ibfk_3` FOREIGN KEY (`idTransporte`) REFERENCES `transportes` (`idTransporte`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viajeg_ibfk_4` FOREIGN KEY (`idHotel`) REFERENCES `hoteles` (`idHotel`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajep`
--
ALTER TABLE `viajep`
  ADD CONSTRAINT `viajep_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajerosg`
--
ALTER TABLE `viajerosg`
  ADD CONSTRAINT `viajerosg_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`),
  ADD CONSTRAINT `viajerosg_ibfk_2` FOREIGN KEY (`idViajeG`) REFERENCES `viajeg` (`idViajeG`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
