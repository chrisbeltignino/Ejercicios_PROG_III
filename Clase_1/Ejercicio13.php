<?php
$array1 = array("Perro", "Gato", "Ratón", "Araña", "Mosca");
$array2 = array("1986", "1996", "2015", "78", "86");
$array3 = array("php", "mysql", "html5", "typescript", "ajax");

$mergedArray = array_merge($array1, $array2, $array3);

foreach ($mergedArray as $valor) {
    echo "$valor<br/>";
}
?>