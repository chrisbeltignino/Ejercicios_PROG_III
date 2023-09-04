<?php
$num = 42;

if ($num >= 20 && $num <= 60) {
    $numerosEnLetras = array(
        20 => "Veinte", 21 => "Veintiuno", 22 => "Veintidós", 23 => "Veintitrés", 24 => "Veinticuatro", 
        25 => "Veinticinco", 26 => "Veintiséis", 27 => "Veintisiete", 28 => "Veintiocho", 29 => "Veintinueve",
        30 => "Treinta", 40 => "Cuarenta", 50 => "Cincuenta", 60 => "Sesenta"
    );

    if (isset($numerosEnLetras[$num])) {
        echo "Número en letras: " . $numerosEnLetras[$num];
    } else {
        $decena = floor($num / 10) * 10;
        $unidad = $num % 10;
        echo "Número en letras: " . $numerosEnLetras[$decena] . " y " . $numerosEnLetras[$unidad];
    }
} else {
    echo "El número está fuera del rango (20-60)";
}
?>