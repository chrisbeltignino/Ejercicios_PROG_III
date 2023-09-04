<?php

require_once "./Fabrica_class.php";
require_once "./Operario_class.php";

$p1 = new Operario(1, "Gomez", "Juan");
$p2 = new Operario(2, "Perez", "Ana");
$p3 = new Operario(3, "Rodriguez", "Luis");

$fabrica = new Fabrica("Mi Fabrica");

$fabrica->Add($p1);
$fabrica->Add($p2);
$fabrica->Add($p3);

$p1->SetAumentarSalario(1);
$p2->SetAumentarSalario(2000.0);
$p3->SetAumentarSalario(200000.0);

echo $fabrica->MostrarOperarios(). "<br/>";
echo $fabrica->MostrarCostos(). "<br/>";

echo $p1->MostrarOperario($p1). "<br/>";
echo $p2->MostrarOperario($p2). "<br/>";
echo $p3->MostrarOperario($p3). "<br/>";

//var_dump($fabrica);

echo $fabrica->Mostrar();

$p4 = new Operario(4, "Gomez", "Juan");
if ($fabrica->Add($p4)) {
    echo "Operario agregado con éxito.<br/>";
} else {
    echo "No se pudo agregar al operario.<br/>";
}

$fabrica->MostrarCostos();

if ($fabrica->Remove($p2)) {
    echo "Operario eliminado con éxito.<br/>";
} else {
    echo "No se pudo eliminar al operario.<br/>";
}

echo $fabrica->Mostrar();

$p5 = new Operario(5, "Lopez", "Maria");
if ($fabrica->Remove($p5)) {
    echo "Operario eliminado con éxito.<br/>";
} else {
    echo "No se pudo eliminar al operario.<br/>";
}

echo $fabrica->Mostrar();

/*  
// Crear objetos Operario
$op1 = new Operario(1, "Gomez", "Juan");
$op2 = new Operario(2, "Perez", "Ana");
$op3 = new Operario(3, "Rodriguez", "Luis");

// Crear objeto Fabrica
$fabrica = new Fabrica("Mi Fábrica");

// Agregar operarios a la fábrica
$fabrica->Add($op1);
$fabrica->Add($op2);
$fabrica->Add($op3);

// Mostrar operarios y costo total
echo $fabrica->MostrarOperarios() . "<br/>";
echo $fabrica->MostrarCostos() . "<br/>";

// Intentar agregar un operario que ya está en la fábrica
$fabrica->Add($op1);

// Quitar un operario de la fábrica
$fabrica->Remove($op2);

// Mostrar operarios y costo total después de quitar un operario
echo $fabrica->MostrarOperarios() . "<br/>";
echo $fabrica->MostrarCostos() . "<br/>";

// AUmentar Salario
$op1->SetAumentarSalario(15000);
$op2->SetAumentarSalario(2000);
$op3->SetAumentarSalario(0);

// Mostrar operarios y costo total después de quitar un operario

echo $fabrica->MostrarOperarios(). "<br/>";
echo $fabrica->MostrarCostos(). "<br/>";*/