<?php
namespace Tignino
{
    interface ICRUD {
        public static function TraerTodos();
        public function Agregar():bool;
        public function Modificar():bool;
        public static function Eliminar($id):bool;
    }
}
?>