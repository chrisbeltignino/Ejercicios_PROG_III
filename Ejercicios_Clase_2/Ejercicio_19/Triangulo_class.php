<?php

require_once "FiguraGeometrica_class.php";

class Triangulo extends FiguraGeometrica
{
    private $_base;
    private $_altura;

    public function __construct($base, $altura)
    {
        parent::__construct();
        $this->_base = $base;
        $this->_altura = $altura;
        $this->calcularDatos();
    }

    public function calcularDatos()
    {
        $this->_perimetro = 3 * $this->_base;
        $this->_superficie = (0.5 * $this->_base * $this->_altura);
    }

    public function Dibujar($color)
    {
        $dibujo = "<pre style='color: $color;'>";
        for($i = 0; $i < $this->_altura; $i++)
        {
            $espacios = $this->_altura - $i - 1;
            $asteriscos = $i * 2 + 1;
            $dibujo .= str_repeat("&nbsp", $espacios) . str_repeat("*", $asteriscos) . str_repeat(" ", $espacios) . "<br/>";
        }
        $dibujo .= "</pre>";
        return $dibujo;
    }

    public function __toString()
    {
        return "Triángulo - " . parent::__toString();
    }
}

?>