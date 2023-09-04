<?php
/*
Aplicación No 16 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las
letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

function invertirPalabra($palabra) : string {
    $palabraInvertida = strrev($palabra);
    return $palabraInvertida;
}

$palabraOriginal = "ñañu";
$palabraInvertida = invertirPalabra($palabraOriginal);
echo "Palabra original: $palabraOriginal<br/>";
echo "Palabra invertida: $palabraInvertida<br/>";

?>