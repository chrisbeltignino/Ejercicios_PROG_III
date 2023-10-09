<?php

namespace Tignino;
use PDO;
use PDOException;

class AccesoDatos
{
    private static AccesoDatos $objetoAccesoDatos;
    private PDO $objetoPDO;

    private function __construct()
    {
        try {
            $usuario = 'root';
            $clave = '';

            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8');
        } catch (PDOException $e) {
            print 'Error!<br/>' . $e->getMessage();

            die();
        }
    }

    public function retornarConsulta(string $sql)
    {
        return $this->objetoPDO->query($sql);
    }

    public static function TraerUnObjeto() : AccesoDatos
    {
        if(!isset(self::$objetoAccesoDatos))
        {
            self::$objetoAccesoDatos = new AccesoDatos();
        }

        return self::$objetoAccesoDatos;
    }

    public function __clone()
    {
        trigger_error('La clonacion de este objeto no esta permitida', E_USER_WARNING);
    }
}

?>