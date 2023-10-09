<?php
namespace Tignino
{
    require_once "Usuario.php";
    require_once "ICRUD.php";
    require_once "IBM.php";

    use Tignino\Usuario;
    use Tignino\ICRUD;
    use Tignino\IBM;
    
    class Empleado extends Usuario implements ICRUD, IBM{

        public $foto;
        public $sueldo;

        public function __construct($foto = "", $sueldo = "")
        {
            parent::__construct();
            $this->foto = $foto;
            $this->sueldo = intval($sueldo);
        }

        public static function TraerTodos(){
            // Agregar un nuevo registro en la tabla empleados
            // Implementa este método
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "SELECT id, nombre 
                        AS nombre, correo 
                        AS correo, clave 
                        AS clave, id_perfil 
                        AS id_perfil, foto 
                        AS foto, sueldo 
                        AS sueldo 
                        FROM empleados";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $usuarios = [];

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
            {
                $usuario = new Empleado();
                $usuario->id = $row['id'];
                $usuario->nombre = $row['nombre'];
                $usuario->correo = $row['correo'];
                $usuario->clave = $row['clave'];
                $usuario->id_perfil = $row['id_perfil'];
                $usuario->foto = $row['foto'];
                $usuario->sueldo = $row['sueldo'];
                $usuario->perfil = $row['perfil'];
                $usuarios[] = $usuario;
            }

            return $usuarios;
        }

        public function Agregar():bool{
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "INSERT INTO empleados (nombre, correo, clave, id_perfil, foto, sueldo)
                      VALUES(:nombre, :correo, :clave, :id_perfil, :foto, :sueldo)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':clave', $this->clave);
            $stmt->bindParam(':id_perfil', $this->id_perfil);
            $stmt->bindParam(':foto', $this->foto);
            $stmt->bindParam(':sueldo', $this->sueldo);

            if($stmt->execute())
            {
                return true;
            } else {
                return false;
            }
        }

        public function Modificar():bool{
            // Modificar en la base de datos el registro coincidente con la instancia actual (comparar por id)
            // Implementa este método
            $pdo = new \PDO("mysql:host=localhost;dbname=usuarios_test", "usuario", "contraseña");

            $query = "UPDATE empleados SET nombre = :nombre, 
                                           correo = :correo, 
                                           clave = :clave, 
                                           id_perfil = :id_perfil, 
                                           foto = :foto, 
                                           sueldo = :sueldo 
                                       WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':clave', $this->clave);
            $stmt->bindParam(':id_perfil', $this->id_perfil);
            $stmt->bindParam(':foto', $this->foto);
            $stmt->bindParam(':sueldo', $this->sueldo);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function Eliminar($id):bool{
            // Eliminar de la base de datos el registro coincidente con el id recibido como parámetro
            // Implementa este método
            $pdo = new \PDO("mysql:host=localhost;dbname=usuarios_test", "usuario", "contraseña");

            $query = "DELETE FROM empleados WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
}
?>