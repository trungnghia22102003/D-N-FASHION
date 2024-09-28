<?php
$donhang = new donhang;
if(!isset($_GET['id']) || $_GET['id'] == NULL ){
    echo "<script> window.location = 'index.php?act=bill' </script> ";
}else{
    $id = $_GET['id'];
}
$delete_bill = $donhang -> delete_bill($id);
?>