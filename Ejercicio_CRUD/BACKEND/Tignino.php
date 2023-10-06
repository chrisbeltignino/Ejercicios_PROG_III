<?php

/**
 * Se define un namespace llamado "Tignino" que agrupará la clase "Alumno".
1)Se importa la clase "Alumno" del mismo namespace y se la renombra como "InstitucionAlumno".

2)Se define la clase "Alumno" con sus atributos públicos, constructor y métodos estáticos para 
agregar, listar, verificar, modificar, borrar y obtener alumnos.

3)Los métodos lToString y ParseL son utilitarios para convertir el legajo entre int y string.

4)Los métodos estáticos utilizan funciones de manejo de archivos para realizar operaciones en 
el archivo "alumnos_foto.txt". Cada método realiza una tarea específica, como agregar, listar, verificar, modificar y borrar alumnos.

5)El método Obtener busca un alumno por legajo y crea un objeto Alumno con los datos encontrados.

6)Este código maneja la interacción con un archivo de texto donde se almacenan los datos de los
 alumnos, permite realizar diversas operaciones CRUD (Crear, Leer, Actualizar y Borrar)
 */

namespace Tignino {
    // Importamos la clase Alumno del mismo namespace y la renombramos como InstitucionAlumno.
    use Tignino\Alumno as InstitucionAlumno;

    // Definición de la clase Alumno en el namespace Tignino.
    class Alumno {
        // Atributos públicos de la clase Alumno.
        public int $legajo;
        public string $foto;
        public string $apellido;
        public string $nombre;

        // Constructor de la clase Alumno, recibe el legajo, apellido, nombre y el path de la foto.
        public function __construct(int $legajo, string $apellido, string $nombre, string $path) {
            $this->legajo = $legajo;
            $this->apellido = $apellido;
            $this->nombre = $nombre;
            $this->foto = $path;        
        }

        // Métodos para convertir el legajo a cadena y viceversa.
        public function lToString(): string {
            return (string)$this->legajo;
        }

        public function ParseL(string $num): int {
            return (int)$num;
        }

        // Método estático para agregar un alumno al archivo.
        public static function agregar(Alumno $obj): bool {
            $retorno = false;
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "a");
    
            // ESCRIBE EN EL ARCHIVO 
            $cant = fwrite($ar, "{$obj->legajo}-{$obj->apellido}-{$obj->nombre}-{$obj->foto}\r\n");
    
            if ($cant > 0) {
                $retorno = true;			
            }

            // CIERRA EL ARCHIVO
            fclose($ar);
    
            return $retorno;
        }

        // Método estático para listar todos los alumnos en el archivo.
        public static function listar(): string {
            $retorno = "";
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "r");
    
            // LEE LÍNEA POR LÍNEA DEL ARCHIVO 
            while (!feof($ar)) {
                $retorno .= fgets($ar);		
            }
    
            // CIERRA EL ARCHIVO
            fclose($ar);
    
