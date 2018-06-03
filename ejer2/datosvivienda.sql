
--
-- Base de datos: vivienda
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla datosvivienda
--
CREATE DATABASE vivienda;
USE vivienda;
CREATE TABLE datosvivienda (
  tipo varchar(10) NOT NULL,
  zona varchar(20) NOT NULL,
  direccion varchar(50) NOT NULL,
  dormitorios int(11) NOT NULL,
  precio float NOT NULL,
  tamaño float NOT NULL
);

