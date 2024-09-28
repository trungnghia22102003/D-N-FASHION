<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
        <div class="logo">
         <a href="index.php"><img class="logo-img" src="../admin/assets/img/logo5.png" alt="">
        </a>   
        </div>
        <div class="menu">
            <ul>
                    <?php
                       $danhmuc = new cartegory;
                       $product = new product;
                       $cartegories = $danhmuc->showdanhmucchitiet();
                       foreach($cartegories as $cartegoryID => $cartegory){
                        echo '
                        <li><a href="index.php?act=product&cartegory_id='.$cartegoryID.'">'.$cartegory['name'].'</a>
                        <div class="menu-brigde"></div>
                                <ul class="sub-menu">';
                            foreach ($cartegory['details'] as $brandID => $brandName){
                                echo '
                                <li ><a href="index.php?act=product&brand_id='.$brandID.'&cartegory_id='.$cartegoryID.'">'.$brandName.'</a> 
                                </li>';
                 }
                        echo ' </ul>
                        </li>
                        '; 
                       } 
                       ?>
                      

             <li><a href="">Sale</a></li>
         <li><a style="color: red;" href="">Thông Tin</a></li>
         </ul> 
        </div>
        <div class="others">
            <form action="index.php?act=product" method="POST">
                <li>
                    <div class="others-search">
                        <input class="others-input" placeholder="Tìm kiếm sản phẩm" type="text" name="keyw"> 
                       <button name="timkiem" style="cursor:pointer;background-color: transparent; border:none; padding:5px;" type="submit"><i class=" search-icon  ti-search"></i></button>
                       
                    </div> 
                 </li>
            </form>
            
            <?php
                if(isset($_SESSION['role'])&&($_SESSION['role']!="")){
                    echo '<li><a class="ti-shopping-cart" href="index.php?act=viewcart"></a></li>';
                    echo '<li><a class="ti-user" href="index.php?act=infor"><span id="user-name">'.$_SESSION['user'].'</span></a></li>';
                    echo '<li><a class="ti-shift-left" href="index.php?act=logout"><span id="logout-name">Logout<span></a></li>';
                }else{
            ?>
            <li><a class="ti-user" href="index.php?act=dangnhap"></a></li>
            <li>
                <a class="ti-shopping-cart" href="index.php?act=viewcart">
                    <!-- <span id="cart-count">0</span> -->
                </a>
            </li>
            <?php }?>
            
          
        </div>
    </header>