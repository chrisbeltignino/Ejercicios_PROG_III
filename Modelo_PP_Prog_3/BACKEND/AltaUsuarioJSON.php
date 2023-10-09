<?php
require_once "./BACKEND/clases/Usuario.php";

use Tignino\Usuario;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $usuario = new Usuario();
    $usuario->nombre = $nombre;
    $usuario->correo = $correo;
    $usuario->clave = $clave;

    $resultado = $usuario->GuardarEnArchivo();

    echo json_encode($resultado);
}
?>