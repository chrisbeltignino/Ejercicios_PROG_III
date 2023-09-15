<?php

require_once "./Operario_class.php";

class Fabrica 
{
    private $_cantMax = 5;
    private $_operario = [];
    private $_razonSocial;

    public function __construct(string $rs)
    {
        $this->_razonSocial = $rs;
    }

    private function RetornarCostos() : float
    {
        $costo = 0.0;
        foreach ($this->_operario as $operario) {
            $costo += $operario->GetSalario();
        }
        return $costo;
    }

    public function MostrarOperarios() : string
    {
        $resultado = "";
        foreach ($this->_operario as $operario) 
        {
            $resultado.= $operario->GetNombreApellido(). "<br/>";
        }
        return $resultado;
    }

    public function MostrarCostos() : void
    {
        $costosTotal = $this->RetornarCostos();
        echo "Costos Total de salarios en la fabrica {$this->_razonSocial}: $" . number_format($costosTotal, 2) . "<br/>";
    }

    public static function Equals(Fabrica $fabrica, Operario $op) : bool
    {
        foreach ($fabrica->_operario as $operario)
        {
            if ($operario->Equals($operario, $op))
            {
                return true;
            }
        }
        return false;
    }

    public function Add(Operario $op) : bool
    {
        if (count($this->_operario) < $this->_cantMax && !$this->Equals($this,$op))
        {
            $this->_operario[] = $op;
            return true;
        }
        return false;
    }

    public function Remove(Operario $op) : bool
    {
        foreach ($this->_operario as $key => $operario)
        {
            if ($operario->Equals($operario, $op))
            {
                unset($this->_operario[$key]);
                return true;
            }
        }
        return false;
    }

    public function Mostrar() : string
    {
        return "Razón Social: {$this->_razonSocial}<br/>Cantidad de Operarios: " . count($this->_operario) . "<br/>";
    }
}