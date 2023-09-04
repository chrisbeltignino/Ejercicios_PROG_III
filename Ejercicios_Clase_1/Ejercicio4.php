<?php
// Inicializar variables
$suma = 0;
$numero = 1;
$numerosSumados = 0;

// Realizar la suma
while ($suma + $numero <= 1000) {
    $suma += $numero;
    $numerosSumados++;
    $numero++;
}

// Mostrar los números sumados y la cantidad de números sumados
echo "Números sumados: ";
for ($i = 1; $i <= $numerosSumados; $i++) {
    echo $i;
    if ($i < $numerosSumados) {
        echo ", ";
    }
}
echo "<br/>Total de números sumados: " . $numerosSumados;
?>