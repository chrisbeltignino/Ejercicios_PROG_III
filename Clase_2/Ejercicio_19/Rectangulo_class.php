<?php

require_once  "FiguraGeometrica_class.php";

class Rectangulo extends FiguraGeometrica {

    private  $_ladoUno;
    private  $_ladoDos;

    public function __construct($ladoUno, $ladoDos) {
        parent::__construct();
        $this->_ladoUno = $ladoUno;
        $this->_ladoDos = $ladoDos;
        $this->calcularDatos();
    }

    public function calcularDatos()
    {
        $this->_perimetro = 2 * ($this->_ladoUno + $this->_ladoDos);
        $this->_superficie = $this->_ladoUno + $this->_ladoDos;
    }

    public function Dibujar($color)
    {
        $dibujo = "<pre style='color: $color;'>";
        for($i = 0; $i < $this->_ladoDos; $i++)
        {
            $dibujo .= str_repeat("*", $this->_ladoUno) . "<br/>";
        }
        $dibujo .= "</pre>";
        return $dibujo;
    }

    public function __toString()
    {
        return "Rectángulo - " . parent::__toString();
    }
}

?>