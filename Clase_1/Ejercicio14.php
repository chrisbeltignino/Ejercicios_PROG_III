<?php
$array1 = array("Perro", "Gato", "Ratón", "Araña", "Mosca");
$array2 = array("1986", "1996", "2015", "78", "86");
$array3 = array("php", "mysql", "html5", "typescript", "ajax");

$arrayAsociativo = array(
    "array1" => $array1,
    "array2" => $array2,
    "array3" => $array3
);

$arrayIndexado = array($array1, $array2, $array3);

foreach ($arrayAsociativo as $nombre => $array) {
    echo "Array $nombre: ";
    foreach ($array as $valor) {
        echo "$valor, ";
    }
    echo "<br/>";
}

foreach ($arrayIndexado as $index => $array) {
    echo "Array $index: ";
    foreach ($array as $valor) {
        echo "$valor, ";
    }
    echo "<br/>";
}
?>