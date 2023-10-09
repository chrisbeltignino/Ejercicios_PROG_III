<?php
require_once "./BACKEND/clases/Usuario.php";

use Tignino\Usuario;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Llamar al método Eliminar de la clase Usuario
        $resultado = Usuario::Eliminar($id);

        echo json_encode($resultado);
    } else {
        echo json_encode([
            "éxito" => false,
            "mensaje" => "ID de usuario no proporcionado."
        ]);
    }
}
?>