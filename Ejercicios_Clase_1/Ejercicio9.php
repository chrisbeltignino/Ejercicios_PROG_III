<?php
$elementos = array();
$promedio = 0;

for ($i = 0; $i < 5; $i++) {
    $elementos[] = rand(1, 10); // Generar números aleatorios entre 1 y 10
    $promedio += $elementos[$i];
}

$promedio /= count($elementos);

if ($promedio > 6) {
    echo "El promedio es mayor que 6";
} elseif ($promedio < 6) {
    echo "El promedio es menor que 6";
} else {
    echo "El promedio es igual a 6";
}
?>