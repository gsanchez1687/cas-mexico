-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 09-02-2024 a las 21:40:43
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfhka_cas_bolivia_limpia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `active`) VALUES
(1, 'Ninguno', 1),
(2, 'Cable de Alimentación', 1),
(3, 'Adaptador de Corriente', 1),
(4, 'Cable de Comunicación ', 1),
(5, 'Gaveta', 1),
(6, 'Carrete de Auditoría', 1),
(7, 'Rollo de Auditoría (Impreso)', 1),
(8, 'Papel', 1),
(9, 'Manual de Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accessorie_warranties`
--

CREATE TABLE `accessorie_warranties` (
  `id` int(11) NOT NULL,
  `accessorie_id` int(11) NOT NULL,
  `warranty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accessorie_warranties`
--

INSERT INTO `accessorie_warranties` (`id`, `accessorie_id`, `warranty_id`) VALUES
(217, 2, 3),
(218, 3, 3),
(219, 4, 3),
(220, 5, 3),
(221, 6, 3),
(222, 7, 3),
(223, 8, 3),
(224, 9, 3),
(233, 2, 1),
(234, 3, 1),
(235, 4, 1),
(236, 5, 1),
(237, 6, 1),
(238, 7, 1),
(239, 8, 1),
(240, 9, 1),
(249, 2, 4),
(250, 3, 4),
(251, 4, 4),
(252, 5, 4),
(253, 6, 4),
(254, 7, 4),
(255, 8, 4),
(256, 9, 4),
(257, 2, 2),
(258, 3, 2),
(259, 4, 2),
(260, 5, 2),
(261, 6, 2),
(262, 7, 2),
(263, 8, 2),
(264, 9, 2),
(289, 2, 5),
(290, 3, 5),
(291, 4, 5),
(292, 5, 5),
(293, 6, 5),
(294, 7, 5),
(295, 8, 5),
(296, 9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `cas_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `phone_local` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `phone_personal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `representative` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `record_fiscal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Surcusales\n';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `active`) VALUES
(1, 'DASCOM', 1),
(2, 'PANTUM', 1),
(3, 'HKA', 1),
(4, 'ACLAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cas`
--

CREATE TABLE `cas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` text COLLATE utf8_spanish_ci,
  `phone_local` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone_personal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `representative` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `record_fiscal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Centro Autorizado de Servicio';

--
-- Volcado de datos para la tabla `cas`
--

INSERT INTO `cas` (`id`, `user_id`, `name`, `address`, `phone_local`, `phone_personal`, `email`, `representative`, `country_id`, `state_id`, `city_id`, `record_fiscal`, `category_id`, `active`, `created`, `modified`) VALUES
(4, NULL, 'Gabriel Gomez', 'mexico', '11111111', '55555555', 'ggomez@thefactoryhka.com', 'Gabriel Gomez', 29, 1, 17, '55555', 1, 1, '2016-02-22 15:00:27', '2016-02-22 15:00:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(1, 'Impresora Fiscal', 1),
(2, 'Impresora Termica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `active`) VALUES
(1, 1, 'Cercado', 1),
(2, 1, 'Antonio Vaca Díez', 1),
(3, 1, 'Mariscal José Ballivián Segurola', 1),
(4, 1, 'Yacuma', 1),
(5, 1, 'Moxos', 1),
(6, 1, 'Marbán', 1),
(7, 1, 'Mamoré', 1),
(8, 1, 'Iténez', 1),
(9, 2, 'Oropeza', 1),
(10, 2, 'Juana Azurduy de Padilla', 1),
(11, 2, 'Jaime Zudáñez', 1),
(12, 2, 'Tomina', 1),
(13, 2, 'Hernando Siles', 1),
(14, 2, 'Yamparáez', 1),
(15, 2, 'Nor Cinti', 1),
(16, 2, 'Sud Cinti', 1),
(17, 2, 'Belisario Boeto', 1),
(18, 2, 'Luis Calvo', 1),
(19, 4, 'Arani', 1),
(20, 4, 'Esteban Arce', 1),
(21, 4, 'Arque', 1),
(22, 4, 'Ayopaya', 1),
(23, 4, 'Campero', 1),
(24, 4, 'Capinota', 1),
(25, 4, 'Cercado', 1),
(26, 4, 'Carrasco', 1),
(27, 4, 'Chapare', 1),
(28, 4, 'Germán Jordán', 1),
(29, 4, 'Mizque', 1),
(30, 4, 'Punata', 1),
(31, 4, 'Quillacollo', 1),
(32, 4, 'Tapacarí', 1),
(33, 4, 'Bolívar', 1),
(34, 4, 'Tiraque', 1),
(35, 5, 'Aroma', 1),
(36, 5, 'Bautista Saavedra', 1),
(37, 5, 'Abel Iturralde', 1),
(38, 5, 'Caranavi', 1),
(39, 5, 'Eliodoro Camacho', 1),
(40, 5, 'Franz Tamayo', 1),
(41, 5, 'Gualberto Villaroel', 1),
(42, 5, 'Ingavi', 1),
(43, 5, 'Ingavi', 1),
(44, 5, 'General José Manuel Pando', 1),
(45, 5, 'Larecaja', 1),
(46, 5, 'Loayza', 1),
(47, 5, 'Los Andes', 1),
(48, 5, 'Manco Kapac', 1),
(49, 5, 'Muñecas', 1),
(50, 5, 'Nor Yungas', 1),
(51, 5, 'Omasuyos', 1),
(52, 5, 'Pedro Domingo Murillo', 1),
(53, 5, 'Sud Yungas', 1),
(54, 6, 'Sabaya', 1),
(55, 6, 'Carangas', 1),
(56, 6, 'Cercado', 1),
(57, 6, 'Eduardo Avaroa', 1),
(58, 6, 'Ladislao Cabrera', 1),
(59, 6, 'Litoral', 1),
(60, 6, 'Mejillones', 1),
(61, 6, 'Nor Carangas', 1),
(62, 6, 'Pantaleón Dalence', 1),
(63, 6, 'Poopó', 1),
(64, 6, 'Saucarí', 1),
(65, 6, 'Sebastian Pagador', 1),
(66, 6, 'Sud Carangas', 1),
(67, 6, 'Tomas Barrón', 1),
(68, 7, 'Abuná', 1),
(69, 7, 'Federico Román', 1),
(70, 7, 'Madre de Dios', 1),
(71, 7, 'Manuripi', 1),
(72, 7, 'Nicolás Suárez', 1),
(73, 8, 'Alonzo de Ibáñez', 1),
(74, 8, 'Antonio Quijarro', 1),
(75, 8, 'Bernardino Bilbao', 1),
(76, 8, 'Charcas', 1),
(77, 8, 'Chayanta', 1),
(78, 8, 'Cornelio Saavedra', 1),
(79, 8, 'Daniel Saavedra', 1),
(80, 8, 'Enrique Baldivieso', 1),
(81, 8, 'José María Linares', 1),
(82, 8, 'Modesto Omiste', 1),
(83, 8, 'Nor Chichas', 1),
(84, 8, 'Nor Lípez', 1),
(85, 8, 'Rafael Bustillo', 1),
(86, 8, 'Sud Chichas', 1),
(87, 8, 'Sud Lipez', 1),
(88, 8, 'Tomás Frías', 1),
(89, 9, 'Andrés Ibáñez', 1),
(90, 9, 'Ignacio Warnes', 1),
(91, 9, 'José Miguel de Velasco', 1),
(92, 9, 'Ichilo', 1),
(93, 9, 'Chiquitos', 1),
(94, 9, 'Sara', 1),
(95, 9, 'Cordillera', 1),
(96, 9, 'Vallegrande', 1),
(97, 9, 'Florida', 1),
(98, 9, 'Santistevan', 1),
(99, 9, 'Ñuflo de Chávez', 1),
(100, 9, 'Ángel Sandoval', 1),
(101, 9, 'Caballero', 1),
(102, 9, 'Germán Busch', 1),
(103, 9, 'Guarayos', 1),
(105, 10, 'Aniceto Arce', 1),
(106, 10, 'Burdet O\'Connor', 1),
(107, 10, 'Eustaquio Méndez', 1),
(108, 10, 'Gran Chaco', 1),
(109, 10, 'José María Avilés', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `active`) VALUES
(1, 'AF', 'Afganistán', 0),
(2, 'AX', 'Islas Gland', 0),
(3, 'AL', 'Albania', 0),
(4, 'DE', 'Alemania', 0),
(5, 'AD', 'Andorra', 0),
(6, 'AO', 'Angola', 0),
(7, 'AI', 'Anguilla', 0),
(8, 'AQ', 'Antártida', 0),
(9, 'AG', 'Antigua y Barbuda', 0),
(10, 'AN', 'Antillas Holandesas', 0),
(11, 'SA', 'Arabia Saudí', 0),
(12, 'DZ', 'Argelia', 0),
(13, 'AR', 'Argentina', 0),
(14, 'AM', 'Armenia', 0),
(15, 'AW', 'Aruba', 0),
(16, 'AU', 'Australia', 0),
(17, 'AT', 'Austria', 0),
(18, 'AZ', 'Azerbaiyán', 0),
(19, 'BS', 'Bahamas', 0),
(20, 'BH', 'Bahréin', 0),
(21, 'BD', 'Bangladesh', 0),
(22, 'BB', 'Barbados', 0),
(23, 'BY', 'Bielorrusia', 0),
(24, 'BE', 'Bélgica', 0),
(25, 'BZ', 'Belice', 0),
(26, 'BJ', 'Benin', 0),
(27, 'BM', 'Bermudas', 0),
(28, 'BT', 'Bhután', 0),
(29, 'BO', 'Bolivia', 1),
(30, 'BA', 'Bosnia y Herzegovina', 0),
(31, 'BW', 'Botsuana', 0),
(32, 'BV', 'Isla Bouvet', 0),
(33, 'BR', 'Brasil', 0),
(34, 'BN', 'Brunéi', 0),
(35, 'BG', 'Bulgaria', 0),
(36, 'BF', 'Burkina Faso', 0),
(37, 'BI', 'Burundi', 0),
(38, 'CV', 'Cabo Verde', 0),
(39, 'KY', 'Islas Caimán', 0),
(40, 'KH', 'Camboya', 0),
(41, 'CM', 'Camerún', 0),
(42, 'CA', 'Canadá', 0),
(43, 'CF', 'República Centroafricana', 0),
(44, 'TD', 'Chad', 0),
(45, 'CZ', 'República Checa', 0),
(46, 'CL', 'Chile', 0),
(47, 'CN', 'China', 0),
(48, 'CY', 'Chipre', 0),
(49, 'CX', 'Isla de Navidad', 0),
(50, 'VA', 'Ciudad del Vaticano', 0),
(51, 'CC', 'Islas Cocos', 0),
(52, 'CO', 'Colombia', 1),
(53, 'KM', 'Comoras', 0),
(54, 'CD', 'República Democrática del Congo', 0),
(55, 'CG', 'Congo', 0),
(56, 'CK', 'Islas Cook', 0),
(57, 'KP', 'Corea del Norte', 0),
(58, 'KR', 'Corea del Sur', 0),
(59, 'CI', 'Costa de Marfil', 0),
(60, 'CR', 'Costa Rica', 0),
(61, 'HR', 'Croacia', 0),
(62, 'CU', 'Cuba', 0),
(63, 'DK', 'Dinamarca', 0),
(64, 'DM', 'Dominica', 0),
(65, 'DO', 'República Dominicana', 0),
(66, 'EC', 'Ecuador', 0),
(67, 'EG', 'Egipto', 0),
(68, 'SV', 'El Salvador', 0),
(69, 'AE', 'Emiratos Árabes Unidos', 0),
(70, 'ER', 'Eritrea', 0),
(71, 'SK', 'Eslovaquia', 0),
(72, 'SI', 'Eslovenia', 0),
(73, 'ES', 'España', 0),
(74, 'UM', 'Islas ultramarinas de Estados Unidos', 0),
(75, 'US', 'Estados Unidos', 0),
(76, 'EE', 'Estonia', 0),
(77, 'ET', 'Etiopía', 0),
(78, 'FO', 'Islas Feroe', 0),
(79, 'PH', 'Filipinas', 0),
(80, 'FI', 'Finlandia', 0),
(81, 'FJ', 'Fiyi', 0),
(82, 'FR', 'Francia', 0),
(83, 'GA', 'Gabón', 0),
(84, 'GM', 'Gambia', 0),
(85, 'GE', 'Georgia', 0),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', 0),
(87, 'GH', 'Ghana', 0),
(88, 'GI', 'Gibraltar', 0),
(89, 'GD', 'Granada', 0),
(90, 'GR', 'Grecia', 0),
(91, 'GL', 'Groenlandia', 0),
(92, 'GP', 'Guadalupe', 0),
(93, 'GU', 'Guam', 0),
(94, 'GT', 'Guatemala', 0),
(95, 'GF', 'Guayana Francesa', 0),
(96, 'GN', 'Guinea', 0),
(97, 'GQ', 'Guinea Ecuatorial', 0),
(98, 'GW', 'Guinea-Bissau', 0),
(99, 'GY', 'Guyana', 0),
(100, 'HT', 'Haití', 0),
(101, 'HM', 'Islas Heard y McDonald', 0),
(102, 'HN', 'Honduras', 0),
(103, 'HK', 'Hong Kong', 0),
(104, 'HU', 'Hungría', 0),
(105, 'IN', 'India', 0),
(106, 'ID', 'Indonesia', 0),
(107, 'IR', 'Irán', 0),
(108, 'IQ', 'Iraq', 0),
(109, 'IE', 'Irlanda', 0),
(110, 'IS', 'Islandia', 0),
(111, 'IL', 'Israel', 0),
(112, 'IT', 'Italia', 0),
(113, 'JM', 'Jamaica', 0),
(114, 'JP', 'Japón', 0),
(115, 'JO', 'Jordania', 0),
(116, 'KZ', 'Kazajstán', 0),
(117, 'KE', 'Kenia', 0),
(118, 'KG', 'Kirguistán', 0),
(119, 'KI', 'Kiribati', 0),
(120, 'KW', 'Kuwait', 0),
(121, 'LA', 'Laos', 0),
(122, 'LS', 'Lesotho', 0),
(123, 'LV', 'Letonia', 0),
(124, 'LB', 'Líbano', 0),
(125, 'LR', 'Liberia', 0),
(126, 'LY', 'Libia', 0),
(127, 'LI', 'Liechtenstein', 0),
(128, 'LT', 'Lituania', 0),
(129, 'LU', 'Luxemburgo', 0),
(130, 'MO', 'Macao', 0),
(131, 'MK', 'ARY Macedonia', 0),
(132, 'MG', 'Madagascar', 0),
(133, 'MY', 'Malasia', 0),
(134, 'MW', 'Malawi', 0),
(135, 'MV', 'Maldivas', 0),
(136, 'ML', 'Malí', 0),
(137, 'MT', 'Malta', 0),
(138, 'FK', 'Islas Malvinas', 0),
(139, 'MP', 'Islas Marianas del Norte', 0),
(140, 'MA', 'Marruecos', 0),
(141, 'MH', 'Islas Marshall', 0),
(142, 'MQ', 'Martinica', 0),
(143, 'MU', 'Mauricio', 0),
(144, 'MR', 'Mauritania', 0),
(145, 'YT', 'Mayotte', 0),
(146, 'MX', 'Mexico', 1),
(147, 'FM', 'Micronesia', 0),
(148, 'MD', 'Moldavia', 0),
(149, 'MC', 'Mónaco', 0),
(150, 'MN', 'Mongolia', 0),
(151, 'MS', 'Montserrat', 0),
(152, 'MZ', 'Mozambique', 0),
(153, 'MM', 'Myanmar', 0),
(154, 'NA', 'Namibia', 0),
(155, 'NR', 'Nauru', 0),
(156, 'NP', 'Nepal', 0),
(157, 'NI', 'Nicaragua', 0),
(158, 'NE', 'Níger', 0),
(159, 'NG', 'Nigeria', 0),
(160, 'NU', 'Niue', 0),
(161, 'NF', 'Isla Norfolk', 0),
(162, 'NO', 'Noruega', 0),
(163, 'NC', 'Nueva Caledonia', 0),
(164, 'NZ', 'Nueva Zelanda', 0),
(165, 'OM', 'Omán', 0),
(166, 'NL', 'Países Bajos', 0),
(167, 'PK', 'Pakistán', 0),
(168, 'PW', 'Palau', 0),
(169, 'PS', 'Palestina', 0),
(170, 'PA', 'Panamá', 1),
(171, 'PG', 'Papúa Nueva Guinea', 0),
(172, 'PY', 'Paraguay', 0),
(173, 'PE', 'Perú', 1),
(174, 'PN', 'Islas Pitcairn', 0),
(175, 'PF', 'Polinesia Francesa', 0),
(176, 'PL', 'Polonia', 0),
(177, 'PT', 'Portugal', 0),
(178, 'PR', 'Puerto Rico', 0),
(179, 'QA', 'Qatar', 0),
(180, 'GB', 'Reino Unido', 0),
(181, 'RE', 'Reunión', 0),
(182, 'RW', 'Ruanda', 0),
(183, 'RO', 'Rumania', 0),
(184, 'RU', 'Rusia', 0),
(185, 'EH', 'Sahara Occidental', 0),
(186, 'SB', 'Islas Salomón', 0),
(187, 'WS', 'Samoa', 0),
(188, 'AS', 'Samoa Americana', 0),
(189, 'KN', 'San Cristóbal y Nevis', 0),
(190, 'SM', 'San Marino', 0),
(191, 'PM', 'San Pedro y Miquelón', 0),
(192, 'VC', 'San Vicente y las Granadinas', 0),
(193, 'SH', 'Santa Helena', 0),
(194, 'LC', 'Santa Lucía', 0),
(195, 'ST', 'Santo Tomé y Príncipe', 0),
(196, 'SN', 'Senegal', 0),
(197, 'CS', 'Serbia y Montenegro', 0),
(198, 'SC', 'Seychelles', 0),
(199, 'SL', 'Sierra Leona', 0),
(200, 'SG', 'Singapur', 0),
(201, 'SY', 'Siria', 0),
(202, 'SO', 'Somalia', 0),
(203, 'LK', 'Sri Lanka', 0),
(204, 'SZ', 'Suazilandia', 0),
(205, 'ZA', 'Sudáfrica', 0),
(206, 'SD', 'Sudán', 0),
(207, 'SE', 'Suecia', 0),
(208, 'CH', 'Suiza', 0),
(209, 'SR', 'Surinam', 0),
(210, 'SJ', 'Svalbard y Jan Mayen', 0),
(211, 'TH', 'Tailandia', 0),
(212, 'TW', 'Taiwán', 0),
(213, 'TZ', 'Tanzania', 0),
(214, 'TJ', 'Tayikistán', 0),
(215, 'IO', 'Territorio Británico del Océano Índico', 0),
(216, 'TF', 'Territorios Australes Franceses', 0),
(217, 'TL', 'Timor Oriental', 0),
(218, 'TG', 'Togo', 0),
(219, 'TK', 'Tokelau', 0),
(220, 'TO', 'Tonga', 0),
(221, 'TT', 'Trinidad y Tobago', 0),
(222, 'TN', 'Túnez', 0),
(223, 'TC', 'Islas Turcas y Caicos', 0),
(224, 'TM', 'Turkmenistán', 0),
(225, 'TR', 'Turquía', 0),
(226, 'TV', 'Tuvalu', 0),
(227, 'UA', 'Ucrania', 0),
(228, 'UG', 'Uganda', 0),
(229, 'UY', 'Uruguay', 0),
(230, 'UZ', 'Uzbekistán', 0),
(231, 'VU', 'Vanuatu', 0),
(232, 'VE', 'Venezuela', 1),
(233, 'VN', 'Vietnam', 0),
(234, 'VG', 'Islas Vírgenes Británicas', 0),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos', 0),
(236, 'WF', 'Wallis y Futuna', 0),
(237, 'YE', 'Yemen', 0),
(238, 'DJ', 'Yibuti', 0),
(239, 'ZM', 'Zambia', 0),
(240, 'ZW', 'Zimbabue', 0),
(241, 'RD', 'Republica Dominicana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `nit` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `address_fiscal` text COLLATE utf8_spanish_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos del Cliente';

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `nit`, `name`, `address_fiscal`, `city_id`, `country_id`, `phone`, `email`) VALUES
(1, 16871752, 'Guillermo Enrique', 'Caracas', 17, 146, 414267740, 'gsanchez1687@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `distributor_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `bill_sale` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`id`, `distributor_id`, `country_id`, `category_id`, `brand_id`, `model_id`, `name`, `sale_date`, `bill_sale`, `active`, `status`, `created`, `modified`) VALUES
(1, 1, 29, 1, 4, 27, 'keyUw', '0000-00-00', 'bol-0001', 1, 1, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(2, 1, 29, 1, 4, 27, 'nuWru', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(3, 1, 29, 1, 4, 27, 'fRaph', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(4, 1, 29, 1, 4, 27, 'Stane', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(5, 1, 29, 1, 4, 27, 'Kabre', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(6, 1, 29, 1, 4, 27, 'yutRu', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(7, 1, 29, 1, 4, 27, 'bAfeb', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(8, 1, 29, 1, 4, 27, 'cruDr', '0000-00-00', 'bol-0001', 1, 1, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(9, 1, 29, 1, 4, 27, 'vateS', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(10, 1, 29, 1, 4, 27, 'faxaF', '0000-00-00', 'bol-0001', 1, 1, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(11, 1, 29, 1, 4, 27, 'Demaw', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(12, 1, 29, 1, 4, 27, 'dreVa', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(13, 1, 29, 1, 4, 27, 'fruDu', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(14, 1, 29, 1, 4, 27, 'wacuY', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(15, 1, 29, 1, 4, 27, 'Guswe', '0000-00-00', 'bol-0001', 1, 1, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(16, 1, 29, 1, 4, 27, 'vetUj', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(17, 1, 29, 1, 4, 27, 'zaneV', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(18, 1, 29, 1, 4, 27, 'Wracr', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(19, 1, 29, 1, 4, 27, 'crAha', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(20, 1, 29, 1, 4, 27, 'chAph', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(21, 1, 29, 1, 4, 27, 'zAtre', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(22, 1, 29, 1, 4, 27, 'chadU', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(23, 1, 29, 1, 4, 27, 'vAcru', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(24, 1, 29, 1, 4, 27, 'Tawad', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(25, 1, 29, 1, 4, 27, 'Bebus', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(26, 1, 29, 1, 4, 27, 'kUcru', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(27, 1, 29, 1, 4, 27, 'Penes', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(28, 1, 29, 1, 4, 27, 'brAqe', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(29, 1, 29, 1, 4, 27, 'vaCru', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(30, 1, 29, 1, 4, 27, 'Nebeh', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(31, 1, 29, 1, 4, 27, 'dreqU', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(32, 1, 29, 1, 4, 27, 'xutRu', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(33, 1, 29, 1, 4, 27, 'Pedac', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(34, 1, 29, 1, 4, 27, 'wetHa', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(35, 1, 29, 1, 4, 27, 'dRuka', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(36, 1, 29, 1, 4, 27, 'fuTuz', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(37, 1, 29, 1, 4, 27, 'bResw', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(38, 1, 29, 1, 4, 27, 'Swake', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(39, 1, 29, 1, 4, 27, 'gaSwe', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(40, 1, 29, 1, 4, 27, 'chAst', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(41, 1, 29, 1, 4, 27, 'Swath', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(42, 1, 29, 1, 4, 27, 'preTr', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(43, 1, 29, 1, 4, 27, 'pEkus', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(44, 1, 29, 1, 4, 27, 'vequR', '0000-00-00', 'bol-0001', 1, 1, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(45, 1, 29, 1, 4, 27, 'fraPh', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(46, 1, 29, 1, 4, 27, 'gEsas', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(47, 1, 29, 1, 4, 27, 'vebRu', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(48, 1, 29, 1, 4, 27, 'hUpru', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(49, 1, 29, 1, 4, 27, 'suDud', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17'),
(50, 1, 29, 1, 4, 27, 'reSta', '0000-00-00', 'bol-0001', 1, NULL, '2016-02-22 16:14:17', '2016-02-22 16:14:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositions`
--

CREATE TABLE `dispositions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dispositions`
--

INSERT INTO `dispositions` (`id`, `name`, `active`) VALUES
(1, 'Reemplazo por garantía', 1),
(2, 'Reparación por garantía', 1),
(3, 'Verificación de garantía por fábrica', 0),
(4, 'Fuera de garantía/reparación/diagnóstico ', 0),
(5, 'Servicio por mantenimiento ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distributors`
--

CREATE TABLE `distributors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `address` text COLLATE utf8_spanish_ci NOT NULL,
  `phone_local` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `phone_personal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `representative` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `record_fiscal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `distributors`
--

INSERT INTO `distributors` (`id`, `user_id`, `name`, `address`, `phone_local`, `phone_personal`, `email`, `representative`, `country_id`, `state_id`, `city_id`, `record_fiscal`, `category_id`, `active`, `created`, `modified`) VALUES
(1, 1, 'Liz Vielma', 'Mexico CA', '55555', '111111', 'lvielma@thefactoryhka.com', 'Liz Vielma', 29, 1, 2, '626256', 1, 1, '2016-02-22 16:06:27', '2016-02-22 16:06:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failures`
--

CREATE TABLE `failures` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `description_failure` text COLLATE utf8_spanish_ci,
  `solution` text COLLATE utf8_spanish_ci,
  `replacement` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description_replacement` text COLLATE utf8_spanish_ci,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `failures`
--

INSERT INTO `failures` (`id`, `brand_id`, `model_id`, `description_failure`, `solution`, `replacement`, `description_replacement`, `active`) VALUES
(1, 4, 26, 'LA BALANZA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'LS2-24', 'Main board', 1),
(2, 4, 26, 'LA BALANZA NO ENCIENDE', 'FUENTE DE ALIMENTACIÓN DAÑADA, REEMPLAZAR', 'LS2-10', 'Power supply board', 1),
(3, 4, 24, 'LA BALANZA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'LS2-24', 'Main board', 1),
(4, 4, 26, 'LA BALANZA NO IMPRIME ', 'MÓDULO DE IMPRESIÓN DAÑADO, REEMPLAZAR LA PIEZA', 'LS2-18A', 'Printer module (including thermal printer head)', 1),
(5, 4, 26, 'LA BALANZA NO IMPRIME ', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', 'LS2-18B', 'Thermal printer head', 1),
(6, 4, 26, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'LS2-24', 'Main board', 1),
(7, 4, 26, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'TARJETA DE COMUNICACIÓN PRESENTA CORTOCIRCUITO INTERNO O ESTÁ DAÑADA, REEMPLAZAR', 'LS2-25', 'Communication board', 1),
(8, 4, 26, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'PUERTO DAÑADO, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', 'LS2-25', 'Communication board', 1),
(9, 4, 24, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'LS2-31', 'Load cell', 1),
(10, 4, 26, 'LA BALANZA NO MARCA EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'LS2-31', 'Load cell', 1),
(11, 4, 26, 'DISPLAY ROTO', 'MÓDULO DE DISPLAY DAÑADO, REEMPLAZAR PIEZA', 'LS2-2', 'LCD module（Square）', 1),
(15, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'HKA57-USB/PARALLEL', 'Main board-parallel interface', 1),
(16, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'HKA57-USB/RS232(DB9)', 'Main board - serial interface', 1),
(17, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'ADAPTADOR DE CORRIENTE EN CORTO, REEMPLAZAR', 'MAX580006', 'Power adapter with US plug', 1),
(18, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'CABLE DEL ADAPTADOR DE CORRIENTE PARTIDO, REEMPLAZAR', 'MAX580006', 'Power adapter with US plug', 1),
(19, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'SWITCH DE APAGADO/ENCENDIDO DAÑADO, REEMPLAZAR', 'MAX580008', 'switch set with cable', 1),
(20, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'CABLE DEL SWITCH DE APAGADO/ENCENDIDO PARTIDO, REEMPLAZAR', 'MAX580008', 'switch set with cable', 1),
(21, 3, 23, 'LA IMPRESORA NO IMPRIME ', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', 'MAX580001', 'Printer head ', 1),
(22, 3, 23, 'LA IMPRESORA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'HKA57-USB/PARALLEL', 'Main board-parallel interface', 1),
(23, 3, 23, 'LA IMPRESORA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'HKA57-USB/RS232(DB9)', 'Main board - serial interface', 1),
(24, 3, 23, 'LA IMPRESORA NO IMPRIME ', 'MOTOR DAÑADO, REEMPLAZAR', 'MAX580004', 'Motor', 1),
(25, 3, 23, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'PINES DEL PUERTO DAÑADOS O DOBLADOS, REEMPLAZAR LA TARJETA PRINCIPAL', 'HKA57-USB/PARALLEL', 'Main board-parallel interface', 1),
(26, 3, 23, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'HKA57-USB/PARALLEL', 'Main board-parallel interface', 1),
(27, 3, 23, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'PINES DEL PUERTO DAÑADOS O DOBLADOS, REEMPLAZAR LA TARJETA PRINCIPAL', 'HKA57-USB/RS232(DB9)', 'Main board - serial interface', 1),
(28, 3, 23, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'HKA57-USB/RS232(DB9)', 'Main board - serial interface', 1),
(29, 3, 23, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', 'MAX580005', 'Gear sets', 1),
(30, 3, 23, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'RODILLO DAÑADO, REEMPLAZAR LA PIEZA', 'MAX580007', 'Rubber Covered Roller', 1),
(31, 3, 23, 'LA IMPRESORA ARRUGA EL PAPEL ', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', 'MAX580005', 'Gear sets', 1),
(32, 3, 23, 'LA IMPRESORA ARRUGA EL PAPEL ', 'RODILLO DAÑADO, REEMPLAZAR LA PIEZA', 'MAX580007', 'Rubber Covered Roller', 1),
(33, 3, 23, 'LA IMPRESORA IMPRIME SÓLO PARTE DEL TEXTO', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', 'MAX580001', 'Printer head ', 1),
(34, 3, 23, 'LOS LED DEL PANEL DE CONTROL NO ENCIENDEN', 'PANEL DE CONTROL DAÑADO, REEMPLAZAR', 'MAX580003', 'panel control board set', 1),
(35, 3, 23, 'EL PULSADOR DEL PANEL DE CONTROL NO FUNCIONA', 'PANEL DE CONTROL DAÑADO, REEMPLAZAR', 'MAX580003', 'panel control board set', 1),
(36, 3, 23, 'NO HAY AVANCE DE PAPEL EN LA IMPRESORA', 'MOTOR DAÑADO, REEMPLAZAR', 'MAX580004', 'Motor', 1),
(37, 3, 23, 'LA IMPRESORA NO ENCIENDE', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA57', 1),
(38, 3, 23, 'LA IMPRESORA NO IMPRIME ', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA57', 1),
(39, 3, 23, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA57', 1),
(40, 3, 23, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA57', 1),
(41, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'MAX80I0002', 'Main board', 1),
(42, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'FUENTE DAÑADA, REEMPLAZAR TARJETA PRINCIPAL', 'MAX80I0002', 'Main board', 1),
(43, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'ADAPTADOR DE CORRIENTE EN CORTO, REEMPLAZAR', 'MAX80I0005(US)', 'Power adapter with US plug', 1),
(44, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'CABLE DEL ADAPTADOR DE CORRIENTE PARTIDO, REEMPLAZAR', 'MAX80I0005(US)', 'Power adapter with US plug', 1),
(45, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'ADAPTADOR DE CORRIENTE EN CORTO, REEMPLAZAR', 'MAX80I0005(EU)', 'Power adapter with EU plug', 1),
(46, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'CABLE DEL ADAPTADOR DE CORRIENTE PARTIDO, REEMPLAZAR', 'MAX80I0005(EU)', 'Power adapter with EU plug', 1),
(47, 3, 22, 'LA IMPRESORA NO CORTA PAPEL', 'AUTOCUTTER CON DESGASTE EXCESIVO O DAÑADO, REEMPLAZAR AUTO-CUTTER', 'MAX80I0006', 'Movable cutter', 1),
(48, 3, 22, 'LA IMPRESORA NO CORTA PAPEL', 'AUTOCUTTER CON DESGASTE EXCESIVO O DAÑADO, REEMPLAZAR AUTO-CUTTER', 'MAX80I0007', 'Fix cutter module', 1),
(49, 3, 22, 'LA IMPRESORA NO IMPRIME ', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', 'MAX80I0001', 'Printer head ', 1),
(50, 3, 22, 'LA IMPRESORA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'MAX80I0002', 'Main board', 1),
(51, 3, 22, 'LA IMPRESORA NO COMUNICA VIA ETHERNET', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', 'HKA80-USB/RS232(DB9)/ETHERNET', 'Communication board- Ethernet + DB9 interface module', 1),
(52, 3, 22, 'LA IMPRESORA NO COMUNICA VIA ETHERNET', 'PUERTO DAÑADO, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', 'HKA80-USB/RS232(DB9)/ETHERNET', 'Communication board- Ethernet + DB9 interface module', 1),
(53, 3, 22, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', 'HKA80-USB/RS232(DB9)/ETHERNET', 'Communication board- Ethernet + DB9 interface module', 1),
(54, 3, 22, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'PINES DEL PUERTO DAÑADOS O DOBLADOS, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', 'HKA80-USB/RS232(DB9)/ETHERNET', 'Communication board- Ethernet + DB9 interface module', 1),
(55, 3, 22, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', 'HKA80-USB/PARALLEL', 'Communication board-parallel interface module', 1),
(56, 3, 22, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'PINES DEL PUERTO DAÑADOS O DOBLADOS, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', 'HKA80-USB/PARALLEL', 'Communication board-parallel interface module', 1),
(57, 3, 22, 'LA IMPRESORA IMPRIME SÓLO PARTE DEL TEXTO', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', 'MAX80I0001', 'Printer head ', 1),
(58, 3, 22, 'LA IMPRESORA IMPRIME SÓLO PARTE DEL TEXTO', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'MAX80I0002', 'Main board', 1),
(59, 3, 22, 'LA IMPRESORA NO EMITE SEÑAL AUDITIVA', 'BUZZER DAÑADO, REEMPLAZAR TARJETA PRINCIPAL', 'MAX80I0002', 'Main board', 1),
(60, 3, 22, 'LOS LED DEL PANEL DE CONTROL NO ENCIENDEN', 'PANEL DE CONTROL DAÑADO, REEMPLAZAR', 'MAX80I0003', 'panel control board', 1),
(61, 3, 22, 'EL PULSADOR DEL PANEL DE CONTROL NO FUNCIONA', 'PANEL DE CONTROL DAÑADO, REEMPLAZAR', 'MAX80I0003', 'panel control board', 1),
(62, 3, 22, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', 'MAX80I0008', 'Gear sets', 1),
(63, 3, 22, 'LA IMPRESORA TRATA DE  IMPRIMIR Y EMITE SONIDO PERO NO IMPRIME', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', 'MAX80I0008', 'Gear sets', 1),
(64, 3, 22, 'LA IMPRESORA ARRUGA EL PAPEL ', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', 'MAX80I0008', 'Gear sets', 1),
(65, 3, 22, 'LA IMPRESORA NO ENCIENDE', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(66, 3, 22, 'LA IMPRESORA NO CORTA PAPEL', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(67, 3, 22, 'LA IMPRESORA NO IMPRIME ', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(68, 3, 22, 'LA IMPRESORA NO COMUNICA VIA ETHERNET', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(69, 3, 22, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(70, 3, 22, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(71, 3, 22, 'LA IMPRESORA IMPRIME SÓLO PARTE DEL TEXTO', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA DE PUNTO DE VENTA HKA80', 1),
(72, 4, 27, 'LA BALANZA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(73, 4, 27, 'LA BALANZA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(74, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(75, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'PUERTO DAÑADO, REEMPLAZAR LA TARJETA PRINCIPAL', 'OS2-7', 'Mainboard group', 1),
(76, 4, 27, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'OS2-23', 'Load Cell', 1),
(77, 4, 27, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'MÓDULO DE CELDA DEFECTUOSO, REEMPLAZAR LA PIEZA', 'OS2-9', 'AD Board', 1),
(78, 4, 27, 'LA BALANZA NO MARCA EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'OS2-23', 'Load Cell', 1),
(79, 4, 27, 'LA BALANZA NO MARCA EL PESO', 'MÓDULO DE CELDA DEFECTUOSO, REEMPLAZAR LA PIEZA', 'OS2-9', 'AD Board', 1),
(80, 4, 27, 'LAS TECLAS NO EMITEN SEÑAL AUDITIVA', 'TECLADO DEFECUOSO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(81, 4, 27, 'LAS TECLAS NO EMITEN SEÑAL AUDITIVA', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(82, 4, 27, 'TECLAS ROTAS', 'TECLADO DAÑADO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(83, 4, 27, 'LAS TECLAS NO FUNCIONAN', 'TECLADO DEFECUOSO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(84, 4, 27, 'LAS TECLAS NO FUNCIONAN', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(85, 4, 27, 'DISPLAY ROTO', 'MÓDULO DE DISPLAY DAÑADO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(86, 4, 27, 'NO APARECEN NÚMEROS EN EL DISPLAY', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(87, 4, 27, 'LA BALANZA NO ENCIENDE', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(88, 4, 27, 'LA BALANZA NO IMPRIME ', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(89, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(90, 2, 21, 'LA IMPRESORA NO ENCIENDE', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(91, 2, 21, 'LA IMPRESORA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(92, 2, 21, 'LA IMPRESORA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(93, 2, 21, 'LA IMPRESORA NO ENCIENDE', 'FUSIBLE DE LA FUENTE DE ALIMENTACIÓN DAÑADO, REEMPLAZAR TARJETA DE ALIMENTACIÓN', '301022086001', 'High Voltage Power Board B (110V )', 1),
(94, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(95, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(96, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'CLUTCH DE AVANCE DE PAPEL DAÑADO, REEMPLAZAR', '301022064001', 'Paper Feed Clutch', 1),
(97, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'EL FUSOR ESTÁ DAÑADO, REEMPLAZAR', '301022088001', 'Fuser Unit （110V）', 1),
(98, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'UNIDAD LÁSER DAÑADA, REEMPLAZAR', '301022055001', 'Laser Scanning Unit', 1),
(99, 2, 21, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(100, 2, 21, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(101, 2, 21, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'ANTENA WIFI DAÑADA, REEMPLAZAR TARJETA PRINCIPAL', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(102, 2, 21, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'ANTENA WIFI DAÑADA, REEMPLAZAR TARJETA PRINCIPAL', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(103, 2, 21, 'LA IMPRESORA NO COMUNICA VIA USB', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(104, 2, 21, 'LA IMPRESORA NO COMUNICA VIA USB', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(105, 2, 21, 'LA IMPRESORA NO COMUNICA VIA USB', 'PUERTO USB DAÑADO, REEMPLAZAR TARJETA PRINCIPAL', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(106, 2, 21, 'LA IMPRESORA NO COMUNICA VIA USB', 'PUERTO USB DAÑADO, REEMPLAZAR TARJETA PRINCIPAL', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(107, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON RAYAS VERTICALES', 'RODILLO DE TRANSFERENCIA MALTRATADO O DAÑADO, REEMPLAZAR', '301022066001', 'Transfer Roller', 1),
(108, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON MANCHAS NEGRAS', 'RODILLO DE TRANSFERENCIA MALTRATADO O DAÑADO, REEMPLAZAR', '301022066001', 'Transfer Roller', 1),
(109, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON RAYAS HORIZONTALES', 'RODILLO DE TRANSFERENCIA MALTRATADO O DAÑADO, REEMPLAZAR', '301022066001', 'Transfer Roller', 1),
(110, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON RAYAS HORIZONTALES', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(111, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON RAYAS HORIZONTALES', 'RODILLO DE ALIMENTACIÓN DE PAPEL DESGASTADO, REEMPLAZAR CUERPO DE ARRASTRE DE PAPEL', '301022060001', 'Pick-up Assembly', 1),
(112, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN LIGERAMENTE EXPUESTA', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(113, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON UNA ZONA EXPUESTA', 'UNIDAD LÁSER DAÑADA, REEMPLAZAR', '301022055001', 'Laser Scanning Unit', 1),
(114, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON UNA ZONA EXPUESTA', 'RODILLO DE TRANSFERENCIA MALTRATADO O DAÑADO, REEMPLAZAR', '301022066001', 'Transfer Roller', 1),
(115, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON UNA ZONA EXPUESTA', 'EL RESORTE DE PRESIÓN DEL RODILLO DE TRANSFERENCIA ESTÁ DAÑADO, REEMPLAZAR EL RODILLO DE TRANSFERENCIA', '301022066001', 'Transfer Roller', 1),
(116, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON UNA ZONA EXPUESTA', 'EL MANGUITO DEL RODILLO DE TRANSFERENCIA ESTÁ DAÑADO, REEMPLAZAR EL RODILLO DE TRANSFERENCIA', '301022066001', 'Transfer Roller', 1),
(117, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN FANTASMA PERIÓDICA', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(118, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN FANTASMA PERIÓDICA', 'EL FUSOR ESTÁ DAÑADO, REEMPLAZAR', '301022088001', 'Fuser Unit （110V）', 1),
(119, 2, 21, 'DEFECTO EN LA IMAGEN - LA PARTE POSTERIOR DE LA HOJA ESTÁ SUCIA', 'EL FUSOR ESTÁ DAÑADO, REEMPLAZAR', '301022088001', 'Fuser Unit （110V）', 1),
(120, 2, 21, 'DEFECTO EN LA IMAGEN - LA PARTE POSTERIOR DE LA HOJA ESTÁ SUCIA', 'RODILLO DE TRANSFERENCIA MALTRATADO O DAÑADO, REEMPLAZAR', '301022066001', 'Transfer Roller', 1),
(121, 2, 21, 'DEFECTO EN LA IMAGEN - FONDO NEGRO', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(122, 2, 21, 'DEFECTO EN LA IMAGEN - TODA LA PÁGINA OSCURA', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(123, 2, 21, 'EL CONTROL DE TEMPERATURA ESTÁ DAÑADO O DEFECTUOSO', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022081001', 'Main Control Board D（110V—P2500）', 1),
(124, 2, 21, 'EL CONTROL DE TEMPERATURA ESTÁ DAÑADO O DEFECTUOSO', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022078001', 'Main Control Board B (220V/110V—P2500 W)', 1),
(125, 2, 21, 'DEFECTO EN LA IMAGEN - TODA LA PÁGINA OSCURA', 'UNIDAD LÁSER DAÑADA, REEMPLAZAR', '301022055001', 'Laser Scanning Unit', 1),
(126, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'MOTOR DAÑADO, REEMPLAZAR', '301022057001', 'Main Motor', 1),
(127, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'CABLE DEL MOTOR DAÑADO O PARTIDO, REEMPLAZAR MOTOR', '301022057001', 'Main Motor', 1),
(128, 2, 21, 'LA SEÑAL LSU LÍNEA DE SINCRONIZACIÓN ES ANORMAL', 'TARJETA DE ALIMENTACIÓN PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '301022086001', 'High Voltage Power Board B (110V )', 1),
(129, 2, 21, 'LA SEÑAL LSU LÍNEA DE SINCRONIZACIÓN ES ANORMAL', 'MOTOR DAÑADO, REEMPLAZAR', '301022057001', 'Main Motor', 1),
(130, 2, 21, 'LA SEÑAL LSU LÍNEA DE SINCRONIZACIÓN ES ANORMAL', 'CABLE DEL MOTOR DAÑADO O PARTIDO, REEMPLAZAR MOTOR', '301022057001', 'Main Motor', 1),
(131, 2, 21, 'DEFECTO EN LA IMAGEN - IMAGEN CON RAYAS VERTICALES BLANCAS', 'EL FUSOR ESTÁ DAÑADO, REEMPLAZAR', '301022088001', 'Fuser Unit （110V）', 1),
(132, 2, 21, 'NO HAY AVANCE DE PAPEL EN LA IMPRESORA', 'MOTOR DAÑADO, REEMPLAZAR', '301022057001', 'Main Motor', 1),
(133, 2, 21, 'NO HAY AVANCE DE PAPEL EN LA IMPRESORA', 'CABLE DEL MOTOR DAÑADO O PARTIDO, REEMPLAZAR MOTOR', '301022057001', 'Main Motor', 1),
(134, 2, 21, 'LA IMPRESORA ARRUGA EL PAPEL ', 'CLUTCH DE AVANCE DE PAPEL DAÑADO, REEMPLAZAR', '301022064001', 'Paper Feed Clutch', 1),
(135, 2, 21, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'CLUTCH DE AVANCE DE PAPEL DAÑADO, REEMPLAZAR', '301022064001', 'Paper Feed Clutch', 1),
(136, 2, 21, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR UNIDAD CONTROLADORA DE ENGRANAJES', '301022073001', 'Fuser Unit Drive Gear', 1),
(137, 2, 21, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONTROLADOR DE ENGRANAJES DEL OPC', '301022071001', 'OPC Drive Gear', 1),
(138, 2, 21, 'LA IMPRESORA NO HALA EL PAPEL', 'SOLENOIDE DAÑADO, REEMPLAZAR CUERPO DE ARRASTRE DE PAPEL', '301022060001', 'Pick-up Assembly', 1),
(139, 2, 21, 'LA IMPRESORA NO HALA EL PAPEL', 'RODILLO DE ALIMENTACIÓN DE PAPEL DESGASTADO, REEMPLAZAR CUERPO DE ARRASTRE DE PAPEL', '301022060001', 'Pick-up Assembly', 1),
(140, 2, 21, 'LA IMPRESORA NO HALA EL PAPEL', 'CUERPO DE ARRASTRE DE PAPEL DAÑADO, REEMPLAZAR ', '301022060001', 'Pick-up Assembly', 1),
(141, 2, 21, 'LA IMPRESORA NO HALA EL PAPEL', 'SENSOR DE PAPEL DAÑADO, REEMPLAZAR ', '301022069001', 'Paper Sensor Unit', 1),
(142, 2, 21, 'LA IMPRESORA ATASCA EL PAPEL', 'CUERPO DE ARRASTRE DE PAPEL DAÑADO, REEMPLAZAR ', '301022060001', 'Pick-up Assembly', 1),
(143, 2, 21, 'LA IMPRESORA ATASCA EL PAPEL', 'RODILLO DE ALIMENTACIÓN DE PAPEL DESGASTADO, REEMPLAZAR CUERPO DE ARRASTRE DE PAPEL', '301022060001', 'Pick-up Assembly', 1),
(144, 2, 21, 'LA IMPRESORA ATASCA EL PAPEL', 'SENSOR DE PAPEL DAÑADO, REEMPLAZAR ', '301022069001', 'Paper Sensor Unit', 1),
(145, 2, 21, 'LA IMPRESORA HALA MAS DE UNA HOJA A LA VEZ', 'CUERPO DE ARRASTRE DE PAPEL DE PAPEL DAÑADO, REEMPLAZAR ', '301022060001', 'Pick-up Assembly', 1),
(146, 2, 21, 'LA IMPRESORA NO ENCIENDE', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA LÁSER MONOCROMÁTICA PANTUM P2506W', 1),
(147, 2, 21, 'LA IMPRESORA NO IMPRIME ', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA LÁSER MONOCROMÁTICA PANTUM P2506W', 1),
(148, 2, 21, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA LÁSER MONOCROMÁTICA PANTUM P2506W', 1),
(149, 2, 21, 'LA IMPRESORA NO COMUNICA VIA USB', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'IMPRESORA LÁSER MONOCROMÁTICA PANTUM P2506W', 1),
(150, 1, 3, 'LA IMPRESORA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '99512', 'Main Board', 1),
(151, 1, 3, 'LA IMPRESORA NO ENCIENDE', 'ADAPTADOR DE CORRIENTE EN CORTO, REEMPLAZAR', '99520', 'Power adapter ', 1),
(152, 1, 3, 'LA IMPRESORA NO ENCIENDE', 'CABLE DEL ADAPTADOR DE CORRIENTE PARTIDO, REEMPLAZAR', '99520', 'Power adapter ', 1),
(153, 1, 3, 'LA IMPRESORA NO ENCIENDE', 'SWITCH DE APAGADO/ENCENDIDO DAÑADO, REEMPLAZAR', '99519', 'Power switch Assy', 1),
(154, 1, 3, 'LA IMPRESORA NO ENCIENDE', 'CABLE DEL SWITCH DE APAGADO/ENCENDIDO PARTIDO, REEMPLAZAR', '99519', 'Power switch Assy', 1),
(155, 1, 3, 'LA IMPRESORA NO IMPRIME ', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', '99508', 'Thermal Print Head (TPH)', 1),
(156, 1, 3, 'LA IMPRESORA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '99512', 'Main Board', 1),
(157, 1, 3, 'LA IMPRESORA NO IMPRIME ', 'MOTOR DAÑADO, REEMPLAZAR', '99517', 'Stepping motor', 1),
(158, 1, 3, 'LA IMPRESORA NO IMPRIME ', 'CABLE FLEX DEL CABEZAL DE IMPRESIÓN PARTIDO O DAÑADO, REEMPLAZAR', '99535', 'Cable for Print Head', 1),
(159, 1, 3, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', '99503', 'Parallel Interface  board', 1),
(160, 1, 3, 'LA IMPRESORA NO COMUNICA VIA PUERTO PARALELO', 'PINES DE LOS PUERTOS DAÑADOS, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', '99504', 'Parallel Interface  board', 1),
(161, 1, 3, 'LA IMPRESORA NO COMUNICA VIA ETHERNET', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', '99505', 'Ethernet Interface board', 1),
(162, 1, 3, 'LA IMPRESORA NO COMUNICA VIA ETHERNET', 'PUERTO DAÑADO, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', '99505', 'Ethernet Interface board', 1),
(163, 1, 3, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', '99504', 'Serial Interface board', 1),
(164, 1, 3, 'LA IMPRESORA NO COMUNICA VIA SERIAL', 'PINES DE LOS PUERTOS DAÑADOS, REEMPLAZAR LA TARJETA DE COMUNICACIÓN', '99504', 'Serial Interface board', 1),
(165, 1, 3, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'TARJETA DE COMUNICACIÓN DAÑADA, REEMPLAZAR LA PIEZA', '99506', 'Wi-Fi Interface board Wi-Fi', 1),
(166, 1, 3, 'LA IMPRESORA NO COMUNICA VIA WIFI', 'ANTENA WIFI DAÑADA, REEMPLAZAR LA TARJETA DE COMUNICACIÓN WIFI', '99506', 'Wi-Fi Interface board Wi-Fi', 1),
(167, 1, 3, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'RODILLO DAÑADO, REEMPLAZAR LA PIEZA', '99509', 'Platen', 1),
(168, 1, 3, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', '99528', 'Gear 2', 1),
(169, 1, 3, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', '99529', 'Gear 1', 1),
(170, 1, 3, 'LA IMPRESORA ARRUGA EL PAPEL ', 'RODILLO DAÑADO, REEMPLAZAR LA PIEZA', '99509', 'Platen', 1),
(171, 1, 3, 'LA IMPRESORA ARRUGA EL PAPEL ', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', '99528', 'Gear 2', 1),
(172, 1, 3, 'LA IMPRESORA ARRUGA EL PAPEL ', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', '99529', 'Gear 1', 1),
(173, 1, 3, 'LA IMPRESORA TRATA DE  IMPRIMIR Y EMITE UN SONIDO PERO NO IMPRIME', 'RODILLO DAÑADO, REEMPLAZAR LA PIEZA', '99509', 'Platen', 1),
(174, 1, 3, 'LA IMPRESORA TRATA DE  IMPRIMIR Y EMITE UN SONIDO PERO NO IMPRIME', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', '99528', 'Gear 2', 1),
(175, 1, 3, 'LA IMPRESORA TRATA DE  IMPRIMIR Y EMITE UN SONIDO PERO NO IMPRIME', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', '99529', 'Gear 1', 1),
(176, 1, 3, 'LA IMPRESORA IMPRIME SÓLO PARTE DEL TEXTO', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', '99512', 'Main Board', 1),
(177, 1, 3, 'LA IMPRESORA IMPRIME SÓLO PARTE DEL TEXTO', 'CABEZAL DE IMPRESIÓN CON DESGASTE EXCESIVO, REEMPLAZAR LA PIEZA', '99508', 'Thermal Print Head (TPH)', 1),
(178, 1, 3, 'LA IMPRESORA NO CORTA PAPEL', 'AUTOCUTTER CON DESGASTE EXCESIVO O DAÑADO, REEMPLAZAR AUTO-CUTTER', '99507', 'Auto-cutter assembly', 1),
(179, 1, 3, 'NO HAY AVANCE DE PAPEL EN LA IMPRESORA', 'MOTOR DAÑADO, REEMPLAZAR', '99517', 'Stepping motor', 1),
(180, 1, 3, 'LOS LED DEL PANEL DE CONTROL NO ENCIENDEN', 'PANEL DE CONTROL DAÑADO, REEMPLAZAR', '99518', 'Control Panel Assy with Cable', 1),
(181, 1, 3, 'EL PULSADOR DEL PANEL DE CONTROL NO FUNCIONA', 'PANEL DE CONTROL DAÑADO, REEMPLAZAR', '99518', 'Control Panel Assy with Cable', 1),
(182, 3, 22, 'LA IMPRESORA NO IMPRIME ', 'MOTOR DAÑADO, REEMPLAZAR', 'MAX80I0012', 'Stepping motor module ( motor + electronic board+cable)', 1),
(183, 3, 22, 'NO HAY AVANCE DE PAPEL EN LA IMPRESORA', 'MOTOR DAÑADO, REEMPLAZAR', 'MAX80I0012', 'Stepping motor module ( motor + electronic board+cable)', 1),
(184, 3, 22, 'LA TAPA FRONTAL TIENE LAS PESTAÑAS ROTAS', 'REEMPLAZAR TAPA FRONTAL', 'MAX80I0010', 'Front  cover', 1),
(185, 3, 22, 'LA IMPRESORA TRATA DE  IMPRIMIR Y SE TRANCA', 'RETENEDOR DE CUCHILLAS DAÑADO, REEMPLAZAR', 'MAX80I0011', 'Rack', 1),
(186, 3, 22, 'LA IMPRESORA TRATA DE  IMPRIMIR Y EMITE SONIDO PERO NO IMPRIME', 'RETENEDOR DE CUCHILLAS DAÑADO, REEMPLAZAR', 'MAX80I0011', 'Rack', 1),
(187, 3, 22, 'LA IMPRESORA ARRUGA EL PAPEL ', 'ENGRANAJES DESGASTADOS O DAÑADOS, REEMPLAZAR CONJUNTO DE ENGRANAJES', 'MAX80I0011', 'Rack', 1),
(188, 4, 27, 'LA BALANZA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(189, 4, 27, 'LA BALANZA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(190, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(191, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'PUERTO DAÑADO, REEMPLAZAR LA TARJETA PRINCIPAL', 'OS2-7', 'Mainboard group', 1),
(192, 4, 27, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'OS2-23', 'Load Cell', 1),
(193, 4, 27, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'MÓDULO DE CELDA DEFECTUOSO, REEMPLAZAR LA PIEZA', 'OS2-9', 'AD Board', 1),
(194, 4, 27, 'LA BALANZA NO MARCA EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'OS2-23', 'Load Cell', 1),
(195, 4, 27, 'LA BALANZA NO MARCA EL PESO', 'MÓDULO DE CELDA DEFECTUOSO, REEMPLAZAR LA PIEZA', 'OS2-9', 'AD Board', 1),
(196, 4, 27, 'LAS TECLAS NO EMITEN SEÑAL AUDITIVA', 'TECLADO DEFECUOSO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(197, 4, 27, 'LAS TECLAS NO EMITEN SEÑAL AUDITIVA', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(198, 4, 27, 'TECLAS ROTAS', 'TECLADO DAÑADO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(199, 4, 27, 'LAS TECLAS NO FUNCIONAN', 'TECLADO DEFECUOSO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(200, 4, 27, 'LAS TECLAS NO FUNCIONAN', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(201, 4, 27, 'DISPLAY ROTO', 'MÓDULO DE DISPLAY DAÑADO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(202, 4, 27, 'NO APARECEN NÚMEROS EN EL DISPLAY', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(203, 4, 27, 'LA BALANZA NO ENCIENDE', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(204, 4, 27, 'LA BALANZA NO IMPRIME ', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(205, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(206, 4, 27, 'LA BALANZA NO ENCIENDE', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(207, 4, 27, 'LA BALANZA NO IMPRIME ', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(208, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'TARJETA PRINCIPAL PRESENTA CORTOCIRCUITO INTERNO O DAÑADA, REEMPLAZAR', 'OS2-7', 'Mainboard group', 1),
(209, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'PUERTO DAÑADO, REEMPLAZAR LA TARJETA PRINCIPAL', 'OS2-7', 'Mainboard group', 1),
(210, 4, 27, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'OS2-23', 'Load Cell', 1),
(211, 4, 27, 'LA BALANZA TIENE MUCHA VARIACIÓN AL MARCAR EL PESO', 'MÓDULO DE CELDA DEFECTUOSO, REEMPLAZAR LA PIEZA', 'OS2-9', 'AD Board', 1),
(212, 4, 27, 'LA BALANZA NO MARCA EL PESO', 'CELDA DE CARGA DEFECTUOSA, REEMPLAZAR LA PIEZA', 'OS2-23', 'Load Cell', 1),
(213, 4, 27, 'LA BALANZA NO MARCA EL PESO', 'MÓDULO DE CELDA DEFECTUOSO, REEMPLAZAR LA PIEZA', 'OS2-9', 'AD Board', 1),
(214, 4, 27, 'LAS TECLAS NO EMITEN SEÑAL AUDITIVA', 'TECLADO DEFECUOSO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(215, 4, 27, 'LAS TECLAS NO EMITEN SEÑAL AUDITIVA', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(216, 4, 27, 'TECLAS ROTAS', 'TECLADO DAÑADO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(217, 4, 27, 'LAS TECLAS NO FUNCIONAN', 'TECLADO DEFECUOSO, REEMPLAZAR KEY PAD', 'OS2-16', 'OS2 customer keypad', 1),
(218, 4, 27, 'LAS TECLAS NO FUNCIONAN', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(219, 4, 27, 'DISPLAY ROTO', 'MÓDULO DE DISPLAY DAÑADO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(220, 4, 27, 'NO APARECEN NÚMEROS EN EL DISPLAY', 'MÓDULO DE DISPLAY DEFECTUOSO, REEMPLAZAR PIEZA', 'OS2-14', 'OS2 customer board group', 1),
(221, 4, 27, 'LA BALANZA NO ENCIENDE', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(222, 4, 27, 'LA BALANZA NO IMPRIME ', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1),
(223, 4, 27, 'LA BALANZA NO COMUNICA VIA ETHERNET', 'FALLA REPORTADA POR DOA, SUSTITUIR POR EQUIPO NUEVO', 'No aplica', 'BALANZA ACLAS OS2X', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failures_warranties`
--

CREATE TABLE `failures_warranties` (
  `id` int(11) NOT NULL,
  `failure_id` int(11) NOT NULL,
  `warranty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Relacion entre la falla y la garantia';

--
-- Volcado de datos para la tabla `failures_warranties`
--

INSERT INTO `failures_warranties` (`id`, `failure_id`, `warranty_id`) VALUES
(1, 73, 1),
(2, 74, 1),
(3, 72, 2),
(4, 73, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_polls`
--

CREATE TABLE `files_polls` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `file` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `warranty_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_warranties`
--

CREATE TABLE `files_warranties` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `file` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `category` int(2) DEFAULT NULL,
  `warranty_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `files_warranties`
--

INSERT INTO `files_warranties` (`id`, `name`, `file`, `category`, `warranty_id`, `created`) VALUES
(1, 'RMA-BOL-20160001', '16863_252418352532_8049780_n.jpg', 2, 1, '2016-02-22 16:23:01'),
(2, 'RMA-BOL-20160001', '16863_252418362532_6561512_n.jpg', 2, 1, '2016-02-22 16:23:01'),
(3, 'RMA-BOL-20160002', '75679_500832772532_3595838_n.jpg', 2, 2, '2016-02-25 10:14:34'),
(4, 'RMA-BOL-20160002', '75691_497917162532_1650347_n.jpg', 2, 2, '2016-02-25 10:14:34'),
(5, 'RMA-BOL-20160003', '22464_337459762532_3253714_n.jpg', 2, 3, '2016-04-25 11:54:10'),
(6, 'RMA-BOL-20160003', NULL, 2, 3, '2016-04-25 11:54:10'),
(7, 'RMA-BOL-20160004', '1238756833_skyunder_img_8418_1.jpg', 2, 4, '2016-05-13 15:44:41'),
(8, 'RMA-BOL-20160004', NULL, 2, 4, '2016-05-13 15:44:41'),
(9, 'RMA-BOL-20160005', '101_0648.jpg', 2, 5, '2016-06-02 09:04:10'),
(10, 'RMA-BOL-20160005', '101_0649.jpg', 2, 5, '2016-06-02 09:04:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `item`, `name`, `menu_id`, `active`) VALUES
(3, 'roles_admin', 'roles_admin', 1, 1),
(4, 'cas_admin', 'cas_admin', 5, 1),
(5, 'cas_add', 'cas_add', 5, 1),
(6, 'cas_edit', 'cas_edit', 5, 1),
(7, 'cas_view', 'cas_view', 5, 1),
(8, 'cas_active', 'cas_active', 5, 1),
(9, 'cas_delete', 'cas_delete', 5, 1),
(10, 'cas_create', 'cas_create', 5, 1),
(11, 'distributors_admin', 'distributors_admin', 7, 1),
(12, 'devices_admin', 'devices_admin', 9, 1),
(13, 'users_admin', 'users_admin', 2, 1),
(14, 'technician_admin', 'technician_admin', 2, 1),
(15, 'mytechnician_admin', 'mytechnician_admin', 2, 1),
(16, 'warranties_admin', 'warranties_admin', 6, 1),
(17, 'devices_importcsv', 'devices_importcsv', 9, 1),
(18, 'devices_mydevice', 'devices_mydevice', 9, 1),
(19, 'warranties_create', 'warranties_create', 6, 1),
(20, 'log_index', 'log_index', 8, 1),
(21, 'requests_admin', 'requests_admin', 10, 1),
(22, 'requests_active', 'requests_active', 10, 1),
(23, 'requests_edit', 'requests_edit', 10, 1),
(24, 'failures_admin', 'failures_admin', 11, 1),
(25, 'poll_admin', 'poll_admin', 12, 1),
(26, 'notificacion_pieza', 'notificacion_pieza', 6, 1),
(27, 'warrenties_reparar_falla', 'warrenties_reparar_falla', 6, 1),
(28, 'warrenties_cerrar_rma', 'warrenties_cerrar_rma', 6, 1),
(29, 'requests_cas', 'requests_cas', 10, 1),
(30, 'warranties_admin_cas', 'warranties_admin_cas', 6, 1),
(31, 'requests_partes_pieza_cas', 'requests_partes_pieza_cas', 10, 1),
(32, 'users_view', 'users_view', 2, 1),
(33, 'users_acceso', 'users_acceso', 2, 1),
(34, 'users_update', 'users_update', 2, 1),
(35, 'users_delete', 'users_delete', 2, 1),
(36, 'requests_ver', 'requests_ver', 10, 1),
(37, 'requests_active', 'requests_active', 10, 1),
(38, 'warrenties_aprobar_rma_supervisor', 'warrenties_aprobar_rma_supervisor', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `modulo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activity` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `device` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `modulo`, `activity`, `country`, `ip`, `date`, `device`, `description`) VALUES
(2, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 10:07:50', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(3, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 10:10:14', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(4, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 10:10:17', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(5, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 10:18:33', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(6, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 10:18:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(7, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 11:18:50', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(8, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 11:18:56', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(9, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 11:19:18', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(10, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 11:19:22', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(11, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 15:01:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(12, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 15:01:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(13, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 15:03:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(14, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 15:03:17', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(15, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 15:46:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(16, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 15:46:10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(17, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 15:51:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(18, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 15:51:43', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(19, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 15:59:55', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(20, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 16:00:01', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(21, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 16:07:56', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(22, 3, 'Login', 'Ha iniciado sesion el usuario: lvielma', 'Reserved', '127.0.0.1', '2016-02-22 16:08:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(23, 3, 'Login', 'Ha iniciado sesion el usuario: lvielma', 'Reserved', '127.0.0.1', '2016-02-22 16:13:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(24, 3, 'Login', 'Ha cerrado sesion el usuario: lvielma', 'Reserved', '127.0.0.1', '2016-02-22 16:14:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(25, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 16:15:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(26, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 16:20:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(27, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 16:21:01', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(28, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 16:32:15', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(29, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 16:33:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(30, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-22 16:33:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(31, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-22 16:52:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(32, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 09:15:24', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(33, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 09:47:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(34, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-23 09:47:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(35, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-23 09:55:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(36, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 09:55:14', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(37, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 10:07:32', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(38, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-23 10:07:35', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(39, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-23 10:11:08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(40, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 10:11:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(41, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 10:50:10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(42, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-23 10:50:13', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(43, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-23 10:50:39', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(44, 4, 'Login', 'Ha iniciado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-02-23 10:50:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(45, 4, 'Login', 'Ha cerrado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-02-23 10:51:24', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(46, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 10:51:27', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(47, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 12:00:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(48, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-23 15:51:23', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(49, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-24 09:03:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(50, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-24 09:36:39', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(51, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-24 09:36:46', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(52, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-24 11:12:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(53, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-24 11:12:41', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(54, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-24 11:14:01', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(55, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-24 11:14:04', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(56, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-24 11:14:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(57, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-24 11:14:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(58, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-24 11:15:22', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(59, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-24 11:15:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(60, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-24 11:20:30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(61, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-24 11:20:33', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(62, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-24 15:17:45', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(63, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-24 15:17:53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(64, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-24 15:40:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(65, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-24 15:40:45', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(66, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 08:55:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(67, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 09:40:04', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(68, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 09:42:16', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(69, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:10:15', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(70, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:10:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(71, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:22:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(72, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 10:22:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(73, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 10:36:35', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(74, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:36:38', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(75, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:43:59', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(76, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 10:44:03', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(77, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 10:49:26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(78, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:49:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(79, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:52:10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(80, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 10:52:15', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(81, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 10:53:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(82, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 10:53:28', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(83, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 11:31:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(84, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '192.168.2.0', '2016-02-25 14:48:18', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:44.0) Gecko/44.0 Firefox/44.0 - Tablet', NULL),
(85, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:24:50', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(86, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:24:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(87, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:24:56', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(88, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:25:03', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(89, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:25:41', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(90, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:25:45', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(91, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:25:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(92, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:26:03', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(93, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:31:41', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(94, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:31:44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(95, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:41:20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(96, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:41:24', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(97, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:43:30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(98, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:43:35', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(99, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:43:43', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(100, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 16:43:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(101, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 16:44:00', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(102, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:44:03', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(103, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:44:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(104, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 16:44:49', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(105, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 16:45:15', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(106, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:45:19', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(107, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-25 16:49:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(108, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:49:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(109, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-25 16:49:29', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(110, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-25 16:49:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(111, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-29 08:55:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(112, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-29 08:59:19', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(113, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-29 08:59:23', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(114, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-29 09:31:26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(115, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-29 09:31:30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(116, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-29 09:32:18', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(117, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-29 09:32:24', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(118, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-02-29 09:32:39', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(119, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-29 09:32:44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(120, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-02-29 11:55:30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(121, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-02-29 14:21:44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(122, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-03-02 15:30:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(123, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-03-02 15:53:01', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(124, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-03-02 15:53:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(125, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-03-08 10:45:56', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(126, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-03-08 10:46:29', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(127, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-03-08 10:46:32', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(128, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-03-09 09:47:46', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0 - Computer', NULL),
(129, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-03-28 13:23:28', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(130, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-04-14 16:02:43', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(131, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-04-14 16:21:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(132, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-14 16:21:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(133, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-14 16:38:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(134, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-04-14 16:38:41', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(135, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-15 14:21:28', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(136, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-15 15:00:05', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(137, NULL, 'Login', 'Ha cerrado sesion el usuario: ', 'Reserved', '127.0.0.1', '2016-04-15 15:00:10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(138, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-20 16:23:12', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(139, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-21 09:33:01', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(140, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-21 14:41:00', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(141, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-21 14:41:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(142, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-25 10:32:32', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(143, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-26 09:52:21', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(144, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-26 09:59:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(145, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-04-26 09:59:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(146, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-04-26 11:21:43', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(147, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-26 11:21:46', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(148, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-26 15:48:20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(149, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-27 09:04:35', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(150, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-27 09:39:35', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(151, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-28 11:02:15', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(152, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-04-28 14:42:40', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(153, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-02 09:55:33', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(154, NULL, 'Login', 'Ha cerrado sesion el usuario: ', 'Reserved', '127.0.0.1', '2016-05-02 16:19:32', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(155, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-02 16:19:39', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0 - Computer', NULL),
(156, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-03 09:42:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(157, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-06 10:11:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(158, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-09 08:54:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(159, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-10 11:10:26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(160, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-11 10:20:48', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(161, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-11 11:50:48', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(162, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-11 11:50:51', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(163, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-11 11:51:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(164, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-11 11:51:06', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(165, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-11 12:04:09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(166, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-11 13:28:09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(167, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 09:44:30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(168, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 10:25:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(169, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:25:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(170, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:26:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(171, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:26:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(172, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:27:00', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(173, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 10:27:16', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(174, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 10:36:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(175, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:36:06', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(176, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:36:16', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(177, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 10:36:20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(178, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 10:41:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(179, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:41:30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(180, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 10:42:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(181, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 10:42:12', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(182, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 14:08:41', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(183, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 14:08:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(184, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:01:44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(185, 6, 'Login', 'Ha iniciado sesion el usuario: soportetfhka', 'Reserved', '127.0.0.1', '2016-05-12 15:01:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(186, 6, 'Login', 'Ha cerrado sesion el usuario: soportetfhka', 'Reserved', '127.0.0.1', '2016-05-12 15:03:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(187, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 15:03:31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(188, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 15:13:05', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(189, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 15:13:09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(190, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 15:13:20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(191, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-12 15:13:32', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(192, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:13:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(193, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:13:44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(194, 4, 'Login', 'Ha iniciado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:13:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(195, 4, 'Login', 'Ha cerrado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:14:08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(196, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:14:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(197, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:14:33', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(198, 4, 'Login', 'Ha iniciado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:14:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(199, 4, 'Login', 'Ha cerrado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:15:37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(200, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:15:40', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(201, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:15:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(202, 4, 'Login', 'Ha iniciado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:15:58', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(203, 4, 'Login', 'Ha cerrado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:25:59', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(204, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:26:04', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(205, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:27:26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(206, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:28:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(207, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:29:20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(208, 4, 'Login', 'Ha iniciado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:29:24', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(209, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 15:34:04', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(210, 4, 'Login', 'Ha cerrado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-12 15:38:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(211, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 15:39:16', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(212, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-12 15:40:14', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(213, 6, 'Login', 'Ha iniciado sesion el usuario: soportetfhka', 'Reserved', '127.0.0.1', '2016-05-12 15:40:16', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(214, 6, 'Login', 'Ha cerrado sesion el usuario: soportetfhka', 'Reserved', '127.0.0.1', '2016-05-12 16:52:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(215, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-12 16:52:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(216, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 09:44:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(217, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 09:54:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(218, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 09:55:02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(219, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 09:55:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(220, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 09:55:45', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(221, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 10:03:11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(222, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-13 10:03:19', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(223, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-13 10:12:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(224, 7, 'Login', 'Ha iniciado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 10:12:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(225, 7, 'Login', 'Ha iniciado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 10:16:50', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(226, 7, 'Login', 'Ha cerrado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 10:42:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(227, 7, 'Login', 'Ha iniciado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 10:43:03', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(228, 7, 'Login', 'Ha cerrado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 11:05:34', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(229, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 11:05:36', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(230, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 13:30:19', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(231, 7, 'Login', 'Ha iniciado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 13:30:25', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(232, 7, 'Login', 'Ha cerrado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 13:30:29', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(233, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 13:30:33', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(234, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 14:00:13', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(235, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 14:00:16', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(236, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 14:02:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(237, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-13 14:02:58', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(238, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-13 14:05:12', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(239, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 14:05:15', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(240, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 14:12:55', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(241, 4, 'Login', 'Ha iniciado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-13 14:13:05', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(242, 4, 'Login', 'Ha cerrado sesion el usuario: rmartinez', 'Reserved', '127.0.0.1', '2016-05-13 14:26:22', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(243, 7, 'Login', 'Ha iniciado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 14:26:26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(244, NULL, 'Login', 'Ha cerrado sesion el usuario: ', 'Reserved', '127.0.0.1', '2016-05-13 14:26:40', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL);
INSERT INTO `logs` (`id`, `user_id`, `modulo`, `activity`, `country`, `ip`, `date`, `device`, `description`) VALUES
(245, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-13 14:26:44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(246, 7, 'Login', 'Ha cerrado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 15:05:23', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(247, 7, 'Login', 'Ha iniciado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 15:05:27', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(248, 7, 'Login', 'Ha cerrado sesion el usuario: jramirez', 'Reserved', '127.0.0.1', '2016-05-13 15:32:09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(249, 10, 'Login', 'Ha iniciado sesion el usuario: icalderon', 'Reserved', '127.0.0.1', '2016-05-13 15:34:18', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(250, 10, 'Login', 'Ha cerrado sesion el usuario: icalderon', 'Reserved', '127.0.0.1', '2016-05-13 16:16:38', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(251, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 16:16:41', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(252, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-13 16:17:04', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(253, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-05-13 16:17:08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(254, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-16 09:20:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(255, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-16 13:36:23', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(256, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-16 13:45:45', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(257, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-16 13:45:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(258, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-18 14:06:51', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(259, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-25 16:06:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(260, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-26 08:40:40', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(261, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-26 09:03:17', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(262, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-26 09:03:22', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(263, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-26 09:52:42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(264, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-26 10:05:10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(265, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-05-26 10:10:54', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(266, 3, 'Login', 'Ha iniciado sesion el usuario: lvielma', 'Reserved', '127.0.0.1', '2016-05-26 10:10:57', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(267, 3, 'Login', 'Ha cerrado sesion el usuario: lvielma', 'Reserved', '127.0.0.1', '2016-05-26 10:18:07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(268, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-05-26 10:18:28', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(269, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-06-02 08:57:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(270, 2, 'Login', 'Ha cerrado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-06-02 09:08:23', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(271, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-06-02 09:08:27', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(272, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-06-02 09:08:40', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(273, 5, 'Login', 'Ha iniciado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-06-02 09:08:47', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(274, 5, 'Login', 'Ha cerrado sesion el usuario: jzerpa', 'Reserved', '127.0.0.1', '2016-06-02 09:10:52', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(275, 1, 'Login', 'Ha iniciado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-06-02 09:10:55', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(276, 1, 'Login', 'Ha cerrado sesion el usuario: gsanchez1687', 'Reserved', '127.0.0.1', '2016-06-02 09:11:14', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(277, 6, 'Login', 'Ha iniciado sesion el usuario: soportetfhka', 'Reserved', '127.0.0.1', '2016-06-02 09:11:19', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(278, 6, 'Login', 'Ha cerrado sesion el usuario: soportetfhka', 'Reserved', '127.0.0.1', '2016-06-02 09:13:59', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL),
(279, 2, 'Login', 'Ha iniciado sesion el usuario: ggomez', 'Reserved', '127.0.0.1', '2016-06-02 09:14:06', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0 - Computer', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `icon` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `position` tinyint(1) NOT NULL,
  `url` text COLLATE utf8_spanish_ci,
  `category` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL,
  `module` tinytext COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `position`, `url`, `category`, `active`, `parent`, `module`) VALUES
(1, 'Roles', '', 1, 'menus/index', 'main', 1, 1, 'menus'),
(2, 'Users', '', 2, 'menus/rolesitems', 'main', 1, 1, 'menus'),
(5, 'Cas', '', 3, 'cas/admin', 'main', 1, 1, 'CAS'),
(6, 'warranties', '', 4, 'warranties/admin', 'main', 1, 1, 'warranties'),
(7, 'distributors', '', 5, 'distributors/admin', 'main', 1, 1, 'distributors'),
(8, 'logs', '', 6, 'logs/admin', 'main', 1, 1, 'Logs'),
(9, 'devices', '', 7, 'devices/admin', 'main', 1, 1, 'devices'),
(10, 'requests', '', 8, 'requests/admin', 'main', 1, 1, 'requests'),
(11, 'failures', '', 9, 'failures/admin', 'main', 1, 1, 'failures'),
(12, 'filesPolls', '', 10, 'filesPolls/admin', 'main', 1, 1, 'filesPolls');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `models`
--

INSERT INTO `models` (`id`, `name`, `active`) VALUES
(1, 'TALLY DASCOM DL-210', 1),
(2, 'TALLY DASCOM DM-320', 1),
(3, 'TALLY DASCOM DT-320', 1),
(4, 'TALLY DASCOM 1125', 1),
(5, 'TALLY DASCOM 1225', 1),
(6, 'TALLY DASCOM 1440', 1),
(7, 'TALLY MIP480 Móvil', 1),
(8, 'TALLY DASCOM DP580 Móvil', 1),
(9, 'TALLY DASCOM DP520 Móvil', 1),
(10, 'TALLY DASCOM DP540 Móvil', 1),
(11, 'TALLY DASCOM DP530 Móvil', 1),
(12, 'TALLY DASCOM 1500', 1),
(13, 'TALLY DASCOM 2600', 1),
(14, 'TALLY DASCOM 2610', 1),
(15, '7206', 1),
(16, '2365', 1),
(17, '2380', 1),
(18, '2265+', 1),
(19, '2280+', 1),
(20, '5040', 1),
(21, 'P2506W', 1),
(22, 'HKA80', 1),
(23, 'HKA57', 1),
(24, 'CR6X', 1),
(26, 'LS2X', 1),
(27, 'OS2X', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reason_returns`
--

CREATE TABLE `reason_returns` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `specification` text COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Razon de la devolucion';

--
-- Volcado de datos para la tabla `reason_returns`
--

INSERT INTO `reason_returns` (`id`, `name`, `specification`, `active`) VALUES
(1, 'Dead on Arrival (DOA)', '', 1),
(2, 'Falla del equipo, por favor indique', '', 1),
(3, 'Otro, por favor especifique', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `failure_id` int(11) NOT NULL,
  `warranty_id` int(11) NOT NULL,
  `cas_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tracking` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `comments` text COLLATE utf8_spanish_ci,
  `date_initial` datetime DEFAULT NULL,
  `date_final` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `requests`
--

INSERT INTO `requests` (`id`, `failure_id`, `warranty_id`, `cas_id`, `status`, `tracking`, `transport_id`, `comments`, `date_initial`, `date_final`) VALUES
(1, 73, 1, 4, 0, NULL, 6, NULL, '2016-02-22 16:23:02', '2016-02-22 16:23:02'),
(2, 74, 1, 4, 1, NULL, 6, NULL, '2016-02-22 16:23:02', '2016-02-25 16:45:04'),
(3, 72, 2, 4, 1, NULL, 6, NULL, '2016-02-25 10:14:34', '2016-02-25 16:44:55'),
(4, 73, 2, 4, 1, NULL, 6, NULL, '2016-02-25 10:14:34', '2016-02-25 16:38:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `description`, `name`, `active`) VALUES
(1, 'Administrador', 'Administrador', 1),
(2, 'Ventas TFHKA', 'Ventas TFHKA', 1),
(3, 'CAS', 'CAS', 1),
(4, 'Técnico CAS', 'Técnico CAS', 1),
(5, 'Distribuidor', 'Distribuidor', 1),
(6, 'Supervisor CAS', 'Supervisor CAS', 1),
(7, 'Soporte TFHKA', 'Soporte TFHKA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_items`
--

CREATE TABLE `roles_items` (
  `id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles_items`
--

INSERT INTO `roles_items` (`id`, `rol_id`, `item_id`, `active`) VALUES
(1, 1, 3, 1),
(2, 1, 4, 0),
(3, 1, 5, 0),
(4, 1, 6, 0),
(5, 1, 8, 0),
(6, 1, 7, 0),
(7, 1, 10, 0),
(8, 1, 9, 0),
(9, 1, 11, 1),
(10, 1, 13, 1),
(11, 1, 12, 0),
(12, 5, 13, 0),
(13, 5, 11, 1),
(14, 1, 14, 0),
(15, 1, 15, 0),
(16, 1, 16, 1),
(17, 1, 17, 0),
(18, 1, 18, 0),
(19, 3, 15, 1),
(20, 3, 14, 1),
(21, 3, 16, 0),
(22, 5, 12, 1),
(23, 5, 17, 1),
(24, 5, 18, 1),
(25, 1, 19, 0),
(26, 3, 19, 1),
(27, 1, 20, 1),
(28, 4, 22, 0),
(29, 4, 21, 0),
(30, 4, 23, 0),
(31, 1, 22, 0),
(32, 1, 21, 0),
(33, 1, 23, 0),
(34, 3, 22, 0),
(35, 3, 21, 0),
(36, 1, 24, 0),
(37, 1, 25, 0),
(38, 2, 17, 1),
(39, 1, 26, 1),
(40, 3, 28, 1),
(41, 3, 27, 1),
(42, 3, 23, 0),
(43, 3, 29, 1),
(44, 3, 18, 1),
(45, 3, 30, 1),
(46, 3, 31, 0),
(47, 1, 33, 1),
(48, 1, 35, 1),
(49, 1, 34, 1),
(50, 1, 32, 1),
(51, 3, 24, 0),
(52, 4, 24, 0),
(53, 6, 4, 0),
(54, 6, 6, 0),
(55, 6, 7, 0),
(56, 6, 26, 1),
(57, 6, 16, 1),
(58, 6, 30, 1),
(59, 6, 19, 1),
(60, 6, 28, 1),
(61, 6, 27, 1),
(62, 6, 22, 0),
(63, 6, 37, 0),
(64, 6, 29, 0),
(65, 6, 31, 0),
(66, 4, 29, 0),
(67, 4, 36, 0),
(68, 6, 36, 0),
(69, 3, 36, 0),
(70, 6, 38, 1),
(71, 7, 16, 1),
(72, 7, 27, 1),
(73, 4, 16, 1),
(74, 4, 27, 1),
(75, 1, 28, 1),
(76, 1, 27, 1),
(77, 4, 30, 1),
(78, 4, 28, 1),
(79, 4, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `active`) VALUES
(1, 'Trinidad', 1),
(2, 'Sucre', 1),
(4, 'Cochabamba', 1),
(5, 'La Paz', 1),
(6, 'Oruro', 1),
(7, 'Duarte', 1),
(8, 'Cobija', 1),
(9, 'Santa Cruz de la Sierra', 1),
(10, 'Tarija', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `active`) VALUES
(1, 'En revision', 1),
(2, 'Por aprobar CAS', 1),
(3, 'Por aprobar TFHKA', 1),
(4, 'Cerrado', 1),
(5, 'Aprobado TFHKA', 1),
(6, 'Pendiente Pago', 1),
(7, 'Anulado', 1),
(8, 'Mejorar Diagnóstico', 1),
(9, 'Pendiente pago', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transports`
--

CREATE TABLE `transports` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `transports`
--

INSERT INTO `transports` (`id`, `name`, `active`) VALUES
(1, 'FedEx', 1),
(2, 'DHL Express', 1),
(5, 'DIRECTA (TFHKA)', 1),
(6, 'Sin asignar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone_local` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `phone_personal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `cas_id` int(11) DEFAULT NULL COMMENT 'A cual CAS pertenece',
  `distributor_id` int(11) DEFAULT NULL,
  `branche_id` int(11) DEFAULT NULL COMMENT 'Sucursales del CAS',
  `representative` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `email`, `file`, `phone_local`, `phone_personal`, `rol_id`, `cas_id`, `distributor_id`, `branche_id`, `representative`, `address`, `status`, `last_login`, `created`, `modified`) VALUES
(1, 'gsanchez1687', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'Guillermo', 'Sanchez', 'gsanchez1687@gmail.com', 'Guillermo.jpg', '02126879867', '04142677404', 1, NULL, NULL, NULL, NULL, 'Caracas', 1, '2024-02-09 16:40:35', '2016-02-22 00:00:00', '2016-02-22 11:19:15'),
(2, 'ggomez', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'Gabriel Gomez', 'gomez', 'ggomez@thefactoryhka.com', 'Gabriel Gomez.jpg', '11111111', '55555555', 3, 4, NULL, NULL, NULL, '', 1, '2024-02-08 23:56:42', '2016-02-22 15:00:28', '2016-02-22 15:49:03'),
(3, 'lvielma', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'Liz Vielma', '', 'lvielma@thefactoryhka.com', NULL, '55555', '111111', 5, NULL, 1, NULL, NULL, 'Mexico CA', 1, '2016-05-26 10:10:57', '2016-02-22 16:06:28', '2016-02-22 16:07:17'),
(4, 'rmartinez', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'Ricober', 'Martinez', 'rmartinez@thefactoryhka.com', 'Ricober.jpg', '55555', '111111', 4, 4, NULL, NULL, NULL, 'Chicacoa', 1, '2016-05-13 14:13:05', NULL, '2016-02-23 10:49:57'),
(5, 'jzerpa', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'Johan ', 'Zerpa', 'jzerpa@thefactoryhka.com', NULL, '43453454', '34534545435', 6, 4, NULL, NULL, NULL, 'caracas', 1, '2016-06-02 09:08:47', NULL, '2016-04-14 16:38:52'),
(6, 'soportetfhka', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'soportetfhka', 'soportetfhka', 'soportetfhka@gmail.com', 'soportetfhka.jpg', '51561561561', '5615615615615', 7, NULL, NULL, NULL, NULL, 'soportetfhka', 1, '2016-06-02 09:11:19', '2016-05-12 14:13:16', '2016-05-12 14:13:16'),
(7, 'jramirez', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'jenny', 'ramirez', 'jramirez@gmail.com', NULL, '3215156156156', '515615615615', 3, NULL, NULL, NULL, NULL, 'caracas', 1, '2016-05-13 15:05:27', '2016-05-13 10:08:33', '2016-05-13 10:08:33'),
(10, 'icalderon', '0ecd46e80f2fc6385fd9f1c956bd01f72463f1fb', 'isa', 'calderon', 'icalderon@gmail.com', NULL, '551561561', '515615', 4, 7, NULL, NULL, NULL, 'caracas', 1, '2016-05-13 15:34:18', NULL, '2016-05-13 15:34:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_roles_items`
--

CREATE TABLE `users_roles_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rol_item_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users_roles_items`
--

INSERT INTO `users_roles_items` (`id`, `user_id`, `rol_item_id`, `active`) VALUES
(39, 3, 13, 1),
(40, 3, 22, 1),
(41, 3, 23, 1),
(42, 3, 24, 1),
(113, 2, 19, 1),
(114, 2, 20, 1),
(115, 2, 45, 1),
(116, 2, 26, 1),
(117, 2, 40, 1),
(118, 2, 41, 1),
(119, 2, 44, 1),
(120, 2, 43, 1),
(121, 2, 46, 1),
(122, 2, 69, 1),
(136, 5, 53, 1),
(137, 5, 54, 1),
(138, 5, 55, 1),
(139, 5, 56, 1),
(140, 5, 58, 1),
(141, 5, 59, 1),
(142, 5, 70, 1),
(143, 5, 60, 1),
(144, 5, 61, 1),
(145, 5, 62, 1),
(146, 5, 63, 1),
(147, 5, 64, 1),
(148, 5, 65, 1),
(149, 5, 68, 1),
(150, 4, 73, 1),
(151, 4, 74, 1),
(152, 4, 29, 1),
(153, 4, 30, 1),
(155, 6, 71, 1),
(156, 6, 72, 1),
(157, 1, 1, 1),
(158, 1, 47, 1),
(159, 1, 10, 1),
(160, 1, 48, 1),
(161, 1, 49, 1),
(162, 1, 50, 1),
(163, 1, 51, 1),
(164, 1, 5, 1),
(165, 1, 3, 1),
(166, 1, 2, 1),
(167, 1, 7, 1),
(168, 1, 8, 1),
(169, 1, 4, 1),
(170, 1, 6, 1),
(171, 1, 39, 1),
(172, 1, 16, 1),
(173, 1, 75, 1),
(174, 1, 76, 1),
(175, 1, 9, 1),
(176, 1, 27, 1),
(177, 1, 11, 1),
(178, 1, 31, 1),
(179, 1, 32, 1),
(180, 1, 33, 1),
(181, 1, 36, 1),
(182, 1, 37, 1),
(185, 7, 19, 1),
(186, 7, 20, 1),
(187, 7, 45, 1),
(188, 7, 41, 1),
(197, 10, 73, 1),
(198, 10, 77, 1),
(199, 10, 79, 1),
(200, 10, 78, 1),
(201, 10, 74, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warranties`
--

CREATE TABLE `warranties` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `cas_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `file` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `product_open` tinyint(1) DEFAULT NULL COMMENT 'producto abierto',
  `disposition_id` int(11) DEFAULT NULL,
  `reason_return_id` int(11) DEFAULT NULL,
  `specification` text COLLATE utf8_spanish_ci,
  `date_customer_complaint` date DEFAULT NULL COMMENT 'fecha reclamo cliente',
  `claim_date_cas` date DEFAULT NULL COMMENT 'fecha reclamo cas',
  `hour_service` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `technical_id` int(11) DEFAULT NULL,
  `observation` text COLLATE utf8_spanish_ci NOT NULL,
  `statu_id` int(11) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Reclamacion de Garantias';

--
-- Volcado de datos para la tabla `warranties`
--

INSERT INTO `warranties` (`id`, `code`, `name`, `customer_id`, `cas_id`, `device_id`, `file`, `product_open`, `disposition_id`, `reason_return_id`, `specification`, `date_customer_complaint`, `claim_date_cas`, `hour_service`, `technical_id`, `observation`, `statu_id`, `created`) VALUES
(1, 'RMA-BOL-20160001', '4', 1, 2, 44, NULL, NULL, 1, 2, NULL, '2016-02-22', '2016-05-12', '1', NULL, 'nada', 9, '2016-02-22'),
(2, 'RMA-BOL-20160002', '4', 1, 4, 1, NULL, NULL, 1, 2, NULL, '2016-02-25', '2016-05-13', '1', 4, 'dsdvfdv', 8, '2016-02-25'),
(3, 'RMA-BOL-20160003', '4', 1, 2, 10, NULL, NULL, 1, 2, NULL, '2016-04-25', '2016-05-12', '1', NULL, 'segunda prueba 24', 9, '2016-04-25'),
(4, 'RMA-BOL-20160004', '7', 1, 7, 8, NULL, NULL, 2, 2, NULL, '2016-05-13', '2016-05-13', '1', 7, 'fallas', 1, '2016-05-13'),
(5, 'RMA-BOL-20160005', '4', 1, 4, 15, NULL, NULL, 1, 2, NULL, '2016-06-02', '2016-06-02', '1', NULL, 'trtytyttr', 5, '2016-06-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warranties_devices`
--

CREATE TABLE `warranties_devices` (
  `id` int(11) NOT NULL,
  `warranty_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `warranties_devices`
--

INSERT INTO `warranties_devices` (`id`, `warranty_id`, `device_id`) VALUES
(1, 1, 44),
(2, 2, 1),
(3, 3, 10),
(4, 3, 10),
(5, 3, 10),
(6, 3, 10),
(7, 3, 10),
(8, 3, 10),
(9, 3, 10),
(10, 3, 10),
(11, 3, 10),
(12, 3, 10),
(13, 3, 10),
(14, 3, 10),
(15, 3, 10),
(16, 3, 10),
(17, 3, 10),
(18, 3, 10),
(19, 3, 10),
(20, 3, 10),
(21, 3, 10),
(22, 3, 10),
(23, 3, 10),
(24, 3, 10),
(25, 3, 10),
(26, 3, 10),
(27, 3, 10),
(28, 3, 10),
(29, 3, 10),
(30, 3, 10),
(31, 3, 10),
(32, 3, 10),
(33, 3, 10),
(34, 3, 10),
(35, 3, 10),
(36, 3, 10),
(37, 3, 10),
(38, 3, 10),
(39, 3, 10),
(40, 3, 10),
(41, 3, 10),
(42, 2, 1),
(43, 2, 1),
(44, 2, 1),
(45, 2, 1),
(46, 1, 44),
(47, 3, 10),
(48, 3, 10),
(49, 3, 10),
(50, 3, 10),
(51, 3, 10),
(52, 3, 10),
(53, 3, 10),
(54, 3, 10),
(55, 3, 10),
(56, 3, 10),
(57, 3, 10),
(58, 3, 10),
(59, 3, 10),
(60, 2, 1),
(61, 1, 44),
(62, 3, 10),
(63, 2, 1),
(64, 3, 10),
(65, 2, 1),
(66, 1, 44),
(67, 2, 1),
(68, 4, 8),
(69, 2, 1),
(70, 5, 15),
(71, 5, 15),
(72, 5, 15),
(73, 5, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `accessorie_warranties`
--
ALTER TABLE `accessorie_warranties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accessorie_id` (`accessorie_id`),
  ADD KEY `warranty_id` (`warranty_id`);

--
-- Indices de la tabla `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cas_id` (`cas_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cas`
--
ALTER TABLE `cas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributor_id` (`distributor_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indices de la tabla `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `failures`
--
ALTER TABLE `failures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indices de la tabla `failures_warranties`
--
ALTER TABLE `failures_warranties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failure_id` (`failure_id`),
  ADD KEY `warranty_id` (`warranty_id`);

--
-- Indices de la tabla `files_polls`
--
ALTER TABLE `files_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warranty_id` (`warranty_id`);

--
-- Indices de la tabla `files_warranties`
--
ALTER TABLE `files_warranties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warranty_id` (`warranty_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_id` (`user_id`) USING BTREE;

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `reason_returns`
--
ALTER TABLE `reason_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failure_id` (`failure_id`),
  ADD KEY `warranty_id` (`warranty_id`),
  ADD KEY `cas_id` (`cas_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_items`
--
ALTER TABLE `roles_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `cas_id` (`cas_id`) USING BTREE,
  ADD KEY `branche_id` (`branche_id`),
  ADD KEY `distributor_id` (`distributor_id`);

--
-- Indices de la tabla `users_roles_items`
--
ALTER TABLE `users_roles_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_item_id` (`rol_item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `reason_return_id` (`reason_return_id`),
  ADD KEY `disposition_id` (`disposition_id`),
  ADD KEY `cas_id` (`cas_id`),
  ADD KEY `technical_id` (`technical_id`),
  ADD KEY `statu_id` (`statu_id`);

--
-- Indices de la tabla `warranties_devices`
--
ALTER TABLE `warranties_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warranty_id` (`warranty_id`),
  ADD KEY `device_id` (`device_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `accessorie_warranties`
--
ALTER TABLE `accessorie_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cas`
--
ALTER TABLE `cas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failures`
--
ALTER TABLE `failures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `failures_warranties`
--
ALTER TABLE `failures_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `files_polls`
--
ALTER TABLE `files_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_warranties`
--
ALTER TABLE `files_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `reason_returns`
--
ALTER TABLE `reason_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles_items`
--
ALTER TABLE `roles_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users_roles_items`
--
ALTER TABLE `users_roles_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `warranties`
--
ALTER TABLE `warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `warranties_devices`
--
ALTER TABLE `warranties_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accessorie_warranties`
--
ALTER TABLE `accessorie_warranties`
  ADD CONSTRAINT `accessorie_warranties_ibfk_1` FOREIGN KEY (`accessorie_id`) REFERENCES `accessories` (`id`),
  ADD CONSTRAINT `accessorie_warranties_ibfk_2` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`);

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Filtros para la tabla `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`distributor_id`) REFERENCES `distributors` (`id`),
  ADD CONSTRAINT `devices_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `devices_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `devices_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `devices_ibfk_5` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`);

--
-- Filtros para la tabla `failures`
--
ALTER TABLE `failures`
  ADD CONSTRAINT `failures_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `failures_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`);

--
-- Filtros para la tabla `failures_warranties`
--
ALTER TABLE `failures_warranties`
  ADD CONSTRAINT `failures_warranties_ibfk_1` FOREIGN KEY (`failure_id`) REFERENCES `failures` (`id`),
  ADD CONSTRAINT `failures_warranties_ibfk_2` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`);

--
-- Filtros para la tabla `files_polls`
--
ALTER TABLE `files_polls`
  ADD CONSTRAINT `files_polls_ibfk_1` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`);

--
-- Filtros para la tabla `files_warranties`
--
ALTER TABLE `files_warranties`
  ADD CONSTRAINT `files_warranties_ibfk_1` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`failure_id`) REFERENCES `failures` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`cas_id`) REFERENCES `cas` (`id`);

--
-- Filtros para la tabla `roles_items`
--
ALTER TABLE `roles_items`
  ADD CONSTRAINT `roles_items_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `roles_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `users_roles_items`
--
ALTER TABLE `users_roles_items`
  ADD CONSTRAINT `users_roles_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_roles_items_ibfk_2` FOREIGN KEY (`rol_item_id`) REFERENCES `roles_items` (`id`);

--
-- Filtros para la tabla `warranties`
--
ALTER TABLE `warranties`
  ADD CONSTRAINT `warranties_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `warranties_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`),
  ADD CONSTRAINT `warranties_ibfk_4` FOREIGN KEY (`disposition_id`) REFERENCES `dispositions` (`id`),
  ADD CONSTRAINT `warranties_ibfk_5` FOREIGN KEY (`reason_return_id`) REFERENCES `reason_returns` (`id`),
  ADD CONSTRAINT `warranties_ibfk_6` FOREIGN KEY (`statu_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `warranties_ibfk_7` FOREIGN KEY (`cas_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `warranties_devices`
--
ALTER TABLE `warranties_devices`
  ADD CONSTRAINT `warranties_devices_ibfk_1` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`),
  ADD CONSTRAINT `warranties_devices_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
