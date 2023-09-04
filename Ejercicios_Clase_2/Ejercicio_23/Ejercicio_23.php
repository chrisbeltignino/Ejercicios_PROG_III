<?php

require_once "./Vuelo_class.php";

// Crear objetos Pasajero
$pasajero1 = new Pasajero("Gomez", "Juan", "12345678", false);
$pasajero2 = new Pasajero("Perez", "Ana", "87654321", true);
$pasajero3 = new Pasajero("Rodriguez", "Luis", "11111111", false);

// Crear un objeto Vuelo
$vuelo = new Vuelo("Aerolineas Argentinas", 1000, 3);

// Agregar pasajeros al vuelo
$vuelo->AgregarPasajero($pasajero1);
$vuelo->AgregarPasajero($pasajero2);
$vuelo->AgregarPasajero($pasajero3);

// Mostrar detalles del vuelo
echo "Detalles del Vuelo:<br/>";
$vuelo->MostrarVuelo();
echo "<br/>";

// Intentar agregar un pasajero que ya está en el vuelo
$vuelo->AgregarPasajero($pasajero1);

// Calcular precio total del vuelo
$total = Vuelo::Add($vuelo, $vuelo);
echo "Precio total de los vuelos: $" . $total . "<br/>";

// Quitar un pasajero del vuelo
$vuelo->Remove($pasajero2);

// Mostrar detalles del vuelo después de quitar un pasajero
echo "Detalles del Vuelo después de quitar un pasajero:<br/>";
$vuelo->MostrarVuelo();