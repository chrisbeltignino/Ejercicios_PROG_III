<?php
$impares = array();
$num = 1;

for ($i = 0; $i < 10; $i++) {
    $impares[] = $num;
    $num += 2;
}

// Usando for
echo "Usando for:<br/>";
for ($i = 0; $i < count($impares); $i++) {
    echo $impares[$i] . "<br/>";
}

// Usando while
echo "Usando while:<br/>";
$i = 0;
while ($i < count($impares)) {
    echo $impares[$i] . "<br/>";
    $i++;
}

// Usando foreach
echo "Usando foreach:<br/>";
foreach ($impares as $numero) {
    echo $numero . "<br/>";
}
?>