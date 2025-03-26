<?php
/*
    include_once __DIR__.'/database.php';

    header('Content-Type: application/json');
    
    // Log para ver si se está recibiendo la solicitud correctamente
    error_log("Busqueda de producto: " . print_r($_GET, true)); 

    $data = array();

    if( isset($_GET['search']) ) {
        $search = $_GET['search'];
        
        // Log para ver el término de búsqueda
        error_log("Término de búsqueda: " . $search);

        $sql = "SELECT * FROM productos WHERE nombre LIKE '%{$search}%' AND eliminado = 0";
        
        if ( $result = $conexion->query($sql) ) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if (!is_null($rows)) {
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $data[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }

        $conexion->close();
    }

    // Log para ver lo que se va a retornar
    error_log("Respuesta del servidor: " . json_encode($data));

    // Aseguramos que la respuesta sea JSON válida
    echo json_encode($data, JSON_PRETTY_PRINT);
    */
    require_once __DIR__.'/myapi/Products.php';
    $products = new Products();
    $products->search($_GET['search']);
    echo $products->getData();
?>
