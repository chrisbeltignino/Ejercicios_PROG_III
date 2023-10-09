<?php
require_once "./BACKEND/clases/Usuario.php";

use Tignino\Usuario;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $id_perfil = $_POST['id_perfil'];

    $usuario = new Usuario();
    $usuario->nombre = $nombre;
    $usuario->correo = $correo;
    $usuario->clave = $clave;
    $usuario->id_perfil = $id_perfil;
    
    $resultado = $usuario->Agregar();

    echo json_encode($resultado);
}
?>