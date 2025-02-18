<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
    <h3>PRODUCTOS</h3>
    <p></p>

    <?php
    if (isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }

    if (!empty($tope)) {
        /** SE CREA EL OBJETO DE CONEXIÓN */
        @$link = new mysqli('localhost', 'root', 'cinepolis', 'marketzone');

        /** Comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br />');
        }

        /** Crear una tabla que devuelve un conjunto de resultados */
        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
            echo '<table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr>
                        <th scope="row">' . $row['id'] . '</th>
                        <td>' . $row['nombre'] . '</td>
                        <td>' . $row['marca'] . '</td>
                        <td>' . $row['modelo'] . '</td>
                        <td>' . $row['precio'] . '</td>
                        <td>' . $row['unidades'] . '</td>
                        <td>' . $row['detalles'] . '</td>
                        <td><img src="' . $row['imagen'] . '" alt="Imagen del producto" /></td>
                    </tr>';
            }

            echo '</tbody></table>';

            /** útil para liberar memoria asociada a un resultado con demasiada información */
            $result->free();
        } else {
            echo 'No hay productos con esa cantidad de unidades.';
        }

        $link->close();
    }
    ?>
    
    <p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
</body>
</html>
