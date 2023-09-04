<?php
$operador = '*';  // Puedes cambiar el operador aquí
$op1 = 10;
$op2 = 5;
$resultado = 0;

switch ($operador) {
    case '+':
        $resultado = $op1 + $op2;
        break;
    case '-':
        $resultado = $op1 - $op2;
        break;
    case '*':
        $resultado = $op1 * $op2;
        break;
    case '/':
        $resultado = $op1 / $op2;
        break;
    default:
        echo "Operador no válido";
        break;
}

echo "Resultado: $resultado";
?>