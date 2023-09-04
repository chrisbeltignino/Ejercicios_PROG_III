<?php

require_once "./Auto_class.php";

$auto1 = new Auto("Toyota", "Rojo");
$auto2 = new Auto("Toyota", "Azul");
$auto3 = new Auto("Ford", "Gris", 20000);
$auto4 = new Auto("Ford", "Gris", 25000);
$auto5 = new Auto("Honda", "Negro", 30000, "30-08-2023");

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

$importeDouble = Auto::Add($auto1, $auto2);
echo "Importe sumado de Auto 1 y Auto 2: $" . $importeDouble . "<br/>";

if($auto1->Equals($auto2))
{
    echo "Los autos 1 y 2 son iguales.<br/>";
} else {
    echo "Los autos 1 y 2 no son iguales.</br>";
}

if($auto1->Equals($auto5))
{
    echo "Los autos 1 y 5 son iguales.<br/>";
} else {
    echo "Los autos 1 y 5 no son iguales.</br>";
}

echo "Auto 1: <br/>";
Auto::MostrarAuto($auto1);
echo "<br/>";

echo "Auto 3: <br/>";
Auto::MostrarAuto($auto3);
echo "<br/>";

echo "Auto 5: <br/>";
Auto::MostrarAuto($auto5);
echo "<br/>";