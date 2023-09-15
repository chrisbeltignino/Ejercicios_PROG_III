<?php

/*
Aplicación No 17 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La función
validará que la cantidad de caracteres que tiene $palabra no supere a $max y además deberá
determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/

function validarPalabra($palabra, $max) : bool {
    $palabraValidas = array("Recuperatorio", "Parcial", "Programacion");

    if(strlen($palabra) <= $max && in_array($palabra, $palabraValidas)){
        return true;
    } else {
        return false;
    }
}

$palabra = "Parcial";
$max = 10;
$resultado = validarPalabra($palabra, $max);

if($resultado == true){
    echo "La palabra es valida.";
} else {
    echo "La palabra no es valida";
}

?>