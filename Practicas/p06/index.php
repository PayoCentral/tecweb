<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        require_once __DIR__.'/src/funciones.php';
        if(isset($_GET['numero']))
        {
            esMultiplo($_GET['numero']);
        }
    ?>
    <h2>Ejercio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una 
secuencia compuesta por:  impar, par,impar </p>
        <?php
        require_once __DIR__.'/src/funciones.php';
        _3numeros();
        echo '<br>';
        ?>
    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, 
    pero que además sea múltiplo de un número dado.  </p>
    <?php
require_once 'src/funciones.php';

    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];

        // Verificar que el número es válido
        if (!is_numeric($numero) || $numero <= 0) {
            die("Introduce un número válido.");
        }

        echo "<h3>Resultados while:</h3>";
        echo "<p>" . encontrarMultiploW($numero) . "</p>";

        echo "<h3>Resultados dowhile:</h3>";
        echo "<p>" . encontrarMultiploDoW($numero) . "</p>";
    } else {
        echo "Proporciona un número así: ?numero=7";}
    ?>
    
    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la 'a'
    a la 'z'. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner 
    el valor en cada índice</p>
    <?php  
    require_once 'src/funciones.php';
    $arreglo = Ascii();
    ?>
    <h3>Tabla de caracteres ASCII:</h3>
    <table border="1">
        <tr>
            <th>Ascii</th>
            <th>Letra</th>
        </tr>
        <?php foreach ($arreglo as $key => $value): ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de 
    sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de 
    bienvenida apropiado.</p>
    <h2>Formulario de Bienvenida</h2>
    <form action="http://localhost/tecweb/Practicas/p06/src/funciones.php" method="post">
        Edad: <input type="number" name="edad" required><br>
        Sexo: 
        <select name="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select><br>
        <input type="submit">
    </form>

    <h2>Ejercio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de 
    una ciudad.</p>
    <h2>Consultar Parque Vehicular</h2>
    <form action="index.php" method="POST">
        <label for="placa">Placa del auto:</label>
        <input type="text" id="placa" name="placa"><br><br>
        <input type="submit" name="buscar" value="Buscar">
        <input type="submit" name="mostrar_todos" value="Mostrar Todos">
    </form>

    <?php
    require_once 'src/funciones.php';
    $autos = obtenerAutos();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['buscar'])) {
            $placa = $_POST['placa'];
            $auto = buscarPlaca($autos, $placa);
            if ($auto) {
                echo "<h3>Resultados de búsqueda:</h3>";
                echo "<pre>";
                print_r($auto);
                echo "</pre>";
            } else {
                echo "<h3>No se encontró el auto con placa $placa.</h3>";
            }
        } elseif (isset($_POST['mostrar_todos'])) {
            echo "<h3>Todos los autos registrados:</h3>";
            echo "<pre>";
            print_r($autos);
            echo "</pre>";
        }
    }
    ?>
</body>
</html>