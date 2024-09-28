  <section id="slider">
      <div class="slider-list">
            <div class="list-item">
                <img src="../admin/assets/img/slider6.jpg" alt="">
            </div>
            <div class="list-item">
                <img src="../admin/assets/img/slider7.jpg" alt="">
            </div>
            <div class="list-item">
                <img src="../admin/assets/img/slider8.jpg" alt="">
            </div>
      </div>
      <div class="slider-button">
            <button id="prev" onclick="prev"><</button>
            <button id="next" onclick="next">></button>
      </div>
      <ul class="slider-dot">
            <li class="dot-active"></li>
            <li></li>
            <li></li>
      </ul>
    </section>
  
     <!--product-related-->
     <section class="product-related">
        <div class="product-related-title">
            <span>BEST SELLER - NAM</span>
        </div>
        <div class="row product-content">
        <?php

$product = new product;
$list= $product ->show_sp_nam();
if(!empty($list)){
    foreach ($list as $key ) {
        echo ' <div class="product-related-item">
        <img src="../admin/uploads/'.$key['product_img'].'" alt="">
        <h1>'.$key['product_name'].'</h1>
        <div class="price">
        <p>'.$key['product_price'].'<sup>đ</sup></p>
        <a href="index.php?act=product_details&product_id='.$key['product_id'].'">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>                      
        </a>
        </div>
        </div>';
        }       
    
}else{
    echo "Hiện tại chúng tôi chưa có sản phẩm này";
}

    ?>           
    </section>

    <button class="chance-page">Xem tất cả</button>

    <section class="product-related">
        <div class="product-related-title">
            <span>BEST SELLER - NỮ</span>
        </div>
        <div class="row product-content">
        <?php

$product = new product;
$list= $product ->show_sp_nu();
if(!empty($list)){
    foreach ($list as $key ) {
        echo ' <div class="product-related-item">
        <img src="../admin/uploads/'.$key['product_img'].'" alt="">
        <h1>'.$key['product_name'].'</h1>
        <div class="price">
        <p>'.$key['product_price'].'<sup>đ</sup></p>
        <a href="index.php?act=product_details&product_id='.$key['product_id'].'">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>                      
        </a>
        </div>
        </div>';
        }       
    
}else{
    echo "Hiện tại chúng tôi chưa có sản phẩm này";
}

    ?>           
            
    </section>

    <button class="chance-page">Xem tất cả</button>

