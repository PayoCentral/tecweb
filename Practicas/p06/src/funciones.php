<?php
function esMultiplo($num){
    $num = $_GET['numero'];
    if ($num%5==0 && $num%7==0)
    {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
    }
    else
    {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
    }
}

function _3numeros(){
    $digits = 3;
    $num1 = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $num2 = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $num3 = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $contador = 0;
    while($num1%2==0 || $num2%2!=0 || $num3%2==0)
    {
        $num1 = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $num2 = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $num3 = rand(pow(10, $digits-1), pow(10, $digits)-1);
        echo '<h3>'.$num1.', '.$num2.', '.$num3.'</h3>';
        $contador++;
    }
    $numerosencontrados = $contador*3;
    echo 'Hubo '. $numerosencontrados. ' numeros '.' en ' .$contador .' iteraciones';
}

function encontrarMultiploW($numero) {
    $encontrado = false;
    $contador = 0;

    while (!$encontrado) {
        $aleatorio = rand(1, 100); // Genera un número aleatorio entre 1 y 100
        $contador++;
        if ($aleatorio % $numero === 0) {
            $encontrado = true;
            return "Número encontrado $aleatorio después de $contador iteraciones.\n";
        }
    }
}

function encontrarMultiploDoW($numero) {
    $encontrado = false;
    $contador = 0;

    do {
        $aleatorio = rand(1, 100); // Genera un número aleatorio entre 1 y 100
        $contador++;
        if ($aleatorio % $numero === 0) {
            $encontrado = true;
            return "Número encontrado $aleatorio después de $contador iteraciones.\n";
        }
    } while (!$encontrado);
}

function Ascii() {
    $arreglo = array();
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
        echo "<h2>Bienvenida, usted está en el rango de edad permitido.</h2>";
    } else {
        echo "<h2>Error: No cumple con los requisitos de sexo y edad.</h2>";
    }
} else {
    echo "<h2>Error, complete el formulario correctamente.</h2>";
}

?>





