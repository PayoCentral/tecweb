<?php

    require_once __DIR__.'/myapi/Products.php';
    $products = new Products();
    $products->search($_GET['search']);
    echo $products->getData();
?>
