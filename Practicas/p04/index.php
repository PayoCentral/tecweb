<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>XHTML 1.1 Template</title>

</head>

<body>
    <?php
    
    //Ejercicio 1
    echo "Ejercicio 1";
    echo "<br>";
    //**************************************************************** */
    $_myvar = "Hola Mundo";
    $_7var = "PHP es divertido";
    //myvar; Mal definida.
    $myvar = "¿Soy una variable?";
    $var7 = "¿Puedo tener un número al final?"; 
    $_element1 = "¿Y un guión bajo al principio?";
    //$house*5; No se permiten asteriscos al definir variables en PHP.
    echo "<br>";
    echo isset($_myvar) ? '$_myvar Está definida y no es nula' : '$_myvar no está definida o es nula';
    echo "<br>";
    echo isset($_7var) ? '$_7var Está definida y no es nula' : '$_7var no está definida o es nula';
    echo "<br>";
    echo "myvar; Mal definida.";
    echo "<br>";
    echo isset($myvar) ? '$myvar Está definida y no es nula' : '$myvar no está definida o es nula';
    echo "<br>";
    echo isset($var7) ? '$var7 Está definida y no es nula' : '$var7 no está definida o es nula';
    echo "<br>";
    echo isset($_element1) ? '$_element1 Está definida y no es nula' : '$_element1 no está definida o es nula';
    echo "<br>";
    echo isset($house) ? '$house*5 Está definida y no es nula' : '$house*5 no está definida o es nula';
    echo "<br>";
    echo "<br>";

    //Ejercicio 2
    echo "Ejercicio 2";
    echo "<br>";
    //**************************************************************** */
    $a = "ManejadorSQL";
    $b = "MySQL";
    $c = &$a;
    
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    
    echo "Contenido de \$a: $a"; 
    echo "<br>";
    echo "Contenido de \$b: $b"; 
    echo "<br>";
    echo "Contenido de \$c: $c"; 
    echo "<br>";
    echo "<p>Asignamos a \$a el texto 'ManejadorSQL', a \$b el texto o cadena 'MySQL' y a \$c la referencia de \$a. <br> Por lo tanto, si cambiamos el valor de \$a, \$c también cambiará. <br> Si cambiamos el valor de \$b, \$c no cambiará. </p>";
    echo "<br>";
    echo "Parte 2";
    echo "<br>";
    $a = "PHP server";
    $b = &$a;
    echo "Contenido de \$a: $a";
    echo "<br>";
    echo "Contenido de \$b: $b";
    echo "<br>";
    echo "Lo mismo, estamos pasando la referencia de \$a a \$b, como un apuntador.";
    ?>
</body>

</html>