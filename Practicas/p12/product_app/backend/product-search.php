<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Tavo3\product_app\backend\Read\Read;

    $productos = new Read('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>