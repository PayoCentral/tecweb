<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>


/<?php
// Archivo: formulario_productos_v2.php
// Formulario para modificar productos

header("Content-Type: application/xhtml+xml; charset=UTF-8");

@$link = new mysqli('localhost', 'root', 'cinepolis', 'marketzone');
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error . '<br/>');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $nombre = $link->real_escape_string($_POST['name']);
    $marca = $link->real_escape_string($_POST['brand']);
    $modelo = $link->real_escape_string($_POST['model']);
    $precio = (float) $_POST['price'];
    $detalles = $link->real_escape_string($_POST['desc']);
    $unidades = (int) $_POST['unit'];

    $query = "UPDATE productos SET 
                nombre = '$nombre', 
                marca = '$marca', 
                modelo = '$modelo', 
                precio = $precio, 
                detalles = '$detalles', 
                unidades = $unidades 
              WHERE id = $id";

    if ($link->query($query) === TRUE) {
        echo "Producto actualizado exitosamente.";
    } else {
        echo "Error actualizando el producto: " . $link->error;
    }

    $link->close();
} else {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $producto = [];
    if ($id > 0) {
        $result = $link->query("SELECT * FROM productos WHERE id = $id");
        if ($result && $result->num_rows > 0) {
            $producto = $result->fetch_assoc();
        }
        $result->free();
    }
    $link->close();
}
?>

 

<body>
<h2>Modificar Producto</h2>
<form id="formularioProductos" action="formulario_productos_v2.php" method="post">
    <fieldset>
        <legend>Ingresa los campos que se te solicitan.</legend>
        <ul>
            <li><input type="hidden" name="id" value="<?= $producto['id'] ?? '' ?>" /></li>
            <li><label for="form-name">Nombre del producto:</label> <input type="text" name="name" id="form-name" value="<?= $producto['nombre'] ?? '' ?>" required="required" /></li>
            <li>
                    <label for="form-brand">Marca del producto:</label>
                    <select name="brand" id="form-brand" required="required">
                        <option value="">Seleccione una opción</option>
                        <option value="Microsoft">Microsoft</option>
                        <option value="Shenzen" >Shenzen</option>
                        <option value="GHIA">GHIA</option>
                    </select>
                </li>
            <li><label for="form-mode">Modelo del producto:</label><input type="text" name="model" id="form-model" value="<?= $producto['modelo'] ?? '' ?>" required="required" /></li>
            <li><label for="form-price">Precio del producto:</label><input type="number" name="price" id="form-price" value="<?= $producto['precio'] ?? '' ?>" required="required" /></li>
            <li>
                <label for="form-desc">Descripción del producto:</label>
                <textarea name="desc" rows="4" cols="60" id="form-desc" placeholder="No más de 250 caracteres de longitud" required="required"><?= $producto['detalles'] ?? '' ?></textarea>
            </li>
            <li><label for="form-unit">Unidades del producto:</label><input type="number" name="unit" id="form-unit" value="<?= $producto['unidades'] ?? '' ?>" required="required" /></li>
        </ul>
    </fieldset>
    <p>
        <input type="submit" value="Guardar cambios" />
        <input type="reset" />
    </p>
</form>

</body>
</html>