            return $retorno;
        }

        // Método estático para verificar si un alumno con un legajo dado existe en el archivo.
        public static function verificar(int $legajo): string {
            $retorno ="No se encontró el alumno con el legajo {$legajo}";
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "r");
    
            // LEE LÍNEA POR LÍNEA DEL ARCHIVO 
            while (!feof($ar)) {
                $linea = fgets($ar);
                $array_linea = explode("-", $linea);
                $array_linea[0] = trim($array_linea[0]);
                if ($array_linea[0] != "") {
                    // RECUPERA LOS CAMPOS
                    $legajo_archivo = trim($array_linea[0]);
                    $apellido_archivo = trim($array_linea[1]);
                    $nombre_archivo = trim($array_linea[2]);
                    $foto_archivo = trim($array_linea[3]);
                    if ($legajo_archivo == $legajo) {
                        $retorno = "El alumno con legajo {$legajo} se encuentra en el listado";
                        break;
                    }
                }		
            }
    
            // CIERRA EL ARCHIVO
            fclose($ar);
    
            return $retorno;
        }

        // Método estático para modificar los datos de un alumno en el archivo.
        public static function modificar(Alumno $obj): bool {
            $retorno = false;
    
            $alumnos = array();
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "r");
    
            // LEE LÍNEA POR LÍNEA DEL ARCHIVO 
            while (!feof($ar)) {
                $linea = fgets($ar);
                $array_linea = explode("-", $linea);
    
                $array_linea[0] = trim($array_linea[0]);
    
                if ($array_linea[0] != "") {
                    // RECUPERA LOS CAMPOS
                    $legajo_archivo = trim($array_linea[0]);
                    $apellido_archivo = trim($array_linea[1]);
                    $nombre_archivo = trim($array_linea[2]);
                    $foto_archivo = trim($array_linea[3]);
    
                    if ($legajo_archivo == $obj->legajo) { 
                        array_push($alumnos, "{$legajo_archivo}-{$obj->apellido}-{$obj->nombre}-{$obj->foto}\r\n");
                    } else {
                        array_push($alumnos, "{$legajo_archivo}-{$apellido_archivo}-{$nombre_archivo}-{$foto_archivo}\r\n");
                    }
                }
            }
    
            // CIERRA EL ARCHIVO
            fclose($ar);
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "w");
    
            $cant = 0;
            
            // ESCRIBE EN EL ARCHIVO
            foreach($alumnos AS $item) {
                $cant = fwrite($ar, $item);
            }
    
            if ($cant > 0) {
                $retorno = true;			
            }
    
            // CIERRA EL ARCHIVO
            fclose($ar);
    
            return $retorno;
        }

        // Método estático para borrar un alumno del archivo.
        public static function borrar(int $legajo): bool {
            $retorno = false;
    
            $alumnos = array();
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "r");
    
            // LEE LÍNEA POR LÍNEA DEL ARCHIVO 
            while (!feof($ar)) {
                $linea = fgets($ar);
                $array_linea = explode("-", $linea);
    
                $array_linea[0] = trim($array_linea[0]);
    
                if ($array_linea[0] != "") {
                    // RECUPERA LOS CAMPOS
                    $legajo_archivo = trim($array_linea[0]);
                    $apellido_archivo = trim($array_linea[1]);
                    $nombre_archivo = trim($array_linea[2]);
                    $foto_archivo = trim($array_linea[3]);
                    if ($legajo_archivo == $legajo) {
                        continue;
                    }
    
                    array_push($alumnos, "{$legajo_archivo}-{$apellido_archivo}-{$nombre_archivo}-{$foto_archivo}\r\n");
                }
            }
    
            // CIERRA EL ARCHIVO
            fclose($ar);
    
            $cant = 0;
    
            // ABRE EL ARCHIVO
            $ar = fopen("./archivos/alumnos_foto.txt", "w");
    
            // ESCRIBE EN EL ARCHIVO
            foreach($alumnos AS $item) {
                $cant = fwrite($ar, $item);
            }
    
            if ($cant > 0) {
                $retorno = true;			
            }
    
            // CIERRA EL ARCHIVO
            fclose($ar);
    
            return $retorno;
        }

        // Método estático para obtener un alumno por legajo.
        public static function Obtener(int $legajo): Alumno {
            $alumno = new Alumno($legajo, "", "", "");

            $ar = fopen("./archivos/alumnos_foto.txt", "r");           
            while (!feof($ar)) {
                $linea = fgets($ar);
                $array_linea = explode("-", $linea);             // Divide la línea en un array utilizando el guión como separador.
                $array_linea[0] = trim($array_linea[0]);
                if ($array_linea[0] != "") {
                    // RECUPERA LOS CAMPOS
                    $legajo_archivo = trim($array_linea[0]);
                    $apellido_archivo = trim($array_linea[1]);
                    $nombre_archivo = trim($array_linea[2]);
                    $foto_archivo = trim($array_linea[3]);
                    if ($legajo_archivo == $legajo) {
                        $alumno->apellido = $apellido_archivo;
                        $alumno->nombre = $nombre_archivo;
                        $alumno->foto = $foto_archivo;
                        break;
                    }
                }		
           }
           fclose($ar);
           return $alumno;
       }
    }
}