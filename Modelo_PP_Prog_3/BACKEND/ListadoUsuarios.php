<!DOCTYPE html>
<html>
<head>
    <title>Listado de Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>ID Perfil</th>
            <th>Perfil</th>
        </tr>
        <?php
        require_once "./BACKEND/clases/Usuario.php";

        use Tignino\Usuario;
        // Llamar al método TraerTodos de la clase Usuario
        $usuarios = Usuario::TraerTodos();

        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>" . $usuario->id . "</td>";
            echo "<td>" . $usuario->nombre . "</td>";
            echo "<td>" . $usuario->correo . "</td>";
            echo "<td>" . $usuario->id_perfil . "</td>";
            echo "<td>" . $usuario->perfil . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>