<?php

/* 
Aplicación No 15 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función que
las calcule invocando la función pow).
*/

function calcularPotencias($num) {
    for($i = 1; $i <= 4; $i++){
        $potencia = pow($num, $i);
        echo "$num elevado a la $i es igual a $potencia<br/>";
    }
}

for($num = 1; $num <= 4; $num++){
    calcularPotencias($num);
}

?>