<?php

    require_once __DIR__.'/myapi/Products.php';
    $products = new Products();
    $products->edit($_POST);
    echo $products->getData();
?>