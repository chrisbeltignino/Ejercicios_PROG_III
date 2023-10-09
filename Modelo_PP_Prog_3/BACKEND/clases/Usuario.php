<?php 
namespace Tignino
{
    require_once "IBM.php";

    class Usuario implements IBM
    {
        public $id;
        public $nombre;
        public $apellido;
        public $correo;
        public $clave;
        public $id_perfil;
        public $perfil;

        public function __construct($id= "", $nombre = "", $correo = "", $clave = "", $id_perfil = "", $perfil = "")
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->$id_perfil = intval($id_perfil);
            $this->perfil = $perfil;
        }

        public function ToJson(){
            $data = ["nombre" => $this->nombre, 
                     "correo" => $this->correo, 
                     "clave" => $this->clave];
            return json_encode($data);
        }

        public function Agregar(){
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "INSERT INTO usuarios (nombre, correo, clave, id_perfil) VALUES (:nombre, :correo, :clave, :id_perfil)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':clave', $this->clave);
            $stmt->bindParam(':id_perfil', $this->id_perfil);

            if($stmt->execute())
            {
                return true;
            } else {
                return false;
            }
        }

        public static function TraerTodos(){
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "SELECT * FROM usuarios";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $usuarios = [];

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
            {
                $usuario = new Usuario();
                $usuario->id = $row['id'];
                $usuario->nombre = $row['nombre'];
                $usuario->correo = $row['correo'];
                $usuario->clave = $row['clave'];
                $usuario->id_perfil = $row['id_perfil'];
                $usuario->perfil = $row['perfil'];
                $usuarios[] = $usuario;
            }

            return $usuarios;
        }

        public static function TraerUno($params)
        {
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "SELECT * FROM usuarios WHERE correo = :correo AND clave = :clave";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':correo', $params['correo']);
            $stmt->bindParam(':clave', $params['clave']);

            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($row)
            {
                $usuario = new Usuario();
                $usuario->id = $row['id'];
                $usuario->nombre = $row['nombre'];
                $usuario->correo = $row['correo'];
                $usuario->clave = $row['clave'];
                $usuario->id_perfil = $row['id_perfil'];
                $usuario->perfil = $row['perfil'];
                return $usuario;
            }
            return null;
        }

        public static function TraerTodosJSON(){
            $archivo = './BACKEND/archivos/usuarios.json';

            if(file_exists($archivo))
            {
                $json_data = file_get_contents($archivo);
                if($json_data)
                {
                    $usuarios = json_decode($json_data, true);
                    return $usuarios;
                }
            }
        }

        public function GuardarEnArchivo(){
            $archivo = './BACKEND/archivos/usuarios.json';
            $usuarios = self::TraerTodosJSON();

            if(!$usuarios)
            {
                $usuarios = [];
            }

            $usuarios[] = $this->ToJson();

            $json_data = json_decode($usuarios, JSON_PRETTY_PRINT);

            if(file_put_contents($archivo, $json_data))
            {
                return ["exito" => true, "mensaje" => "Usuario guardado con exito"];
            } else {
                return ["exito" => true, "mensaje" => "ERROR al guardar Usuario"];
            }
        }

        public function Modificar(): bool{
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "UPDATE usuarios SET nombre = :nombre, 
                                          correo = :correo, 
                                          clave = :clave, 
                                          id_perfil = :id_perfil
                                      WHERE id = :id";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':clave', $this->clave);
            $stmt->bindParam(':id_perfil', $this->id_perfil);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function Eliminar($id): bool{
            $pdo = new \PDO("mysql:hostname=localhost;dbname=usuario_test", "usuario", "contraseña");

            $query = "DELETE FROM usuarios WHERE id = :id";
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