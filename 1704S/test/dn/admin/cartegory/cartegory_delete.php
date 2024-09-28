<?php
    $cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == NULL ){
        echo "<script> window.location = 'index.php?act=cate' </script> ";
    }else{
        $cartegory_id = $_GET['cartegory_id'];
    }
    $delete_cartegory = $cartegory -> delete_cartegory($cartegory_id);
?> 