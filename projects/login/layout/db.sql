DROP TABLE IF EXISTS `players`;
CREATE TABLE
IF NOT EXISTS `players`
(
  `memberID` int
(11) NOT NULL AUTO_INCREMENT,
  `username` varchar
(40) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar
(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar
(255) COLLATE utf8mb4_bin NOT NULL,
  `active` varchar
(255) COLLATE utf8mb4_bin NOT NULL,
  `resetToken` varchar
(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `resetComplete` varchar
(3) COLLATE utf8mb4_bin DEFAULT 'No',
  PRIMARY KEY
(`memberID`,`username`),
  UNIQUE KEY `username_UNIQUE`
(`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `savedata`
--

DROP TABLE IF EXISTS `savedata`;
CREATE TABLE
IF NOT EXISTS `savedata`
(
  `username` varchar
(45) NOT NULL,
  `life` varchar
(255) DEFAULT NULL,
  `score` varchar
(255) DEFAULT NULL,
  PRIMARY KEY
(`username`),
  UNIQUE KEY `username_UNIQUE`
(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;
