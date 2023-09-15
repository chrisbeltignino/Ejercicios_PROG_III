<?php

class Pasajero 
{
    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_esPlus;

    public function __construct($apellido, $nombre, $dni, $esPlus)
    {
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_dni = $dni;
        $this->_esPlus = $esPlus;
    }

    public function Equals(Pasajero $pasajero)
    {
        return $this->_dni == $pasajero->_dni;
    }

    public function GetInfoPasajero()
    {
        return "Apellido: " . $this->_apellido. "<br/>Nombre: ". $this->_nombre. "<br/>DNI: ". $this->_dni. "<br/>PLUS: ". ($this->_esPlus ? "SI":"NO");
    }

    public function GetPlus()
    {
        return $this->_esPlus;
    }

    public static function MostrarPasajero(Pasajero $pasajero) {
        echo $pasajero->GetInfoPasajero() . "<br/>";
    }
}