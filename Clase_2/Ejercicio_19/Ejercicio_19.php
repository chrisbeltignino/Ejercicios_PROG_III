<?php

/*
Aplicación No 19 (Figuras geométricas)
La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto, un
método getter y setter para el atributo _color, un método virtual (ToString) y dos métodos
abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del objeto
que lo invoque (retornar una serie de asteriscos que modele el objeto).
Ejemplo:
  *   *******
 ***  *******
***** *******
*/

require_once  "FiguraGeometrica_class.php";
require_once  "Rectangulo_class.php";
require_once  "Triangulo_class.php";

$rectangulo = new Rectangulo(50, 70);
$triangulo = new Triangulo(20, 20);

$rectangulo->setColor("red");
$triangulo->setColor("blue");

$color1 = $rectangulo->getColor();
$color2 = $triangulo->getColor();

$rectangulo->calcularDatos();
$triangulo->calcularDatos();

echo $rectangulo->__toString(). "<br/>";
echo $rectangulo->Dibujar($color1). "<br/>";

echo $triangulo->__toString(). "<br/>";
echo $triangulo->Dibujar($color2). "<br/>";

?>