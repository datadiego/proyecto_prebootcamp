<?php
$variable = "Hola, PHP";
$numero = 123;
$flotante = 12.34;
$booleano = true;

echo "$variable \n $numero \n $flotante \n $booleano";

$edad = 18;
echo "la edad es: $edad";
if ($edad >= 18) {
    echo "Eres mayor de edad";
} else {
    echo "Eres menor de edad";
}

$color = "rojo";
switch ($color) {
    case "rojo":
        echo "El color es rojo";
        break;
    case "azul":
        echo "El color es azul";
        break;
    default:
        echo "Color desconocido";
}

for ($i = 0; $i < 10; $i++) {
    echo "iteracion: $i";
}

$frutas = array("manzana", "naranja", "plátano");
echo $frutas;
echo $frutas[0];

$persona = array("nombre" => "Juan", "edad" => 30);
echo $persona["nombre"]; // Imprime "Juan"
?>
