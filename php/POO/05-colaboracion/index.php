<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 5 de POO en PHP</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/pagina.php';
        
        $pag1 = new Pagina('El rincon del programador','El sótano del programador');
        
        for($i=0;$i<15;i++){
            $pag1->insertar_cuerpo('Este es el parrafo número ' . ($i+1). 'que debe aparecer en la página');
        }
        
        $pag1 -> graficar();
    ?>
</body>
</html>