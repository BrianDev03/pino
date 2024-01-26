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

