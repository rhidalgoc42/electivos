-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2015 a las 09:08:18
-- Versión del servidor: 5.5.42-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `etutorcl_altius`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE IF NOT EXISTS `colegio` (
  `id_col` int(11) NOT NULL AUTO_INCREMENT,
  `desc_col` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_col`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`id_col`, `desc_col`) VALUES
(1, 'M'),
(2, 'F'),
(3, 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_cur` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel` int(11) NOT NULL,
  `desc_cur` text COLLATE utf8_spanish_ci NOT NULL,
  `id_col` int(11) NOT NULL,
  `est_cur` int(11) NOT NULL,
  PRIMARY KEY (`id_cur`),
  KEY `id_nivel` (`id_nivel`),
  KEY `id_col` (`id_col`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_cur`, `id_nivel`, `desc_cur`, `id_col`, `est_cur`) VALUES
(1, 10, 'IIA', 1, 1),
(2, 10, 'IIB', 1, 1),
(3, 10, 'IIC', 1, 1),
(4, 10, 'IID', 1, 1),
(5, 11, 'IIIA', 1, 1),
(6, 11, 'IIIB', 1, 1),
(7, 11, 'IIIC', 1, 1),
(8, 11, 'IIID', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electivo`
--

CREATE TABLE IF NOT EXISTS `electivo` (
  `id_elect` int(11) NOT NULL AUTO_INCREMENT,
  `id_plan` int(11) NOT NULL,
  `desc_elect` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nhora_elect` int(11) NOT NULL,
  `oblig_elect` tinyint(1) NOT NULL,
  `plcomp_elect` tinyint(1) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `cupo_elect` int(11) NOT NULL,
  `prof_elect` varchar(80) CHARACTER SET latin1 NOT NULL,
  `id_col` int(1) NOT NULL,
  `ruta_arch_elect` varchar(120) CHARACTER SET latin1 NOT NULL,
  `est_elect` int(11) NOT NULL,
  PRIMARY KEY (`id_elect`),
  KEY `id_plan` (`id_plan`),
  KEY `id_nivel` (`id_nivel`),
  KEY `id_col` (`id_col`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `electivo`
--

INSERT INTO `electivo` (`id_elect`, `id_plan`, `desc_elect`, `nhora_elect`, `oblig_elect`, `plcomp_elect`, `id_nivel`, `cupo_elect`, `prof_elect`, `id_col`, `ruta_arch_elect`, `est_elect`) VALUES
(1, 1, 'Estudio Retrospectivo de la Identidad Chilena', 3, 1, 1, 10, 60, 'Francisco Rojas, Nicolás Salgado \r\n', 1, '../archivos/Programa_ElectivoIII_EstudioRetrospectivo.pdf', 1),
(2, 1, 'Literatura e Identidad', 2, 0, 1, 10, 28, 'Mario Carrasco', 1, '../archivos/Programa_ElectivoIII_LiteraturaIdentidad.pdf', 1),
(3, 4, 'Cultura e Identidad en la Literatura Inglesa', 2, 0, 0, 10, 28, 'Hugo Cortés', 1, '../archivos/Programa_ElectivoIII_English.pdf', 1),
(4, 4, 'Herramienta de Productividad y Diseño web', 2, 0, 0, 10, 28, 'Roberto Hidalgo', 1, '../archivos/Programa_ElectivoIII_HerramientaProduct_DisWeb.pdf', 1),
(5, 4, 'Diseño I', 2, 0, 0, 10, 12, 'Daniela Jara', 1, '../archivos/Programa_ ElectivoIII_DisenoyArq.pdf', 1),
(6, 2, 'Ecología y Medio Ambiente', 3, 1, 1, 10, 30, 'Daniela Retamales', 1, '../archivos/Programa_ElectivoIII_Biologia.pdf', 1),
(7, 2, 'Química 1', 2, 0, 1, 10, 30, 'Cristina Valenzuela ', 1, '../archivos/Programa_electivoIII_Quimica1.pdf', 1),
(8, 3, 'Álgebra y Modelos Analíticos', 3, 1, 1, 10, 60, 'María Jeldes, Felipe Aravena', 1, '../archivos/Programa_ElectivoIII_Algebra.pdf', 1),
(9, 3, 'Matemática Financiera', 2, 0, 1, 10, 60, 'María Jeldes, Pablo Comte', 1, '../archivos/Programa_ElectivoIII_MatematicaFinanciera.pdf', 1),
(10, 3, 'Mecánica / Física', 2, 0, 1, 10, 30, 'Paula Urrutia', 1, '../archivos/Programa_ElectivoIII_Mecanica.pdf', 1),
(11, 1, 'Literatura y Sociedad', 3, 1, 1, 11, 56, 'Marcos Cáceres, Felipe Yañez', 1, '../archivos/tablaselectivo.docx', 1),
(12, 1, 'Ciencias Sociales y Realidad Nacional', 2, 0, 1, 11, 60, 'Marcela Gutiérrez, Sebastián Pastén', 1, '../archivos/tablaselectivo.docx', 1),
(13, 4, 'Fundamentos de la Programación Computacional', 2, 0, 0, 11, 28, 'Roberto Hidalgo', 1, '../archivos/Programa_ElectivoIV_FundamentosProgramacion.pdf', 1),
(14, 4, 'Literatura y Cultura Norteamericana', 2, 0, 0, 11, 28, 'Paulina Zalduondo', 1, '../archivos/tablaselectivo.docx', 1),
(15, 4, 'Diseño y Arquitectura II', 2, 0, 0, 11, 12, 'Ignacia Gonzalez', 1, '../archivos/tablaselectivo.docx', 1),
(16, 2, 'Célula, Genoma y Organismo', 3, 1, 1, 11, 30, 'Karen Coindreau', 1, '../archivos/tablaselectivo.docx', 1),
(17, 2, 'Química 2', 2, 0, 1, 11, 30, 'Felipe Matus', 1, '../archivos/tablaselectivo.docx', 1),
(18, 3, 'Cálculo', 3, 1, 1, 11, 60, 'María Jeldes, Felipe Aravena', 1, '../archivos/tablaselectivo.docx', 1),
(19, 3, 'Termodinámica', 2, 0, 1, 11, 30, '', 1, '../archivos/tablaselectivo.docx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE IF NOT EXISTS `fecha` (
  `id_fecha` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_col` int(11) NOT NULL,
  PRIMARY KEY (`id_fecha`),
  KEY `id_col` (`id_col`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `fecha`, `id_col`) VALUES
(1, '2015-09-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `desc_niv` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `desc_niv`) VALUES
(10, 'Segundo medio'),
(11, 'Tercero Medio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `desc_plan` text COLLATE utf8_spanish_ci NOT NULL,
  `est_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id_plan`, `desc_plan`, `est_plan`) VALUES
(1, 'Humanista', 1),
(2, 'Científico', 1),
(3, 'Matemático', 1),
(4, 'Humanista-Científico-Matemático', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_electivo`
--

CREATE TABLE IF NOT EXISTS `s_electivo` (
  `id_elect_s` int(11) NOT NULL AUTO_INCREMENT,
  `id_plan` int(11) NOT NULL,
  `id_elect` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `id_cur` int(11) NOT NULL,
  `fech_elect_s` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_col` int(1) NOT NULL,
  `est_elect_s` int(11) NOT NULL,
  PRIMARY KEY (`id_elect_s`),
  KEY `id_plan` (`id_elect`,`id_usr`,`id_cur`),
  KEY `id_usr` (`id_usr`),
  KEY `id_cur` (`id_cur`),
  KEY `id_elect` (`id_elect`),
  KEY `id_col` (`id_col`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=573 ;

--
-- Volcado de datos para la tabla `s_electivo`
--

INSERT INTO `s_electivo` (`id_elect_s`, `id_plan`, `id_elect`, `id_usr`, `id_cur`, `fech_elect_s`, `id_col`, `est_elect_s`) VALUES
(523, 1, 1, 29, 3, '2015-08-21 17:02:01', 1, 1),
(524, 3, 9, 29, 3, '2015-08-21 17:02:02', 1, 1),
(525, 1, 1, 30, 3, '2015-08-23 19:04:56', 1, 1),
(526, 1, 2, 30, 3, '2015-08-23 19:04:56', 1, 1),
(527, 3, 8, 26, 3, '2015-08-24 13:47:24', 1, 1),
(528, 4, 3, 26, 3, '2015-08-24 13:47:24', 1, 1),
(529, 3, 8, 40, 3, '2015-08-24 22:10:16', 1, 1),
(530, 3, 10, 40, 3, '2015-08-24 22:10:16', 1, 1),
(535, 3, 8, 3, 3, '2015-08-28 16:17:22', 1, 1),
(536, 3, 9, 3, 3, '2015-08-28 16:17:22', 1, 1),
(537, 3, 8, 44, 3, '2015-08-28 16:17:27', 1, 1),
(538, 3, 9, 44, 3, '2015-08-28 16:17:27', 1, 1),
(539, 2, 6, 24, 3, '2015-09-03 16:02:53', 1, 1),
(540, 2, 7, 24, 3, '2015-09-03 16:02:53', 1, 1),
(541, 3, 8, 32, 3, '2015-09-03 21:07:39', 1, 1),
(542, 3, 9, 32, 3, '2015-09-03 21:07:39', 1, 1),
(547, 3, 18, 7, 6, '2015-09-25 11:40:18', 1, 1),
(548, 4, 13, 7, 6, '2015-09-25 11:40:18', 1, 1),
(549, 2, 6, 42, 3, '2015-09-25 15:37:38', 1, 1),
(550, 4, 3, 42, 3, '2015-09-25 15:37:38', 1, 1),
(551, 1, 1, 33, 3, '2015-09-25 16:48:00', 1, 1),
(552, 3, 9, 33, 3, '2015-09-25 16:48:00', 1, 1),
(553, 3, 8, 45, 3, '2015-09-25 16:48:00', 1, 1),
(554, 3, 9, 45, 3, '2015-09-25 16:48:00', 1, 1),
(555, 3, 8, 46, 3, '2015-09-25 16:48:11', 1, 1),
(556, 3, 9, 46, 3, '2015-09-25 16:48:11', 1, 1),
(557, 3, 8, 41, 3, '2015-09-25 16:48:20', 1, 1),
(558, 3, 9, 41, 3, '2015-09-25 16:48:20', 1, 1),
(559, 3, 8, 43, 3, '2015-09-25 16:49:49', 1, 1),
(560, 3, 9, 43, 3, '2015-09-25 16:49:49', 1, 1),
(561, 3, 8, 21, 3, '2015-09-25 16:50:07', 1, 1),
(562, 3, 9, 21, 3, '2015-09-25 16:50:07', 1, 1),
(563, 1, 1, 36, 3, '2015-09-25 16:50:47', 1, 1),
(564, 3, 10, 36, 3, '2015-09-25 16:50:47', 1, 1),
(565, 2, 6, 27, 3, '2015-09-25 16:51:52', 1, 1),
(566, 4, 3, 27, 3, '2015-09-25 16:51:52', 1, 1),
(567, 3, 8, 38, 3, '2015-09-25 16:52:33', 1, 1),
(568, 3, 9, 38, 3, '2015-09-25 16:52:33', 1, 1),
(569, 2, 6, 37, 3, '2015-09-25 16:53:42', 1, 1),
(570, 3, 9, 37, 3, '2015-09-25 16:53:42', 1, 1),
(571, 1, 1, 25, 3, '2015-09-25 16:55:32', 1, 1),
(572, 4, 5, 25, 3, '2015-09-25 16:55:32', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usr` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apelpat_usr` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apelmat_usr` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_cur` int(11) NOT NULL,
  `user_usr` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `clave_usr` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `email_usr` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `email_p_usr` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `email_m_usr` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `id_col` int(1) NOT NULL,
  `tipo_usr` int(1) NOT NULL,
  `est_usr` int(1) NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `nom_usr`, `apelpat_usr`, `apelmat_usr`, `id_nivel`, `id_cur`, `user_usr`, `clave_usr`, `email_usr`, `email_p_usr`, `email_m_usr`, `id_col`, `tipo_usr`, `est_usr`) VALUES
(2, 'Esteban', 'Hidalgo', 'Jara', 10, 1, 'est', 'c81e728d9d4c2f636f067f89cc14862c', 'estebanhidal11@gmail.com', 'r_hidalgo_c@hotmail.com', ' marzo22@hotmail.cl', 1, 2, 1),
(3, 'Andrés', 'Aliaga', 'Sánchez', 10, 3, 'anali', '3773849b878ef499b4e354594efab920', 'familiaaliagasanchez@gmail.com', 'aaliaga@inversat.cl', 'carolasanchezhurtado@gmail.com', 1, 2, 1),
(7, 'Gabriel', 'Hidalgo', 'González', 11, 6, 'gab', '8f14e45fceea167a5a36dedd4bea2543', 'estebanhidal11@gmail.com', 'r_hidalgo_c@hotmail.com', 'marzo22@hotmail.cl', 1, 2, 1),
(13, 'Mario', 'Carrasco', 'Avila', 0, 0, 'marcar', '66c47b17afb6adbfc10609494b1e4a98', 'mario.carrasco@colegioeverest.cl', 'mario.carrasco@colegioeverest.cl', 'mario.carrasco@colegioeverest.cl', 1, 1, 1),
(14, 'Marcela', 'Gutierrez', 'Marchant', 0, 0, 'margut', 'd8afe3ef145b4448408abd02ea3370a4', 'marcela.gutierrez@colegioeverest.cl', 'marcela.gutierrez@colegioeverest.cl', 'marcela.gutierrez@colegioeverest.cl', 1, 1, 1),
(15, 'Laura', 'Retamales', 'Neira', 0, 0, 'lauret', '5de66fe9f5c12efc1b2e601d484a7ba5', 'laura.retamales@colegioeverest.cl', 'laura.retamales@colegioeverest.cl', 'laura.retamales@colegioeverest.cl', 1, 1, 1),
(16, 'Marisol', 'López', 'Marín', 0, 0, 'marlop', '1acac8666317ffa17d0ebd9e0d83d29a', 'marisol.lopez@colegioeverest.cl', 'marisol.lopez@colegioeverest.cl', 'marisol.lopez@colegioeverest.cl', 1, 1, 1),
(17, 'Cristina', 'Valenzuela', 'Elgueta', 0, 0, 'crival', 'dbe9cbc8d05ce4d85d4e86c7bbb9dbb8', 'cristina.valenzuela@colegioeverest.cl', 'cristina.valenzuela@colegioeverest.cl', 'cristina.valenzuela@colegioeverest.cl', 1, 1, 1),
(18, 'Paula', 'Carrillo', 'Mella', 0, 0, 'paucar', 'bff542d4e0efa667eea1769cc93d405d', 'paula.carrillo@colegioeverest.cl', 'paula.carrillo@colegioeverest.cl', 'paula.carrillo@colegioeverest.cl', 1, 1, 1),
(19, 'Carla', 'Botto', 'González', 0, 0, 'carbot', '35cba5cb04e494989cba9ce0cfa2f8d0', 'carla.botto@colegioeverest.cl', 'carla.botto@colegioeverest.cl', 'carla.botto@colegioeverest.cl', 1, 1, 1),
(20, 'Roberto', 'Hidalgo', 'Cuadra', 0, 0, 'rob', '3b712de48137572f3849aabd5666a4e3', 'roberto.hidalgo@colegioeverest.cl', 'roberto.hidalgo@colegioeverest.cl', 'roberto.hidalgo@colegioeverest.cl', 1, 1, 1),
(21, 'Francisco', 'Bernad', '', 10, 3, 'frber', 'e9aa142407ef458da76f5e3887f1e839', 'franbernad@hotmail.com', 'ignacio.bernad@gmail.com', 'mlauracuster@yahoo.com.ar', 1, 2, 1),
(22, 'Juan Agustín', 'Caracci', 'Vera', 10, 3, 'jucar', '76a84ee37bb673de0e514d270aab7e89', '', 'jose.caracci@aditiva.com', 'catalina.vera@aditiva.com', 1, 2, 1),
(23, 'Sebastián Felipe', 'Castro', 'Covarrubias', 10, 3, 'secas', '1d1a9f61d38cd41d326be924c511d445', '', 'alejandro.castro@ingranmicro.cl', 'covarrubiasgloria@hotmail.com', 1, 2, 1),
(24, 'Benjamín', 'Conrads', 'Araya', 10, 3, 'becon', '71536835fa552384335648dbaa265cdc', 'Benjaminconrads@hotmail.com', 'kconrads@entelchile.net', 'lmaraya@manquehue.net', 1, 2, 1),
(25, 'Cristóbal', 'Cruz', 'Mackenna', 10, 3, 'crcru', 'e6b3fb2074ad698df56c538f41d688ff', 'cristobalcruzm@gmail.com', 'ecruzu@cruzydavila.cl', 'crumack@manquehue.net', 1, 2, 1),
(26, 'Vicente Andrés', 'Espinosa', 'López', 10, 3, 'viesp', 'b8515b7006980c3b2ace7b2cb5f368af', 'v.espinosa1234@gmail.com', 'amlopez@manquehue.net', 'jtespinosa@gmail.com', 1, 2, 1),
(27, 'Nicolás', 'Fagalde', 'Pascal', 10, 3, 'nifag', '1d682770b7f38ed3c57b724f7d95d9d8', 'nico.fagalde16@gmail.com', 'robertofagalde@gmail.com', 'florviva@gmail.com', 1, 2, 1),
(28, 'Arturo', 'Fernández', 'Tagle', 10, 3, 'arfer', '177c5be679208c7cf9f40fa2e33374c6', '', 'afs@ffv.cl', 'macatagle@mi.cl', 1, 2, 1),
(29, 'Luka Raul', 'Ilic', 'Vicent', 10, 3, 'luili', 'aa827905efc89146138d72e8a4c0e18c', 'luka_ilicv@hotmail.com', 'constanzavicent@gmail.com', 'rbs@tie.cl', 1, 2, 1),
(30, 'Carlos Ignacio', 'Kammel', 'Zañartu', 10, 3, 'cakam', 'deacedb9c0ad5f71d4cf40e03f462b51', 'carloskammelz@gmail.com', 'ckammel@silvavial.cl', 'vzanartu@vtr.net', 1, 2, 1),
(31, 'Manuel José', 'Lira', 'Eguiguren', 10, 3, 'malir', '81338b6dd9f9617ae223affa34b61039', '', 'ceguigurenc@gmail.com', 'clira@blizzard.cl', 1, 2, 1),
(32, 'Joaquin', 'Manzano', 'Palacios', 10, 3, 'joman', '2acf80ade12212ccc5f2892ee3f5038e', 'joaquinmanzanop@hotmail.com', 'jmanzant@santander.cl', 'paulapalaciosc@manquehue.net', 1, 2, 1),
(33, 'Sebastián', 'Martínez', 'Bertrand', 10, 3, 'semar', 'cbd445c069a2973996cfd87cbe9c788f', 'sebasmarbe@gmail.com', 'marisa.bertrand@gmail.com', 'gmartinez@santamartina.cl', 1, 2, 1),
(34, 'Juan de Dios', 'Miranda', 'García', 10, 3, 'jumir', '0730d9cfa759e648989c88f6450ccd11', '', 'an@incopesa.cl', 'mariaeugeniagarcia@manquehue.net', 1, 2, 1),
(35, 'Santiago', 'Ramírez', 'Cortés', 10, 3, 'saram', '00051a0773b24eafe300b427f6acdefe', '', 'j.ramirez@ultramar.cl', 'lucha_cortes@hotmail.com', 1, 2, 1),
(36, 'Tomás', 'Rosselot', 'Opazo', 10, 3, 'toros', '0324889728e395553ae82811b8c3fe45', 'tomasrosselot@hotmail.com', 'erosselot@mercurio.cl', 'joseopazoq21@hotmail.com', 1, 2, 1),
(37, 'Pablo Ignacio', 'Silva', 'Zúñiga', 10, 3, 'pasil', '918b16df3da7edb3314aad1869144843', 'pablosz1199@gmail.com', 'pablo.silva@mega.cl', 'bernarditazuniga@ymail.com', 1, 2, 1),
(38, 'Felipe', 'Smythe', 'Valdivieso', 10, 3, 'fesmy', '758f61d9f5725ec1227748b254d615f3', 'fsmythev@gmail.com', 'carolinavaldivieso@manquehue.net', 'fsmythe@difem.cl', 1, 2, 1),
(39, 'Pedro', 'Solari', 'O´ Shea', 10, 3, 'pesol', '82d1360ce3625266b2f3dfdea9d620de', '', 'sor@manquehue.net', 'sor@manquehue.net', 1, 2, 1),
(40, 'Cristóbal Javier', 'Subiabre', 'Cuevas', 10, 3, 'crsub', '367b525dd5de86b6f06bd5c46b7a18ab', 'Cristobal.subiabre@gmail.com', 'mvcuevas@manquehue.net', 'subiabre@manquehue.cl', 1, 2, 1),
(41, 'Clemente', 'Swett', 'Hederra', 10, 3, 'clswe', '3f0d2698e49a2749c0c6f2385a52e56d', 'clemente1swett@gmail.com', 'mjhederra@gmail.com', 'ceswett@skitotal.cl', 1, 2, 1),
(42, 'Tomás', 'Claverie', 'Mingo', 10, 3, 'tocla', '303a0944d180a97a7d6d85e4fa53a15a', 'tomasclaverie@gmail.com', 'mclaverie@volcan.cl', 'polamingo@gmail.com', 1, 2, 1),
(43, 'Cristóbal', 'Guerrero', 'Guarello', 10, 3, 'crgue', 'a4a436a40a7f6c5ad30536e2190ae350', 'cristobalguerrero232008@gmail.com', 'german.guerrero@mbi.cl', 'catalinaguarello@gmail.com', 1, 2, 1),
(44, 'Federico', 'Haas', 'Abbot', 10, 3, 'fehaa', '44e147e7d58644a72a8407a402764ff3', 'fedehaas123@gmail.com', 'fh@integrph.cl', 'cabbott@manquehue.net', 1, 2, 1),
(45, 'Cristóbal', 'Izquierdo', 'Prieto', 10, 3, 'crizq', '0e16fcb23a91b089f16a198612a9c570', 'cristobalizquierdo90@gmail.com', 'pizquierdo@constructoraizquierdo.cl', 'mpn@constructoraizquierdo.cl', 1, 2, 1),
(46, 'Nicolás', 'Schmidt', 'Besa', 10, 3, 'nisch', 'e4a28f4ef55ed4156b2b2b7d2a9588e6', 'nico.schmidt.nsb@gmail.com', 'aschmidt@friochile.cl', 'mbesa@ayg.cl', 1, 2, 1),
(47, 'Matías', 'Stephan', 'Santander', 10, 3, 'maste', '6cfd9289da272f2f2cab4341219223ce', '', 'rjo.stgo@gmail.com', 'loresantandero@hotmail.com', 1, 2, 1),
(48, 'Carlos José', 'Vera', 'Villalobos', 10, 3, 'caver', '4d50076ef0042b0a8c9fad107ebd11ca', '', 'cvera@ladybess.com', 'mav@ladybess.com', 1, 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`);

--
-- Filtros para la tabla `s_electivo`
--
ALTER TABLE `s_electivo`
  ADD CONSTRAINT `s_electivo_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id_usr`),
  ADD CONSTRAINT `s_electivo_ibfk_2` FOREIGN KEY (`id_cur`) REFERENCES `curso` (`id_cur`),
  ADD CONSTRAINT `s_electivo_ibfk_4` FOREIGN KEY (`id_elect`) REFERENCES `electivo` (`id_elect`),
  ADD CONSTRAINT `s_electivo_ibfk_5` FOREIGN KEY (`id_col`) REFERENCES `colegio` (`id_col`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
