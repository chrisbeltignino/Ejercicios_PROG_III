<?php
require_once "./BACKEND/clases/Empleado.php";
    
use Tignino\Empleado;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $id_perfil = $_POST['id_perfil'];
    $sueldo = $_POST['sueldo'];
    $foto = $_FILES['foto']['name'];

    // Realiza la validación y manejo de la subida de la foto aquí

    $empleado = new Empleado();
    $empleado->nombre = $nombre;
    $empleado->correo = $correo;
    $empleado->clave = $clave;
    $empleado->id_perfil = $id_perfil;
    $empleado->foto = $foto;
    $empleado->sueldo = $sueldo;

    $resultado = $empleado->Agregar();

    if ($resultado) {
        $response = ["éxito" => true, "mensaje" => "Empleado registrado con éxito."];
    } else {
        $response = ["éxito" => false, "mensaje" => "Error al registrar el empleado."];
    }

    echo json_encode($response);
}
?>