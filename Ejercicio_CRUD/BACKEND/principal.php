<?php

/**
1)Se inicia la sesión con session_start() para poder acceder a las variables de sesión.

2)Se imprime un título en la página con <h1>.

3)Se muestra el valor almacenado en la variable de sesión $_SESSION["legajo"] como un título de nivel 1 (<h1>).

4)Se muestra el valor almacenado en las variables de sesión $_SESSION["apellido"] y $_SESSION["nombre"] como un título de nivel 2 (<h2>) para mostrar el nombre completo.

5)Se muestra una imagen utilizando la ruta almacenada en la variable de sesión $_SESSION["foto"]. La etiqueta <img> se utiliza para mostrar la imagen.

6)Se crea una tabla con una fila que muestra el legajo, el apellido, el nombre y la ruta de la foto almacenada en las variables de sesión.

7)Se agregan líneas en blanco para separar el contenido.

8)Se agrega un enlace <a> que redirige a la página de inicio (http://localhost/Programacion_3/Ejercicio_CRUD/index.html).

En resumen, este código muestra información almacenada en las variables de sesión y permite al usuario volver a la página de inicio mediante un enlace.
 */

// Inicia la sesión para acceder a las variables de sesión.
session_start();

// Imprime un título en la página.
echo "<h1> PAGINA PRINCIPAL </h1>";

// Muestra el legajo almacenado en la variable de sesión.
echo "<h1>".$_SESSION["legajo"]."</h1>";

// Muestra el apellido y el nombre almacenados en las variables de sesión.
echo "<h2>".$_SESSION["apellido"]." ".$_SESSION["nombre"]."</h1>";

// Muestra una imagen usando la ruta de la foto almacenada en la variable de sesión.
echo "<img src=".$_SESSION["foto"]." />";

// Muestra una tabla con información de legajo, apellido, nombre y ruta de la foto.
echo "<table><tr><td>".$_SESSION["legajo"]."</td><td>".$_SESSION["apellido"]." ".$_SESSION["nombre"]."</td><td>".$_SESSION["foto"]."</td></tr></table>";

// Añade líneas en blanco para separar el contenido.
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";

// Agrega un enlace para volver a la página de inicio.
echo" <a href=http://localhost/Programacion_3/Ejercicio_CRUD/index.html>Volver a Inicio</a>";