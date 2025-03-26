<?php

    require_once __DIR__.'/myapi/Products.php';
    $products = new Products();
    $products->single($_GET['single']);
    echo $products->getData();
?>