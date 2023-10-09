<?php
namespace Tignino
{
    interface IBM
    {
        public function Modificar():bool;
        public static function Eliminar(int $id):bool;
    }
}
?>