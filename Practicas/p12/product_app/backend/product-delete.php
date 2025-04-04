<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Tavo3\product_app\backend\Delete\Delete;

    $productos = new Delete('marketzone');
    $productos->delete( $_POST['id'] );
    echo $productos->getData();
?>