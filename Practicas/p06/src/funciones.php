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

<?php
function obtenerAutos() {
    return array(
        //Ejemplos generados por GITHUB Copilot
        "ABC1234" => array(
            "Auto" => array(
                "marca" => "HONDA",
                "modelo" => 2020,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "Alfonso Esparza",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "C.U., Jardines de San Manuel"
            )
        ),
        "DEF5678" => array(
            "Auto" => array(
                "marca" => "MAZDA",
                "modelo" => 2019,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "Ma. del Consuelo Molina",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "97 oriente"
            )
        ),
        
        "GHI9101" => array(
            "Auto" => array(
                "marca" => "TOYOTA",
                "modelo" => 2018,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "Juan Pérez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. Juárez"
            )
        ),
        
        "JKL1121" => array(
            "Auto" => array(
                "marca" => "NISSAN",
                "modelo" => 2017,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "María García",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. Reforma"
            )
        ),
        
        "MNO3141" => array(
            "Auto" => array(
                "marca" => "FORD",
                "modelo" => 2016,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "José Hernández",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 14 sur"
            )
        ),
        
        "PQR5161" => array(
            "Auto" => array(
                "marca" => "CHEVROLET",
                "modelo" => 2015,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "Luisa Martínez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 11 norte"
            )
        ),
        
        "STU7181" => array(
            "Auto" => array(
                "marca" => "VOLKSWAGEN",
                "modelo" => 2014,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "Ricardo López",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 25 poniente"
            )
        ),
        
        "VWX9191" => array(
            "Auto" => array(
                "marca" => "HONDA",
                "modelo" => 2013,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "María Rodríguez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 31 poniente"
            )
        ),
        
        "YZA1212" => array(
            "Auto" => array(
                "marca" => "MAZDA",
                "modelo" => 2012,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "Juan Pérez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. Juárez"
            )
        ),
        
        "BCD3232" => array(
            "Auto" => array(
                "marca" => "TOYOTA",
                "modelo" => 2011,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "María García",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. Reforma"
            )
        ),
        
        "CDE5252" => array(
            "Auto" => array(
                "marca" => "FORD",
                "modelo" => 2010,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "José Hernández",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 14 sur"
            )
        ),
        
        "EFG7272" => array(
            "Auto" => array(
                "marca" => "CHEVROLET",
                "modelo" => 2009,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "Luisa Martínez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 11 norte"
            )
        ),
        
        "GHI9292" => array(
            "Auto" => array(
                "marca" => "VOLKSWAGEN",
                "modelo" => 2008,
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "Ricardo López",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 25 poniente"
            )
        ),
        
        "JKL1313" => array(
            "Auto" => array(
                "marca" => "HONDA",
                "modelo" => 2007,
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "María Rodríguez",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "Av. 31 poniente"
            )
        ),
    
    );
}

function buscarPlaca($autos, $placa) {
    if (isset($autos[$placa])) {
        return $autos[$placa];
    } else {
        return null;
    }
}

function obtenerTodos($autos) {
    return $autos;
}
?>





