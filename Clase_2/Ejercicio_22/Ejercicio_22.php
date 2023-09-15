<?php

require_once "./Garaje_class.php";

// Crear objetos Auto
$auto1 = new Auto("Toyota", "Rojo");
$auto2 = new Auto("Ford", "Azul");
$auto3 = new Auto("Honda", "Negro");

// Crear un Garage
$miGarage = new Garage("Mi Garage", 10.0);

// Mostrar detalles del Garage
echo "Detalles del Garage:<br/>";
$miGarage->MostrarGarage();
echo "<br/>";

// Agregar autos al Garage
$miGarage->AddAuto($auto1);
$miGarage->AddAuto($auto2);
$miGarage->AddAuto($auto3);

// Mostrar detalles del Garage después de agregar autos
echo "Detalles del Garage después de agregar autos:<br/>";
$miGarage->MostrarGarage();
echo "<br/>";

// Intentar agregar un auto que ya está en el Garage
$miGarage->AddAuto($auto1);

// Quitar un auto del Garage
$miGarage->Remove($auto2);

// Mostrar detalles del Garage después de quitar un auto
echo "Detalles del Garage después de quitar un auto:<br/>";
$miGarage->MostrarGarage();