<?php

/**
    PARTE 1
    Enviar (por POST) a la página ./nexo.php:
    *-accion => 'agregar'
    *-nombre => 'su nombre'
    *-apellido => 'su apellido'
    *-legajo => 'su legajo'
    Recuperar los valores enviados y agregarlos al archivo ./archivos/alumnos.txt.
    El formato que deberá tener cada registro será el siguiente:
    legajo - apellido - nombre
    Indicar, a partir de un mensaje, si se pudo o no guardar al alumno.

    PARTE 2
    Enviar (por GET) a la página ./nexo.php:
    *-accion => 'listar'
    Recuperar el valor enviado y mostrar el contenido completo del archivo
    ./archivos/alumnos.txt.
    Cada registro se mostrará con el siguiente formato (un registro por fila):
    legajo - apellido - nombre

    PARTE 3
    Enviar (por POST) a la página ./nexo.php:
    *-accion => 'verificar'
    *-legajo => 'su legajo'
    Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la
    existencia de un registro que coincida con el legajo recuperado.
    ● Si se encuentra, mostrar:
    'El alumno con legajo 'xxx' se encuentra en el listado'
    ● Si no se encuentra, mostrar el siguiente mensaje:
    'El alumno con legajo 'xxx' no se encuentra en el listado'
    Siendo 'xxx' el valor del legajo enviado por POST.

    PARTE 4
    Enviar (por POST) a la página ./nexo.php:
    *-accion => 'modificar'
    *-nombre => 'un nombre'
    *-apellido => 'un apellido'
    *-legajo => 'un legajo'
    Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la
    existencia de un registro que coincida con el legajo recuperado.
    ● Si se encuentra, reemplazar el apellido y el nombre del archivo, por los
    valores recuperados por POST.
    Mostrar un mensaje que diga: 'El alumno con legajo 'xxx' se ha modificado'
    ● Si no se encuentra, mostrar el siguiente mensaje:
    'El alumno con legajo 'xxx' no se encuentra en el listado'
    Siendo 'xxx' el valor del legajo enviado por POST.

    PARTE 5
    Enviar (por POST) a la página ./nexo.php:
    *-accion => 'borrar'
    *-legajo => 'un legajo'
    Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la
    existencia de un registro que coincida con el legajo recuperado.
    ● Si se encuentra, borrar el archivo.
    Mostrar un mensaje que diga: 'El alumno con legajo 'xxx' se ha borrado'
    ● Si no se encuentra, mostrar el siguiente mensaje:
    'El alumno con legajo 'xxx' no se encuentra en el listado'
    Siendo 'xxx' el valor del legajo enviado por POST.

    PARTE 6
    Tomando como punto de partida las funcionalidades anteriores, se pide:
    Crear la clase Alumno (en un namespace nombrado con su apellido) con los
    atributos y métodos necesarios para realizar el CRUD sobre el archivo
    ./archivos/alumnos.txt.
    Las peticiones realizarlas sobre la página ./nexo_poo.php.

    PARTE 7
    Agregar a la clase Alumno el atributo 'foto' (string) y modificar los métodos
    necesarios para realizar el CRUD sobre el archivo ./archivos/alumnos_foto.txt,
    que ahora tendrá el siguiente formato:
    legajo - apellido - nombre - foto (el path)
    La foto guardarla en ./fotos y su nombre será:
    ● legajo.extension

    Probar que el CRUD funcione correctamente en ./nexo_poo_foto.php.

    PARTE 8
    Agregar, en ./nexo_poo_foto.php:
    1.- el caso "obtener":
    retorna un var_dump() del objeto de tipo alumno que coincida con el legajo
    recibido como parámetro.
    NOTA: agregar un método en alumno que reciba como parámetro un legajo y retorne
    un objeto de tipo Alumno.
    2.- el caso "redirigir":
    Se invoca al método que verifica la existencia de un alumno por su legajo.
    Si se encuentra:
    redirigir hacia la página 'principal.php' (crearla en el raíz).
    Si no se encuentra, mostrar el siguiente mensaje:
    'El alumno con legajo 'xxx' no se encuentra en el listado'
    Siendo 'xxx' el valor del legajo enviado por POST.
    */
//$archivo = isset($_POST["archivo"]) ? $_POST["archivo"] : NULL;

//PATHINFO RETORNA UN ARRAY CON INFORMACION DEL PATH
//RETORNA : NOMBRE DEL DIRECTORIO; NOMBRE DEL ARCHIVO; EXTENSION DEL ARCHIVO

//PATHINFO_DIRNAME - retorna solo nombre del directorio
//PATHINFO_BASENAME - retorna solo el nombre del archivo (con la extension)
//PATHINFO_EXTENSION - retorna solo extension
//PATHINFO_FILENAME - retorna solo el nombre del archivo (sin la extension)

/**
1)Se importa la clase Alumno del namespace Tignino utilizando use.

2)La función AgregarImagen se encarga de subir una imagen al directorio de fotos (./archivos/fotos/) y devuelve la ruta de la imagen. 
Verifica el tipo de archivo, su tamaño y si ya existe un archivo con el mismo nombre.

3)Se recuperan los valores POST para determinar el tipo de ejemplo a ejecutar, el legajo, el apellido y el nombre del alumno.

4)El código utiliza un switch para realizar diferentes acciones según el tipo de ejemplo especificado en el formulario:
    -En el caso "agregar," se agrega un alumno con una imagen al archivo alumnos_foto.txt y se llama a la función Alumno::agregar.
    -En el caso "listar," se muestra el contenido del archivo alumnos_foto.txt llamando a Alumno::listar.
    -En el caso "obtener," se verifica si un alumno con un legajo específico existe en el archivo y se muestra el resultado llamando a Alumno::verificar.
    -En el caso "modificar," se modifica un alumno con una imagen en el archivo alumnos_foto.txt llamando a Alumno::modificar.
    -En el caso "eliminar," se elimina un alumno del archivo alumnos_foto.txt llamando a Alumno::borrar.

5)En el caso "redirigir," se verifica si un alumno con un legajo específico existe y, si es así, se redirige a una página de inicio 
(principal.php) y se establece una cookie.

6)El código incluye enlaces para volver a la página de inicio.

Este código permite realizar operaciones básicas de creación, lectura, actualización y eliminación (CRUD) de registros de alumnos, 
incluyendo el manejo de imágenes. Además, tiene una opción para redirigir a una página de inicio después de verificar la existencia de un alumno.
 */

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
            header('Location: http://localhost/Programacion_3/Ejercicio_CRUD/principal.php');
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