-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2018 a las 04:43:21
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `Usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `session_active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`Usuario`, `Password`, `session_active`) VALUES
('Administrador', 'BACPonra2018', 0),
('Jair', 'java', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Folio` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Folio`, `Nombre`, `Apellido_P`, `Apellido_M`) VALUES
('0040', 'Bruno', 'Vitte', 'San Juan'),
('260800', 'Paulina', 'Fuenlabrada', 'Velazquez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `folio_alumno` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_pregunta` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta_dada` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta_correcta` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correcta/incorrecta` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `puntuacion` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`folio_alumno`, `id_pregunta`, `respuesta_dada`, `respuesta_correcta`, `correcta/incorrecta`, `puntuacion`) VALUES
('0040', '1001', 'Evitar el contacto entre seres humanos', 'Participar con orden en una comunidad.', 'Incorrecta', '0'),
('0040', '1005', 'Se entiende casi igual', 'Se altera el significado real de este', 'Incorrecta', '0'),
('0040', '1004', 'Informativos', 'Informativos', 'Correcta', '1'),
('0040', '2005', '24', '24', 'Correcta', '1'),
('0040', '2002', '5n + 1', '5n + 1', 'Correcta', '1'),
('0040', '2003', '279', '299', 'Incorrecta', '0'),
('0040', '3001', 'Biotecnología', 'Ciencia', 'Incorrecta', '0'),
('0040', '3004', 'La ecología', 'La ecología', 'Correcta', '1'),
('0040', '3003', 'Se reproducen, respiran y están formados por celulas', 'Se reproducen, respiran y están formados por celulas', 'Correcta', '1'),
('0040', '4005', 'Contrarreforma', 'Reforma protestante', 'Incorrecta', '0'),
('0040', '4002', 'Johannes Gutenberg', 'Johannes Gutenberg', 'Correcta', '1'),
('0040', '4001', 'Religión monoteísta', 'Religión monoteísta', 'Correcta', '1'),
('0040', '5002', 'Región', 'Hábitat', 'Incorrecta', '0'),
('0040', '5005', 'La tasa de migración', 'La tasa de crecimiento demográfico', 'Incorrecta', '0'),
('0040', '5001', 'Se encarga de estudiar la relación existente entre los elementos físicos, biológicos y humanos, y la manera en que influyen en el espacio geográfico', 'Se encarga de estudiar la relación existente entre los elementos físicos, biológicos y humanos, y la manera en que influyen en el espacio geográfico', 'Correcta', '1'),
('0040', '1001', 'Evitar el contacto entre seres humanos', 'Participar con orden en una comunidad.', 'Incorrecta', '0'),
('0040', '1005', 'Se entiende casi igual', 'Se altera el significado real de este', 'Incorrecta', '0'),
('0040', '1004', 'Informativos', 'Informativos', 'Correcta', '1'),
('0040', '2005', '24', '24', 'Correcta', '1'),
('0040', '2002', '5n + 1', '5n + 1', 'Correcta', '1'),
('0040', '2003', '279', '299', 'Incorrecta', '0'),
('0040', '3001', 'Biotecnología', 'Ciencia', 'Incorrecta', '0'),
('0040', '3004', 'La ecología', 'La ecología', 'Correcta', '1'),
('0040', '3003', 'Se reproducen, respiran y están formados por celulas', 'Se reproducen, respiran y están formados por celulas', 'Correcta', '1'),
('0040', '4005', 'Contrarreforma', 'Reforma protestante', 'Incorrecta', '0'),
('0040', '4002', 'Johannes Gutenberg', 'Johannes Gutenberg', 'Correcta', '1'),
('0040', '4001', 'Religión monoteísta', 'Religión monoteísta', 'Correcta', '1'),
('0040', '5002', 'Región', 'Hábitat', 'Incorrecta', '0'),
('0040', '5005', 'La tasa de migración', 'La tasa de crecimiento demográfico', 'Incorrecta', '0'),
('0040', '5001', 'Se encarga de estudiar la relación existente entre los elementos físicos, biológicos y humanos, y la manera en que influyen en el espacio geográfico', 'Se encarga de estudiar la relación existente entre los elementos físicos, biológicos y humanos, y la manera en que influyen en el espacio geográfico', 'Correcta', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `Folio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Calle` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Numero` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Colonia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Delegacion/muncipio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`Folio`, `Calle`, `Numero`, `Colonia`, `Delegacion/muncipio`, `Estado`) VALUES
('0040', 'Amapola', '415', 'Gustavo Díaz Ordaz', 'Ecatepec', 'Estado de México'),
('260800', 'Natal', '627', 'Lindavista', 'GAM', 'CDMX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `Folio` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Id_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Id_pregunta` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `Id_pregunta` int(5) NOT NULL,
  `Id_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Materia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `Pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_correcta` text COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_inc_1` text COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_inc_2` text COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_inc_3` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`Id_pregunta`, `Id_materia`, `Materia`, `imagen`, `Pregunta`, `Respuesta_correcta`, `Respuesta_inc_1`, `Respuesta_inc_2`, `Respuesta_inc_3`) VALUES
(1001, '1000', 'Seccion 1', 'images/L1.png', '¿A cuál pregunta responde el texto anterior?', '¿Qué es una huella ecológica y cómo impacta en la naturaleza?', '¿Qué recursos necesitan las plantas, los animales y el hombre para vivir?', '¿Cuáles son los recursos que consume el ser humano?', '¿Cuáles son las superficies marinas y terrestres que producen los alimentos?'),
(1002, '1000', 'Seccion 1', 'images/L1.png', 'De las siguientes opciones, ¿cuál contiene dos marcadores discursivos que ayudan a organizar la información en la introducción del texto?', 'De esta manera / al igual que', 'En palabras sencillas / con los', 'Para / que', 'A ello / y'),
(1003, '1000', 'Seccion 1', 'images/L1.png', 'Señala en que parte del texto se desarrolla la idea de que los seres humanos necesitan del hábitat natural para poder sobrevivir', 'Introducción', 'Hipótesis', 'Problema', 'Intencion'),
(1004, '1000', 'Seccion 1', 'images/L1.png', '¿Cuál es el resumen del problema planteado?', 'La huella ecológica es la superficie necesaria para producir los alimentos y otras materas primarias que requerimos, así como para absorber nuestros desechos, por lo tanto, tiene un impacto importante en la naturaleza', 'Medir el impacto de nuestra sociedad en el ambiente es una tarea compleja, así que no se pueden realizar estudios sobre esto ni cuidar el ambiente', 'Los seres humanos, así como las plantas y los animales, necesitamos de alimentos, energía y agua para vivir. Por eso sacamos recursos de la naturaleza', 'Para obtener los vegetales, la carne, así como las fibras, la madera y la energía eléctrica, necesitamos de un “pedacito” de naturaleza. Por lo tanto, se debe intentar sacar el máximo provecho al medio ambiente.'),
(2001, '2000', 'Seccion 2', 'images/L3.png', '¿Cuál es la enseñanza que se deduce de la historia anterior?', 'Es importante descansar y disfrutar todos los días del año', 'En la vida se debe impulsar a los demás para que salgan adelante', 'Los pescadores evitan la fatiga y sólo trabajan mediodía', 'La verdadera felicidad es una vida sencilla y libre de preocupaciones'),
(2002, '2000', 'Seccion 2', 'images/L3.png', '¿Qué tipo de narrador está presente?', 'Tercera persona', 'Testigo', 'Protagonista', 'Segunda persona'),
(2003, '2000', 'Seccion 2', 'images/L2.png', 'Lee la siguiente información y atiende lo que se solicita. <br> Son elementos lingüísticos que contribuyen a dar orden y estructura al texto oral o escrito. Sirven para establecer relaciones tanto de forma como de significado entre las oraciones, proposiciones y párrafos. De esta manera se logra establecer una conexión clara entre los distintos fragmentos que componen el texto. Pueden ser adverbios, frases adverbiales o conjunciones. La definición anterior hace referencia a:', 'Los conectores', 'Los enunciados', 'Las conjunciones', 'Los modificadores'),
(2004, '2000', 'Seccion 2', '', 'Los términos: gorguera, grebas y gola, hacen parte de la vestimenta de:', 'c)	Un caballero medieval', 'Un golfista', 'Un boxeador', 'Un esquimal'),
(3001, '3000', 'Seccion 3', 'images/L5.png', '¿Cuál de las siguientes opciones resume las ideas principales del texto?', 'Internet se está convirtiendo en el \'medio de comunicación global\', debido a que es una herramienta indispensable para la educación, el conocimiento y el disfrute. Sin embargo, este último uso lo puede volver negativo, puesto que se abusa de él. Como conclusión, Internet puede causar adicción, con consecuencias tales como la pérdida de una vida social activa.', 'Internet puede causar adicción con consecuencias tales como la pérdida de una vida social activa, es decir, Internet se está convirtiendo en el \'medio de comunicación global\', debido a que es una herramienta indispensable para la educación, el conocimiento y el disfrute. Precisamente este último uso lo puede volver negativo, puesto que se abusa de él.', 'Internet causa adicción con efectos negativos, tales como la pérdida de una vida social activa. Ya que Internet es un \'medio de comunicación global\', es una herramienta indispensable para la educación, el conocimiento y el disfrute. Finalmente, éste último uso lo vuelve negativo, ya que se abusa de él.', 'Internet se está convirtiendo en el \'medio de comunicación global\'. Su aplicación al gozo y el disfrute no necesariamente lo puede volver negativo aunque se abuse de él. Es importante destacar que Internet rara vez puede causar adicción o tener consecuencias tales como la pérdida de una vida social activa.'),
(3002, '3000', 'Seccion 3', 'images/L5.png', 'El enunciado que sustenta la postura del autor es:', 'La adhesión del adolescente al mundo digital aparta a los jóvenes de disfrutar su entorno social inmediato.', 'Internet se ha convertido en una herramienta multiusos indispensable y favorable para la vida de hoy en día', 'Existen medios de comunicación global que se han vuelto un maravilloso invento tecnológico en la actualidad', 'El mundo de la web no sólo se utiliza para el ocio, sino para adquirir conocimientos muy útiles para todos'),
(4001, '4000', 'Seccion 4', 'images/L6.png', '¿Cuál es el tema central del fragmento?', 'La reducción del estrés a partir de escuchar música en vivo.', 'Los altos niveles del cortisol y cortisona provocan estrés', '¿Conciertos para reducir el estrés?', 'Escuchar música en vivo provoca altos niveles de estrés'),
(4002, '4000', 'Seccion 4', 'images/L6.png', '¿Cuál es el asunto principal del texto?', 'Los efectos positivos de los conciertos para disminuir las hormonas de estrés', 'Las consecuencias de escuchar música voluntariamente', '¿Conciertos para reducir el estrés?', 'La importancia de la investigación sobre lo padecimientos cardiacos'),
(4003, '4000', 'Seccion 4', 'images/L6.png', 'El enunciado que engloba la información del texto es:', 'Los conciertos disminuyen el estrés', 'Los eventos culturales son positivos.', '¿Conciertos no ayudan al estrés?', 'Problemas de salud en las personas'),
(4004, '4000', 'Seccion 4', 'images/L6.png', 'Mario quiere hacer un mapa conceptual con los conceptos más importantes del texto, ¿cuál es la frase con la de debe iniciar el esquema?', 'Efectos de la música', 'Aumento del estrés', 'Conciertos de 60 minutos', 'La importancia de las investigaciones'),
(4005, '4000', 'Seccion 4', 'images/L6.png', '¿Cuál es la frase que engloba la idea principal del texto?', 'Efectos positivos de los conciertos para disminuir el estrés', 'Efectos de la música antes y después de escucharla', 'Investigaciones con voluntarios para medir niveles hormonales', 'Riesgos de padecer diabetes e importancia en los seres humanos'),
(5001, '5000', 'Sección 5', '', 'Lee la siguiente información y atiende lo que se solicita.', 'Los conectores', 'Los modificadores', 'Las conjunciones', 'Los enunciados'),
(5002, '5000', 'Sección 5', '', 'Los términos: gorguera, grebas y gola, hacen parte de la vestimenta de:', 'Un caballero medieval', 'Un esquimal', 'Un boxeador', 'Un golfista'),
(5003, '5000', 'Sección 5', '', 'La épica es:', 'Género en el cual se narran hazañas de los dioses y los héroes legendarios, valiéndose de la prosa o el verso extenso.', 'Un género literario que se representa a través de las obras teatrales.', 'Manifestación de la oratoria, la filosofía y la historia, que pueden considerarse los orígenes del teatro', 'Parte de la gramática que se encarga del estudio semántico de las palabras.'),
(5004, '5000', 'Sección 5', 'images/L4.png', 'Lee la siguiente información y atiende lo que se solicita <br> El propósito del texto es', 'Contextualizar los mitos que se narran en el libro Ramayana como historia ficticia.', 'Describir de manera general un libro para valorar su importancia en la literatura universal', 'Justificar el origen de las tradiciones hindúes explicadas por el poeta Valmiki Prachetasa.', 'Mencionar las fechas exactas y los lugares en que aconteció la historia narrada en el libro.'),
(5005, '5000', 'Sección 5', '', 'Este modo discursivo puede presentarse por escrito o de manera oral. Se aprende de manera natural a través de la interacción con las personas que nos rodean; es la forma básica mediante la cual nos comunicamos en sociedad y caracteriza al género dramático.', 'Diálogo', 'Descripción', 'Narración', 'Argumentacion'),
(5006, '5000', 'Sección 5', '', '¿Cómo se le denomina a la fuente de información que proporciona datos obtenidos en una observación planificada?', 'De campo', 'Secundaria', 'Documental', 'Primaria'),
(5007, '5000', 'Sección 5', '', 'Después de ver el último juego del torneo de béisbol, a Jacinto le surgió el deseo de dar a conocer un análisis valorativo de los hechos más relevantes sucedidos durante el juego. Jacinto tiene el deseo de presentar a sus amigos y conocidos el desarrollo de este acontecimiento, ¿qué tipo de texto debe redactar  Jacinto para lograr este propósito?', 'Crónica', 'Ensayo', 'Memorias', 'Diario personal'),
(5008, '5000', 'Sección 5', '', '¿Cuál de las siguientes referencias ciberográficas es confiable para el tema de investigación: Características del modelo atómico de Bohr?', 'Portal académico del CCH. (2016, 7 de junio). “Bohr y el átomo”. Recuperado de: http://portalacademico.cch.unam.mx./alumno/quimica1/unidad2/modelos_atomicos/modelo_bohr', '(2016, 7 de junio). “Teorías y modelos atómicos”. Recuperado de: http://teoteojavapa.blogspot.mx/2012/04/modelo-atomico-de-bohr.html', 'Wikipedia. (2016, 7 de junio). “Modelo atómico de Bohr”. Recuperado de: https://es.wikipedia.org/wiki/Modelo_atómico_de_Bohr', 'El rincón del vago. (2016, 7 de junio). “”Modelos atómicos”. Recuperado de: http://html.rincondelvago.com/modelos-atomicos_17.html'),
(5009, '5000', 'Sección 5', 'images/G1.png', 'Identifica el tipo de fuente de donde se obtuvo la información de la gráfica.', 'Encuesta', 'Entrevista', 'Resultados de observación', 'Cuestionario de opinión'),
(5010, '5000', 'Sección 5', '', 'Qué característica corresponde al narrador en tercera persona?', 'Pretende conseguir de los lectores una sensación de objetividad, de veracidad en lo que se dice. Este tipo de narrador es ajeno a los hechos, está fuera de la historia narrada y necesita tomar distancia de lo acontecido para hacer parecer que lo que relata es objetivo.', 'Se pone de manifiesto la presencia del autor en lo narrado. Con esta forma de enunciación, se consigue atrapar con mayor fuerza la atención del receptor, aumenta su interés, pues lo que el enunciador dice tiene apariencia de algo que ha vivido, que ha experimentado de manera personal.', 'Este tipo de narrador participa en el relato, es un protagonista que narra los que sucede, se dirige a sí mismo, habla o proyecta su intimidad hacia el lector, busca la complicidad de éste dirigiéndose directamente hacia él, lo hace copartícipe del relato.', 'El narrador es un personaje de la historia, por lo que piensa y dice, está basado únicamente en lo que conoce o ha experimentado dentro de ella. Actúa, juzga y tiene opiniones sobre los hechos que ocurren y los otros personajes que aparecen.'),
(5011, '5000', 'Sección 5', '', 'Define la secuencia narrativa de un texto dramático', 'Estructura de una historia constituida por inicio, clímax, desenlace y final', 'Conjunto de veces en que se abre y cierra el telón durante la puesta en escena.', 'Segmentos de la dramatización marcados por la entrada y salida de actores en el escenario.', 'Fragmentos de un relato señalados por el inicio de la acción interpretada por los personajes.'),
(5012, '5000', 'Sección 5', '', 'Ayer, Juan terminó la carrera con sus viejos tenis en el nuevo estadio de futbol.\n¿Cuál es la palabra que cumple la función de adverbio de tiempo?', 'Ayer', 'Terminó', 'Viejos', 'Nuevo'),
(5013, '5000', 'Sección 5', '', '¿Cuál es la función de la información cuando se utiliza para fundamentar una opinión?', 'Argumentativa', 'Introductoria', 'Explicativa', 'Descriptiva'),
(5014, '5000', 'Sección 5', '', 'Selecciona la opción que complete el siguiente enunciado.<br> Un texto_________________como él_________________tiene como intención comunicativa________________________al lector.', 'Literario / poema / emocionar', 'Expositivo / retrato literario / describir', 'Argumentativo / cuento / recrear', 'Periodismo / ensayo / caracterizar'),
(5015, '5000', 'Sección 5', '', 'Mi hijo es un buen estudiante que siempre cumple con sus tareas, es muy inteligente y no parece que su inasistencia por apoyar a su familia sea un motivo para su baja. Personajes como Benito Juárez tuvieron que dejar la escuela varias veces y llegaron a ser grandes hombres de este país; por eso creo que Luis también se merece una oportunidad.  ¿A qué tipo de texto pertenece el ejemplo?', 'Argumentativo', 'Descriptivo', 'Explicativo', 'Expositivo'),
(5016, '5000', 'Sección 5', '', '¿Cuál de las opciones describe las características de un texto literario?', 'Su intención comunicativa es producir un efecto estético y emotivo en el lector, es original, crea un mundo propio y el lenguaje que utiliza es connotativo.', 'Predomina la función apelativa de la lengua, su intención comunicativa es la de persuadir y el lenguaje que utiliza es connotativo', 'Se relata en forma ordenada, jerárquica y objetiva, tiene una finalidad pragmática y el lenguaje que utiliza es denotativo', 'Su propósito es dar a conocer un hecho, tiene la finalidad de convencer y el lenguaje que usa es referencial.'),
(5017, '5000', 'Sección 5', '', '¿Cuál es el tipo de escrito que se redacta únicamente en un ámbito académico?', 'Tesis', 'Memorias', 'Cuento', 'Poesia'),
(5018, '5000', 'Sección 5', 'images/T1.png', 'Relaciona el modo discursivo con las características que le corresponden.', '1e, 2d, 3b, 4c, 5a', '1e, 2d, 3a, 4c, 5b', '1d, 2e, 3b, 4c, 5a', '1e, 2d, 3a, 4b, 5c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'table', 'query', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"allrows\":\"1\",\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@TABLE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continÃºa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continÃºa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"phpmyadmin\",\"table\":\"calificacion\"},{\"db\":\"phpmyadmin\",\"table\":\"alumnos\"},{\"db\":\"phpmyadmin\",\"table\":\"respuestas_alumno\"},{\"db\":\"phpmyadmin\",\"table\":\"secciones\"},{\"db\":\"phpmyadmin\",\"table\":\"materias\"},{\"db\":\"phpmyadmin\",\"table\":\"administracion\"},{\"db\":\"phpmyadmin\",\"table\":\"examenes\"},{\"db\":\"pruebas\",\"table\":\"materias\"},{\"db\":\"phpmyadmin\",\"table\":\"tutor\"},{\"db\":\"pruebas\",\"table\":\"secciones\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-02-07 02:34:09', '{\"lang\":\"es\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_alumno`
--

CREATE TABLE `respuestas_alumno` (
  `folio_alumno` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `folio_pregunta` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta_letras` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_dada` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas_alumno`
--

INSERT INTO `respuestas_alumno` (`folio_alumno`, `folio_pregunta`, `respuesta_letras`, `Respuesta_dada`) VALUES
('0040', '1001', 'b', 'Evitar el contacto entre seres humanos'),
('0040', '1005', 'a', 'Se entiende casi igual'),
('0040', '1004', 'c', 'Informativos'),
('0040', '2005', 'a', '24'),
('0040', '2002', 'a', '5n + 1'),
('0040', '2003', 'c', '279'),
('0040', '3001', 'b', 'Biotecnología'),
('0040', '3004', 'd', 'La ecología'),
('0040', '3003', 'b', 'Se reproducen, respiran y están formados por celulas'),
('0040', '4005', 'a', 'Contrarreforma'),
('0040', '4002', 'c', 'Johannes Gutenberg'),
('0040', '4001', 'd', 'Religión monoteísta'),
('0040', '5002', 'a', 'Región'),
('0040', '5005', 'c', 'La tasa de migración'),
('0040', '5001', 'b', 'Se encarga de estudiar la relación existente entre los elementos físicos, biológicos y humanos, y la manera en que influyen en el espacio geográfico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `seccion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `no_preguntas` int(4) NOT NULL,
  `last` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`seccion`, `no_preguntas`, `last`) VALUES
('Seccion 1', 3, 1006),
('Seccion 2', 3, 2010),
('Seccion 3', 2, 3002),
('Seccion 4', 3, 4005),
('Seccion 5', 9, 5018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `Folio` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_tutor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P_tutor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M_tutor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_casa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_celular` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`Folio`, `Nombre_tutor`, `Apellido_P_tutor`, `Apellido_M_tutor`, `Correo`, `Telefono_casa`, `Telefono_celular`) VALUES
('0040', 'Alberto', 'Vitte', 'de la Rosa', 'tanque_250@hotmail.com', '55699494', '5559698752'),
('260800', 'Eugenia', 'Fuenlabrada', 'Velázquez', 'paulinafuenlabrada@gmail.com', '44355380', '5548066360');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`Usuario`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Folio`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`Folio`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Id_materia` (`Id_materia`),
  ADD KEY `Id_pregunta` (`Id_pregunta`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`Id_pregunta`),
  ADD KEY `Id_materia` (`Id_materia`);

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`seccion`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`Folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
