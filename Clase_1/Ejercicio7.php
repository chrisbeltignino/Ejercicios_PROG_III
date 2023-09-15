<?php
$fechaActual = date('Y-m-d H:i:s');  // Obtener la fecha actual

echo "Fecha actual: $fechaActual<br/>";

$mes = date('n');  // Obtener el número del mes actual

switch ($mes) {
    case 12:
    case 1:
    case 2:
        echo "Estación: Verano";
        break;
    case 3:
    case 4:
    case 5:
        echo "Estación: Otoño";
        break;
    case 6:
    case 7:
    case 8:
        echo "Estación: Invierno";
        break;
    case 9:
    case 10:
    case 11:
        echo "Estación: Primavera";
        break;
    default:
        echo "Mes no válido";
        break;
}
?>