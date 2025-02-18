<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>XHTML 1.1</title>
</head>
<body>
    <?php
    // Ejercicio 1
    echo "<div>Ejercicio 1</div>";
    $_myvar = "Hola Mundo";
    $_7var = "PHP es divertido";
    $myvar = "¿Soy una variable?";
    $var7 = "¿Puedo tener un número al final?";
    $_element1 = "¿Y un guión bajo al principio?";
    echo "<div>" . (isset($_myvar) ? '$_myvar Está definida y no es nula' : '$_myvar no está definida o es nula') . "</div>";
    echo "<div>" . (isset($_7var) ? '$_7var Está definida y no es nula' : '$_7var no está definida o es nula') . "</div>";
    echo "<div>myvar; Mal definida.</div>";
    echo "<div>" . (isset($myvar) ? '$myvar Está definida y no es nula' : '$myvar no está definida o es nula') . "</div>";
    echo "<div>" . (isset($var7) ? '$var7 Está definida y no es nula' : '$var7 no está definida o es nula') . "</div>";
    echo "<div>" . (isset($_element1) ? '$_element1 Está definida y no es nula' : '$_element1 no está definida o es nula') . "</div>";
    echo "<div>" . (isset($house) ? '$house*5 Está definida y no es nula' : '$house*5 no está definida o es nula') . "</div>";
    
    // Ejercicio 2
    echo "<div>Ejercicio 2</div>";
    $a = "ManejadorSQL";
    $b = "MySQL";
    $c = &$a;
    echo "<div>Contenido de \$a: $a</div>";
    echo "<div>Contenido de \$b: $b</div>";
    echo "<div>Contenido de \$c: $c</div>";
    echo "<p>Asignamos a \$a el texto 'ManejadorSQL', a \$b el texto o cadena 'MySQL' y a \$c la referencia de \$a. <br /> Por lo tanto, si cambiamos el valor de \$a, \$c también cambiará. <br /> Si cambiamos el valor de \$b, \$c no cambiará.</p>";
    echo "<div>Parte 2</div>";
    $a = "PHP server";
    $b = &$a;
    echo "<div>Contenido de \$a: $a</div>";
    echo "<div>Contenido de \$b: $b</div>";
    echo "<div>Lo mismo, estamos pasando la referencia de \$a a \$b, como un apuntador.</div>";
    
    // Ejercicio 3
    echo "<div>Ejercicio 3</div>";
    $a = "PHP5";
    echo "<div>Valor de \$a: $a</div>";
    $z[] = &$a;
    echo "<div>Valor de \$z[0]: $z[0]</div>";
    $b = "5a version de PHP";
    echo "<div>Valor de \$b: $b</div>";
    @$c = $b * 10;
    echo "<div>Valor de \$c: $c</div>";
    $a .= $b;
    echo "<div>Nuevo valor de \$a: $a</div>";
    @$b *= $c;
    echo "<div>Nuevo valor de \$b: $b</div>";
    $z[0] = "MySQL";
    echo "<div>Nuevo valor de \$z[0]: $z[0]</div>";
    echo "<pre>";
    print_r($z);
    echo "</pre>";
    
    // Ejercicio 4
    echo "<div>Ejercicio 4</div>";
    $a = "PHP5";
    echo "<div>Valor de \$a: " . $GLOBALS['a'] . "</div>";
    $z[] = &$a;
    echo "<div>Valor de \$z[0]: " . $GLOBALS['z'][0] . "</div>";
    $b = "5a version de PHP";
    echo "<div>Valor de \$b: " . $GLOBALS['b'] . "</div>";
    @$c = $b * 10;
    echo "<div>Valor de \$c: " . $GLOBALS['c'] . "</div>";
    $a .= $b;
    echo "<div>Nuevo valor de \$a: " . $GLOBALS['a'] . "</div>";
    @$b *= $c;
    echo "<div>Nuevo valor de \$b: " . $GLOBALS['b'] . "</div>";
    $z[0] = "MySQL";
    echo "<div>Nuevo valor de \$z[0]: " . $GLOBALS['z'][0] . "</div>";
    echo "<pre>";
    print_r($GLOBALS['z']);
    echo "</pre>";
    
    // Ejercicio 5
    echo "<div>Ejercicio 5</div>";
    $a = "7 personas";
    $b = (integer) $a;
    echo "<div>Valor de \$a: $a</div>";
    echo "<div>Valor de \$b: $b</div>";
    $a = "9E3";
    $c = (double) $a;
    echo "<div>Nuevo valor de \$a: $a</div>";
    echo "<div>Valor de \$c: $c</div>";
    
    // Ejercicio 6
    echo "<div>Ejercicio 6</div>";
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);
    echo "<pre>";
    var_dump((bool)$a);
    echo "</pre>";
    echo "<pre>";
    var_dump((bool)$b);
    echo "</pre>";
    echo "<pre>";
    var_dump($c);
    echo "</pre>";
    echo "<pre>";
    var_dump($d);
    echo "</pre>";
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
    echo "<pre>";
    var_dump($f);
    echo "</pre>";

    // Función para convertir valores booleanos a string y ya usar echo
    echo "<div>Función para convertir valores booleanos a string y ya usar echo</div>";
    function boolToString($bool) {
        return $bool ? 'true' : 'false';
    }
    echo "<div>Valor booleano de \$c: " . boolToString($c) . "</div>";
    echo "<div>Valor booleano de \$e: " . boolToString($e) . "</div>";

    // Ejercicio 7
    echo "<div>Ejercicio 7</div>";
    echo "<div>" . $_SERVER['SERVER_SOFTWARE'] . "</div>";
    echo "<div>" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</div>";
    ?>
    
    <p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
</body>
</html>
