<?php
    include_once __DIR__.'/database.php';

    // Searchterm and likeTerm son para la búsqueda de productos, se usa LIKE para buscar coincidencias parciales
    $data = array();
    if( isset($_POST['searchTerm']) ) {
        $searchTerm = $_POST['searchTerm'];
        $query = "SELECT * FROM productos WHERE nombre LIKE ? OR marca LIKE ? OR detalles LIKE ?";
        $stmt = $conexion->prepare($query);
        $likeTerm = "%{$searchTerm}%";
        $stmt->bind_param("sss", $likeTerm, $likeTerm, $likeTerm);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $data[] = $row;
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }
        $stmt->close();
        $conexion->close();
    } 
    
    echo json_encode($data, JSON_PRETTY_PRINT);
?>