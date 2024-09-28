<link rel="stylesheet" href="./static/style.css">
<?php
    include 'import/database.php';
    include 'class/cartegory_class.php';
    include "class/product_class.php";
    include 'class/brand_class.php';
    include 'class/user.php';
    include 'class/donhang_class.php';
?>
<?php 
    session_start();
    ob_start();
    if(isset($_SESSION['role'])&&($_SESSION['role']==1)){
    include "slider.php";
    include "header.php";   
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'cate':
                include 'cartegory/cartegory_list.php';
                break;
            case 'edit_cate':
                include 'cartegory/cartegory_edit.php';
                break;
            case 'delete_cate':
                include 'cartegory/cartegory_delete.php';
                break;    
            case 'brand':
                include 'brand/brand_list.php';
                break;
            case 'brand_edit':
            include 'brand/brand_edit.php';
            break;
            case 'brand_delete':
                include 'brand/brand_delete.php';
                break;
            case 'product_list':
                include 'product/product_list.php';
                break;
            case 'product_add':
               
                include 'product/product_add.php';
                
                break;
            case 'product_edit':
                include 'product/product_edit.php';
                break;
            case 'product_delete':
                include 'product/product_delete.php';
                break;
            case 'bill_edit':
                include 'bill/bill_edit.php';
                break;
            case 'bill_delete':
                include 'bill/bill_delete.php';
                break;
                case 'taikhoan':
                    include 'taikhoan.php';
                    break;
                case 'taikhoanadmin':
                    include 'taikhoanadmin.php';
                    break;
            case 'logout':
                if(isset($_SESSION['role']))
                unset($_SESSION['role']);
                header('location: login.php');
                break;
            break;
            case 'listbill':
                include 'bill/list.php';
                break;
            default:
                include "header.php";
        }
    }else{
        
    }
    include "footer.php";
   
}else{
    header('location: login.php');
}
?>


