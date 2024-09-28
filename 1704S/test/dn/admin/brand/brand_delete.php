<?php
    $brand = new brand;
    if(!isset($_GET['brand_id']) || $_GET['brand_id'] == NULL ){
        echo "<script> window.location = 'index.php?act=brand' </script>";
    }else{
        $brand_id = $_GET['brand_id'];
    }

    $delete_brand = $brand -> delete_brand($brand_id);

?> 