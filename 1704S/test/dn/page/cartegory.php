    <!--Cartegory-->

    <section class="cartegory">
        <div class="container">
            <!-- <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&#10230;</span> <p>Nữ</p> <span>&#10230;</span> <p>Hàng nữ mới về</p>
            </div> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                <?php
                    //    $danhmuc = new product;
                    //    $cartegories = $danhmuc->showdanhmucchitiet();
                    //    foreach($cartegories as $cartegoryID => $cartegory){
                    //     echo '<ul>
                    //     <li class="cartegory-left-li"><a href="cartegory.php?cartegory_id='.$cartegoryID.'">'.$cartegory['name'].'</a>
                    //             <ul>';
                    //         foreach ($cartegory['details'] as $brandID => $brandName){
                    //                 echo '
                    //                 <li ><a href="">'.$brandName.'</a> 
                    //             </li>';
                    //         }
                    //             echo ' </ul>
                    //     </li>
                    //     </ul>'; 
                    //    } 
                       ?>
                </div>
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <!-- <p>HÀNG NỮ MỚI VỀ</p> -->
                    </div>
                    <!-- <div class="cartegory-right-top-item">
                        <button><span>Bộ lọc</span> <i class="ti-angle-down"></i></button>
                    </div>
                    <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div> -->
                    <div class="cartegory-right-content row">
                    <?php
 if(isset($_GET['brand_id'])&& isset($_GET['cartegory_id'])){
    $br_id = $_GET['brand_id'];
    $cr_id = $_GET['cartegory_id'];
    $product = new product;
    $list_sp = $product->show_sp__br_id($br_id,$cr_id);
  
    if(!empty($list_sp)){
        foreach ($list_sp as $key ) {
                          
            echo ' <div class="cartegory-right-content-item">
            <img  src="../admin/uploads/'.$key['product_img'].'" alt="">
            <h1>'.$key['product_name'].'</h1>
            <div class="cartegory-mini-price">
            <p>'.$key['product_price'].'<sup>đ</sup></p>
            <a href="index.php?act=product_details&product_id='.$key['product_id'].'">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>                      
        </a>
        </div>
        </div>';
        }
     }
    else{
    echo 'Chưa có sản phẩm nào';
 }
}elseif(isset($_GET['cartegory_id'])){
    $cr_id = $_GET['cartegory_id'];
    $product = new product;
    $list_sp_all = $product->show_sp_all($cr_id,$page,$soluongsp); 
    if(!empty($list_sp_all)){
        foreach ($list_sp_all as $key ) {
                          
            echo ' <div class="cartegory-right-content-item">
            <img  src="../admin/uploads/'.$key['product_img'].'" alt="">
            <h1>'.$key['product_name'].'</h1>
            <div class="cartegory-mini-price">
            <p>'.$key['product_price'].'<sup>đ</sup></p>
            <a href="index.php?act=product_details&product_id='.$key['product_id'].'">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>                      
        </a>
        </div>
        </div>';
        }
     }
    else{
    echo 'Chưa có sản phẩm nào';
 }
}
else{ 
    $product = new product;
    
    $list_sp = $product->show_sp($keyw,$page,$soluongsp);
    if(!empty($list_sp)){
        foreach ($list_sp as $key ) {
            $number=$key['product_price'];
            var_dump($number);
            $customFormatNumber= $product-> customFormatNumber($number);
            echo ' <div class="cartegory-right-content-item">
            <img   src="../admin/uploads/'.$key['product_img'].'" alt="">
            <h1>'.$key['product_name'].'</h1>
            <div class="cartegory-mini-price">
            <p>'. $customFormatNumber.'<sup>đ</sup></p>
            <a href="index.php?act=product_details&product_id='.$key['product_id'].'">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>                      
        </a>
        </div>
        </div>';
        }
     }
//     else{
//     echo 'Chưa có sản phẩm';
//  }   
}?> 
                    <div class="cartegory-right-bottom row">
                      <ul class="cartegory-right-bottom-items">
                       
                        <li><a href=""><span>&#171;</span></a></li>
                        <?php
                        if(isset($_GET['cartegory_id'])&& $_GET['cartegory_id']=='27'){
                            $tongsospnam=$sanpham->show_sp_all_nam();
                            $hienthisotrangnam=$sanpham->hienthisotrangnam($tongsospnam,$soluongsp);
                            echo  $hienthisotrangnam;
                        }elseif(isset($_GET['cartegory_id'])&& $_GET['cartegory_id']=='28'){
                            $tongsospnu=$sanpham-> show_sp_all_nu();
                            $hienthisotrangnu=$sanpham->hienthisotrangu($tongsospnu,$soluongsp);
                            echo  $hienthisotrangnu;
                        }elseif(isset($_GET['cartegory_id'])&& $_GET['cartegory_id']=='29'){
                            $tongsosptreem=$sanpham-> show_sp_all_treem();
                            $hienthisotrangtreem=$sanpham->hienthisotrangtreem($tongsosptreem,$soluongsp);
                            echo  $hienthisotrangtreem;
                        }
                        else{
                            $tongsosp=$sanpham->hienthiall_sp();
                            $hienthisotrang=$sanpham->hienthisotrang($tongsosp,$soluongsp);
                            echo $hienthisotrang;
                        }
                      
                        ?>
                        <!-- <li><a href="index.php?act=product&page=1">1</a></li>
                        <li><a href="index.php?act=product&page=2">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li> -->
                        
                        <li><a href=""><span>&#187;</span></a></li>
                      </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
