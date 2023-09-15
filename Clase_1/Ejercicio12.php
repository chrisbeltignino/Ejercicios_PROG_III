<?php
$lapicera1 = array(
    'color' => 'rojo',
    'marca' => 'BIC',
    'trazo' => 'fino',
    'precio' => 1.5
);

$lapicera2 = array(
    'color' => 'azul',
    'marca' => 'Pilot',
    'trazo' => 'medio',
    'precio' => 2.0
);

$lapicera3 = array(
    'color' => 'negro',
    'marca' => 'Staedtler',
    'trazo' => 'grueso',
    'precio' => 2.5
);

$lapiceras = array($lapicera1, $lapicera2, $lapicera3);

foreach ($lapiceras as $lapicera) {
    echo "Color: " . $lapicera['color'] . ", Marca: " . $lapicera['marca'] . ", Trazo: " . $lapicera['trazo'] . ", Precio: " . $lapicera['precio'] . "<br/>";
}
?>