<?php

/**
 * Aplicación No 1 (Mostrar números impares)
 * Confeccionar un programa que solicite el ingreso de un número positivo (validar) y que
 * muestre en un <input type=”text”> la cantidad de números impares que hay entre ese número
 * y el cero. Realizarlo utilizando el objeto XMLHttpRequest.
 */

if (isset($_GET['numero'])) {
    $numero = intval($_GET['numero']);
    $cantidadImpares = 0;

    for ($i = 1; $i <= $numero; $i++) {
        if ($i % 2!= 0) {
            $cantidadImpares++;
        }
    }

    echo $cantidadImpares;
} else {
    echo "Parámetro 'numero' no encontrado.";
}
