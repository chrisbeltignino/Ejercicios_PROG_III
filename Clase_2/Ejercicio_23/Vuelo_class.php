<?php

require_once "./Pasajero_class.php";

class Vuelo 
{
    private $_fecha;
    private $_empresa;
    private $_precio;
    private $_listaDePasajeros = array();
    private $_cantMax;

    public function __construct($empresa, $precio, $_cantMax = 0)
    {
        $this->_fecha = new DateTime();
        $this->_empresa = $empresa;
        $this->_precio = $precio;
        $this->_cantMax = $_cantMax;
    }

    public function AgregarPasajero($pasajero)
    {
        if(!$this->ExistePasajero($pasajero))
        {
            if($this->HayEspacio())
            {
                $this->_listaDePasajeros[] = $pasajero;
                echo "Pasajero agregado al vuelo.<br>";
                return true;
            } else {
                echo "El vuelo estaa completo. No se pudo agregar el pasajeros.<br>";
                return false;
            }
        }else {
            echo "El pasajero ya esta en el vuelo.<br>";
            return false;
        }
    }

    public function MostrarVuelo()
    {
        echo "Fecha: ". $this->_fecha->format('d/m/Y'). "<br>";
        echo "Empresa: ". $this->_empresa. "<br>";
        echo "Precio: ". $this->_precio. "<br>";
        echo "Cantidad Maxima de Pasajero: " . $this->_cantMax . "<br>";
        echo "Informacion de Pasajeros: <br>";
        
        foreach($this->_listaDePasajeros as $pasajero)
        {
            Pasajero::MostrarPasajero($pasajero);
        }
        echo "<br>";
    }

    public function GetCantMax()
    {
        return $this->_cantMax;
    }

    public static function Add(Vuelo $vuelo1, Vuelo $vuelo2) {
        $total = $vuelo1->CalcularPrecio() + $vuelo2->CalcularPrecio();
        return $total;
    }

    public function Remove(Pasajero $pasajero)
    {
        if($this->ExistePasajero($pasajero))
        {
            foreach($this->_listaDePasajeros as $key => $p)
            {
                if($p->Equals($pasajero))
                {
                    unset($this->_listaDePasajeros[$key]);
                    echo "Pasajero eliminado.<br>";
                    return $this;
                }
            }
        } else {
            echo "El pasajero no esta en el vuelo.<br>";
            return $this;
        }
    }

    private function ExistePasajero(Pasajero $pasajero)
    {
        foreach($this->_listaDePasajeros as $p)
        {
            if($p->Equals($pasajero))
                return true;
        }
        return false;
    }

    private function HayEspacio()
    {
        return count($this->_listaDePasajeros) < $this->_cantMax || $this->_cantMax == 0;
    }

    private function CalcularPrecio() {
        $precioTotal = 0;
        foreach ($this->_listaDePasajeros as $pasajero) {
            $descuento = $pasajero->GetPlus() ? 0.20 : 0;
            $precioTotal += $this->_precio * (1 - $descuento);
        }
        return $precioTotal;
    }
}