<?php
    //cargar el autoload
    require_once __DIR__ . '/../vendor/autoload.php';
    use Tavo3\product_app\backend\CREATE\Create;
    
    $productos = new Create('marketzone');
    $productos->add(json_decode(json_encode($_POST), true));
    echo $productos->getData();
?>