<?php
require_once "./BACKEND/clases/Usuario.php";

use Tignino\Usuario;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $data = json_decode(file_get_contents('php://input'), true);
    
    if(isset($data['id']) && isset($data['nombre']) && isset($data['correo']) && isset($data['clave']) && isset($data['id_perfil']))
    {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $correo = $data['correo'];
        $clave = $data['clave'];
        $id_perfil = $data['id_perfil'];

        $usuario = new Usuario();
        $usuario->id = $id;
        $usuario->nombre = $nombre;
        $usuario->correo = $correo;
        $usuario->clave = $clave;
        $usuario->id_perfil = $id_perfil;

        $resultado = $usuario->Modificar();

        echo json_encode($resultado);
    } else {
        echo json_encode([
            'exito' => false,
            'mensaje' => 'Datos incompletos',
        ]);
    }
}
?>