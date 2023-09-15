<?php

require_once "./Punto_class.php";

class Rectangulo
{
    private $_vertice1;
    private $_vertice2;
    private $_vertice3;
    private $_vertice4;
    private $_area;
    private $_ladoUno;
    private $_ladoDos;
    private $_perimetro;
    
    public function __construct(Punto $vertice1, Punto $vertice3)
    {
        $this->_vertice1 = $vertice1;
        $this->_vertice3 = $vertice3;

        $this->_vertice2 = new Punto($this->_vertice3->GetX(), $this->_vertice1->GetY());
        $this->_vertice4 = new Punto($this->_vertice1->GetX(), $this->_vertice3->GetY());
    
        $this->_ladoUno = abs($this->_vertice3->GetX() - $this->_vertice1->GetX());
        $this->_ladoDos = abs($this->_vertice3->Gety() - $this->_vertice1->GetY());
        $this->_area = $this->_ladoUno * $this->_ladoDos;

        $this->_perimetro = 2 * ($this->_ladoUno + $this->_ladoDos);
    }

    public function Dibujar()
    {
        $dibujo = "<pre>";
        
        for($i = 0; $i < $this->_vertice1->GetY(); $i++)
        {
            $dibujo .= str_repeat("&nbsp", $this->_vertice1->GetX()) . str_repeat("*", $this->_ladoUno) . "\n";
        }
        $dibujo .= "</pre>";

        return $dibujo;
    }

    public function GetLadoUno()
    {
        return $this->_ladoUno;
    }
    public function GetLadoDos()
    {
        return $this->_ladoDos;
    }
    public function GetArea()
    {
        return $this->_area;
    }
    public function GetPerimetro()
    {
        return $this->_perimetro;
    }

}