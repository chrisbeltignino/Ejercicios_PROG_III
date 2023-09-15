<?php

abstract class FiguraGeometrica {
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {
        $this->_color = "Sin color";
    }

    public abstract function calcularDatos();

    public function Dibujar($color) {
        return str_repeat("*", 10);
    }

    public function getColor() {
        return $this->_color;
    }

    public function setColor($color) {
        $this->_color = $color;
    }

    public function __toString()
    {
        return "Color: ". $this->_color . ", Perimetro: " . $this->_perimetro . ", Superficie: " . $this->_superficie;
    }
}

?>