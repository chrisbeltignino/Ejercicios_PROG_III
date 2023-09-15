<?php

class Operario
{
    private $_legajo;
    private $_apellido;
    private $_nombre;
    private $_salario;

    public function __construct($legajo, $apellido, $nombre)
    {
        $this->_legajo = $legajo;
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_salario = 150000;
    }

    public function GetNombreApellido() : string
    {
        return $this->_apellido. ", ". $this->_nombre;
    }

    public function GetSalario() : float {
        return $this->_salario;
    }

    public function Mostrar() : string
    {
        return "Legajo: {$this->_legajo}<br/>Nombre y Apellido: {$this->GetNombreApellido()}<br/>Salario: {$this->_salario}<br/>";
    }

    public function MostrarOperario(Operario $op) {
        return $op->Mostrar();
    }

    public function SetAumentarSalario($porctenaje): void
    {
        $this->_salario += $this->_salario * $porctenaje / 100;
    }

    public function Equals(Operario $op1, Operario $op2) : bool
    {
        return ($op1->_nombre == $op2->_nombre) && ($op1->_apellido == $op2->_apellido) && ($op1->_legajo == $op2->_legajo);
    }
}