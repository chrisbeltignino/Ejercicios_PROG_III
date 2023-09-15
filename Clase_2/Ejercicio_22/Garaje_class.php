<?php

require_once "./Auto_class.php";

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = array();

    public function __construct($razonSocial, $precioPorHora = 0.0)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
    }

    public function MostrarGarage()
    {
        echo "Razon Social: ". $this->_razonSocial. "<br>";
        echo "Precio por hora: $". $this->_precioPorHora. "<br>";
        echo "Auto en el Garage: <br>";
        foreach ($this->_autos as $auto) {
            Auto::MostrarAuto($auto);
            echo "<br>";
        }
    }

    public function Equals(Auto $auto)
    {
        foreach($this->_autos as $a)
        {
            if($a->Equals($auto))
            {
                return true;
            }
        }
    }

    public function AddAuto(Auto $auto)
    {
        if(!$this->Equals($auto))
        {
            $this->_autos[] = $auto;
            echo "Auto agregado al Garage.<br/>";
        } else {
            echo "El Auto ya esta en el Garage.<br/>";
        }
    }

    public function Remove(Auto $auto)
    {
        if(in_array($auto, $this->_autos))
        {
            unset($this->_autos[array_search($auto, $this->_autos)]);
            echo "Auto eliminado del Garage.<br/>";
        } else {
            echo "El Auto no esta en el Garage.<br/>";
        }
    }
}