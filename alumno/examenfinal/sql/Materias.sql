SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `Materias` (
  `Id_pregunta` int(5) NOT NULL,
  `Id_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Materia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_correcta` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_inc_1` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_inc_2` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Respuesta_inc_3` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `Materias` (`Id_pregunta`, `Id_materia`, `Materia`, `Pregunta`, `Respuesta_correcta`, `Respuesta_inc_1`, `Respuesta_inc_2`, `Respuesta_inc_3`) VALUES
(1001, '1000', 'Español', 'Un reglamento nos sirve para que podamos…', 'Participar con orden en una comunidad.', 'Conocer los verbos imperativos', 'Evitar el contacto entre seres humanos', 'Organizar contenido del libro'),
(1002, '1000', 'Español', 'Una de las principales características de la leyenda que es un texto…', 'Anónimo y de tradición oral.', 'Que habla sobre dioses y héroes', 'Reconocida y de tradición escrita.', 'Habla sobre las realidades de nuestra comunidad.'),
(1003, '1000', 'Español', '________________Se le fueron sumando acontecimientos reales y fantásticos.', 'A la leyenda', 'Al mito', 'A la costumbre', 'Al reglamento'),
(1004, '1000', 'Español', 'Las explicaciones objetivas son características de los textos…', 'Informativos', 'Literarios', 'Persuasivos', 'Poéticos'),
(1005, '1000', 'Español', 'Si se elimina la idea principal de un párrafo este…', 'Se altera el significado real de este', 'Se entiende casi igual', 'Las ideas secundarias suplen a las ideas principales', 'Las ideas complementarias funcionan como ideas principales'),
(2001, '2000', 'Matemáticas', '¿Cuál es el valor posicional del 7 en el número 8 174 326?', '70000', '7', '70', '74326'),
(2002, '2000', 'Matemáticas', 'Para la sucesión 6, 11, 16, 21, 26, 31, 36, 41… subraya la expresiónalgebraica que te permite encontrar el término que está en el lugar n.', '5n + 1', 'n - 5', 'n + 5', 'n'),
(2003, '2000', 'Matemáticas', 'La expresión algebraica que permite encontrar cualquier número de lasucesión 2, 5, 8, 11, 14… es 3n − 1, donde n indica el lugar del número dentrode la sucesión. ¿Cuál es el número que ocupa el lugar 100 en la sucesión?', '299', '289', '301', '279'),
(2004, '2000', 'Matemáticas', '¿Cuál de las siguientes afirmaciones es verdadera al hablar de dos figurassimétricas con respecto a un eje?', 'Sus lados correspondientes tienen la misma medida', 'Sus lados correspondientes tienen diferente medida', 'Sus ángulos correspondientes tienen diferente medida', 'Sus vértices correspondientes no equidistan del eje de simetría'),
(2005, '2000', 'Matemáticas', 'En un restaurante una persona puede elegir entre 2 sopas, 4 guisados y 3postres. ¿De cuántas formas diferentes puede elegir su menú?', '24', '18', '12', '9'),
(3001, '3000', 'Ciencias', 'Es una actividad que permite al ser humano comprender el mundo en que vive. Estudia los hechos yfenómenos de la naturaleza.', 'Ciencia', 'Biotecnología', 'Tecnología', 'Geología'),
(3002, '3000', 'Ciencias', 'Es una ciencia que permite estudiar las características de los microorganismos.', 'Microbiología', 'Biotecnología', 'Tecnología', 'Biología'),
(3003, '3000', 'Ciencias', 'Son características especiales de los seres vivos.', 'Se reproducen, respiran y están formados por celulas', 'Se mueven, eliminen desechos y sus partes se secan', 'Cambian de tamaño, se mueven y se secan', 'Cambian de tamaño se mueven y se reciclan'),
(3004, '3000', 'Ciencias', 'Es la riqueza de formas distintas que se desarrollan los seres vivos, los diferentes ecosistemas y lasvariedades dentro de las especies.', 'La ecología', 'La biodiversidad', 'La biología', 'La vegetación'),
(3005, '3000', 'Ciencias', 'Es una àrea que se ha encargado de los desarrollos tecnológicos ha creado diferentes equipos como elmicroscopio, telescopio y computadoras que permiten al hombre obtener datos del universo que se observan decerca y de los que no se pueden ver a simple vista.', 'Tecnología', 'Biología', 'Ciencia', 'Ecología'),
(4001, '4000', 'Historia', 'Son características de las primeras civilizaciones excepto____________.', 'Religión monoteísta', 'La agricultura fue la base de su economía', 'Religión politeísta', 'Se asentaba cerca de lso ríos'),
(4002, '4000', 'Historia', 'Inventor de la imprenta.', 'Johannes Gutenberg', 'Martin Lutero', 'Nicolas Maquiavelo', 'Miguel Angel'),
(4003, '4000', 'Historia', 'Sistema económico en el que las personas invierten sus riquezas para hacer grandes negocios y obtener beneficios.', 'Capitalismo', 'Comunismo', 'Socialismo', 'Mancomunismo'),
(4004, '4000', 'Historia', 'Institución de la Iglesia Católica encargada de perseguir a los herejes.', 'La Inquisición', 'Concilio de Trento', 'Extramaunción', 'El Vaticano'),
(4005, '4000', 'Historia', 'Movimiento religioso del siglo XVI, que se oponía a la Iglesia Católica y formo diversas iglesias que no se regían por el Papa.', 'Reforma protestante', 'Guerras de Religión', 'Concilio de Trento', 'Contrarreforma'),
(5001, '5000', 'Geografía', 'La Geografía es la ciencia que:', 'Se encarga de estudiar la relación existente entre los elementos físicos, biológicos y humanos, y la manera en que influyen en el espacio geográfico', 'Estudia la materia y loa energía con sus interacciones', 'Tiene como objetivo estudio a los seres vivos, en especial lo referente a su origen, evolución y propiedades', 'Estudia a los seres vivos, su ambiente, distribución y diversidad'),
(5002, '5000', 'Geografía', 'Es el espacio relativamente homogéneo caracterizado por la interacción de uno o varios componentes que le dan identidad y son un medio de gestión:', 'Hábitat', 'Lugar', 'Paisaje', 'Región'),
(5003, '5000', 'Geografía', 'Es una porción del espacio que se delimita políticamente por extensión de nación o superficie:', 'Territorio', 'Paisaje', 'Medio', 'Ecosistema'),
(5004, '5000', 'Geografía', 'Es el conjunto de formas que, en un momento dado, expresa las herencias de las relaciones entre hombre y naturaleza; pueden ser bosques, desiertos, pueblos y ciudades, entre otras.', 'Región', 'Paisaje', 'Hábitat', 'Lugar'),
(5005, '5000', 'Geografía', 'Muestra el número de personas de una población que varía periódicamente por los nacimientos y las defunciones:', 'La tasa de crecimiento demográfico', 'La tasa de migración', 'La tasa de natalidad', 'La distribución de la población');


ALTER TABLE `Materias`
  ADD PRIMARY KEY (`Id_pregunta`),
  ADD KEY `Id_materia` (`Id_materia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
