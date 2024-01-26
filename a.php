<?php
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<peliculas>
 <pelicula>
  <titulo>PHP: Tras el Analilzador</titulo>
  <personajes>
   <personaje>
    <nombre>Srta. Programadora</nombre>
    <actor>Onlivia Actora</actor>
   </personaje>
   <personaje>
    <nombre>Sr. Programador</nombre>
    <actor>El Act&#211;r</actor>
   </personaje>
  </personajes>
  <argumento>
   Así que, este lenguaje. Es como, un lenguaje de programación. ¿O es un
   lenguaje de script? Lo descubrirás en esta intrigante y temible parodia
   de un documental.
  </argumento>
  <grandes-frases>
   <frase>PHP soluciona todos los problemas web</frase>
  </grandes-frases>
  <puntuacion tipo="votos">7</puntuacion>
  <puntuacion tipo="estrellas">5</puntuacion>
 </pelicula>
</peliculas>
XML;
?>

<!-- 2 -->

<?php
include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

echo $peliculas->pelicula[0]->argumento;
?>

<!-- 3 -->
<?php
include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

echo $peliculas->pelicula->{'grandes-frases'}->frase;
?>

<!-- 4 -->

<?php
include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

/* Para cada <personaje>, se muestra cada <nombre>. */
foreach ($peliculas->pelicula->personajes->personaje as $personaje) {
   echo $personaje->nombre, ' interpretado por ', $personaje->actor, PHP_EOL;
}

?>

<!-- 5 -->

<?php
include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

/* Acceder a los nodos <puntuacion> de la primera película.
 * Mostrar la escala de puntuación también. */
foreach ($peliculas->pelicula[0]->puntuacion as $puntuacion) {
    switch((string) $puntuacion['tipo']) { // Obtener los atributos como índices del elemento
    case 'votos':
        echo $puntuacion, ' votos positivos';
        break;
    case 'estrellas':
        echo $puntuacion, ' estrellas';
        break;
    }
}
?>

<!-- 6 -->
<?php     
include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

if ((string) $peliculas->pelicula->titulo == 'PHP: Tras el Analilzador') {
    print 'Mi película favorita.';
}

echo htmlentities((string) $peliculas->pelicula->titulo);
?>

<!-- 7 -->
<?php
include 'ejemplo.php';

$pelicula1 = new SimpleXMLElement($xmlstr);
$pelicula2 = new SimpleXMLElement($xmlstr);
var_dump($pelicula1 == $pelicula2); // falso desde PHP 5.2.0
?>


<!-- 8 -->

<?php
include 'ejemplo.php';

$peliculas = new SimpleXMLElement($xmlstr);

foreach ($peliculas->xpath('//personaje') as $personaje) {
    echo $personaje->nombre . ' interpretado por ' . $personaje->actor, PHP_EOL;
}
?>

<!-- 9 -->

<?php
include 'ejemplo.php';
$peliculas = new SimpleXMLElement($xmlstr);

$peliculas->pelicula[0]->personajes->personaje[0]->nombre = 'Srta. Programadora';

echo $peliculas->asXML();
?>