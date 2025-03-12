<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 3 de POO en PHP</title>
</head>
<body>
    <?php
    use EJEMPLOS\POO\Cabecera2 as Cabecera;
    require_once __DIR__ . '/cabecera.php';
    
    $cab1 = new Cabecera('El Rincon del navegador', 'center','https://chatgpt.com');
    $cab1->graficar();
    
    
    ?>
</body>
</html>