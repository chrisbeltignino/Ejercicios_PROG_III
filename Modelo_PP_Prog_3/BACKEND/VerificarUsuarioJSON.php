<?php
require_once "./BACKEND/clases/Usuario.php";

use Tignino\Usuario;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $data = json_decode(file_get_contents("php://input"), true);

    if(isset($data['correo']) && isset($data['clave']))
    {
        $correo = $data['correo'];
        $clave = $data['clave'];

        // Llamar al método TraerUno de la clase Usuario
        $usuario = Usuario::TraerUno(['correo' => $correo, 'clave' => $clave]);

        if($usuario)
        {
            echo json_encode([
                "exito" => true,
                "mensaje" => "Usuario verificado",
                "usuario" => $usuario->ToJson()
            ]);
        } else {
            echo json_encode([
                'exito' => false, 
                'mensaje' => 'Usuario no encontrado'
            ]);
        }
    } else {
        echo json_encode([
            'exito' => false,
            'mensaje' => 'Datos incompletos'
        ]);
    }
}
?>