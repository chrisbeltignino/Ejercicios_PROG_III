<?php

/**
 * Aplicación No 18 (Par e impar)
 * Crear una función llamada EsPar que reciba un valor entero como parámetro y devuelva TRUE si
 * este número es par ó FALSE si es impar.
 * Reutilizando el código anterior, crear la función EsImpar.
 */

 function esPar($num) : bool {
    return $num % 2 == 0;
 }

 function esImpar($num) : bool {
    return $num % 2 != 0;
 }

 $num = 7;

 if(esPar($num)) {
    echo "$num es par<br/>";
 } else {
    echo "$num es Impar<br/>";
 }

 if(esImpar($num)) {
    echo "$num es impar<br/>";
 } else {
    echo "$num es par<br/>";
 }

?>