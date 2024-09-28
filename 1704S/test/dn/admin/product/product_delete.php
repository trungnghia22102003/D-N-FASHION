<?php
    $product = new product;
    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL ){
        echo "<script> window.location = 'index.php?act=product_list' </script> ";
    }else{
        $product_id = $_GET['product_id'];
    }

    $delete_product = $product -> delete_product($product_id);

?> 