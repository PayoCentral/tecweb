<?php
// Directorio actual
$directory = '.';

// Abrir el directorio
if ($handle = opendir($directory)) {
    echo '<h2>Índice de directorio</h2>';
    echo '<ul>';

    // Recorrer los archivos y directorios
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            echo '<li><a href="' . $file . '">' . $file . '</a></li>';
        }
    }

    echo '</ul>';

    // Cerrar el directorio
    closedir($handle);
}
?>
