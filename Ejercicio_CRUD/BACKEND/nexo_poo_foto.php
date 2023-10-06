<?php

// Se requiere el archivo Tignino.php que contiene la definición de la clase Alumno en el namespace Tignino.
require_once("Tignino.php");

// Se importa la clase Alumno del namespace Tignino.
use Tignino\Alumno;

// Se limpian las variables de sesión.
session_unset();

// Función para agregar una imagen al directorio de fotos y devolver la ruta de la imagen.
function AgregarImagen(): string
{
    // Ruta de destino para guardar la imagen en el directorio de fotos.
    $destino = "./archivos/fotos/" . $_FILES["archivo"]["name"];
    $uploadOk = TRUE;

    var_dump(pathinfo($destino));

    $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);
    echo $tipoArchivo;

    // Verifica si el archivo ya existe.
    if (file_exists($destino)) {
        echo "El archivo ya existe. Verifique!!!";
        $uploadOk = FALSE;
    }
    
    // Verifica el tamaño máximo del archivo.
    if ($_FILES["archivo"]["size"] > 500000 ) {
        echo "El archivo es demasiado grande. Verifique!!!";
        $uploadOk = FALSE;
    }
    
    // Verifica si el archivo es una imagen.
    $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);
    
    if ($esImagen === FALSE) { // No es una imagen.
        // Solo se permiten ciertas extensiones.
        if ($tipoArchivo != "doc" && $tipoArchivo != "txt" && $tipoArchivo != "rar") {
            echo "Solo son permitidos archivos con extension DOC, TXT o RAR.";
            $uploadOk = FALSE;
        }
    } else { // Es una imagen.
        // Solo se permiten ciertas extensiones de imagen.
        if ($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
            && $tipoArchivo != "png") {
            echo "Solo son permitidas imágenes con extensiones JPG, JPEG, PNG o GIF.";
            $uploadOk = FALSE;
        }
    }
    
    // Verifica si hubo algún error durante la subida del archivo.
    if ($uploadOk === FALSE) {
        echo "<br/>NO SE PUDO SUBIR EL ARCHIVO.";
    } else {
        // Mueve el archivo del directorio temporal al destino final.
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {
            echo "<br/>El archivo " . basename($_FILES["archivo"]["name"]) . " ha sido subido exitosamente.";
        } else {
            echo "<br/>Lamentablemente ocurrió un error y no se pudo subir el archivo.";
        }
    }
    
    return $destino;
}

// Recupera todos los valores POST.
$tipoEjemplo = isset($_POST["tipoEjemplo"]) ? $_POST["tipoEjemplo"] : 0;
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : NULL;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : NULL;

switch ($tipoEjemplo) {
    case "agregar": // Create (Alta)
        $path = AgregarImagen();
        $obj = new Alumno($legajo, $apellido, $nombre, $path);

        if (Alumno::agregar($obj)) {
            echo "<h2>Registro AGREGADO</h2><br/>";
        }
        break;

    case "listar": // Read (listar)
        echo Alumno::listar();
        break;

    case "obtener":
        echo Alumno::verificar($legajo);
        var_dump(Alumno::verificar($legajo));
        break;

    case "modificar": // Update (Modificar)
        $path = AgregarImagen();
        $obj = new Alumno($legajo, $apellido, $nombre, $path);

        if (Alumno::modificar($obj)) {
            echo "<h2>Registro MODIFICADO</h2><br/>";
        }
        break;

    case "eliminar": // Delete (Borrar)
        if (Alumno::borrar($legajo)) {
            echo "<h2>Registro BORRADO</h2><br/>";
        }
        break;

    case "redirigir":
        $respuesta = Alumno::verificar($legajo);
        if ($respuesta == "El alumno con legajo {$legajo} se encuentra en el listado") {
            $alum = new Alumno(0, "", "", "");
            $alum = Alumno::Obtener($legajo);
            session_start();
            $_SESSION["legajo"] = $legajo;
            $_SESSION["apellido"] = $alum->apellido;
            $_SESSION["nombre"] = $alum->nombre;
            $_SESSION["foto"] = $alum->foto;
            header('Location: http://localhost/Programacion_3/Ejercicio_CRUD/BACKEND/principal.php');
            $hora = date("Y-m-d H:i:s");
            setcookie("Ingreso del alumno legajo $legajo, a las $hora)");
        } else {
            echo $respuesta;
            header('Location: http://localhost/Programacion_3/Ejercicio_CRUD/index.html');
        }
        break;

    default:
        echo "<h2>Sin ejemplo</h2>";
}

echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "<a href=http://localhost/Programacion_3/Ejercicio_CRUD/index.html>Volver a Inicio</a>";