<?php

    require_once __DIR__.'/myapi/Products.php';

    $products = new Products();
    $products->add($_POST);
    echo $products->getData();
    
?>