<?php

require_once "./BACKEND/clases/Usuario.php";

use Tignino\Usuario;

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    // Llamar al método TraerTodosJSON de la clase Usuario
    $usuarios = Usuario::TraerTodosJSON();

    // Devolver la lista de usuarios en formato JSON
    echo json_encode($usuarios);
}
?>