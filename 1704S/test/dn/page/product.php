<!--Product-->
    <?php
if(isset($_GET['product_id'])){
    $id = $_GET['product_id'];
   $product = new product;
   $list = $product->show_sp_id($id);
   $list_img = $product->show_sp_id_images($id);
}else{
    
}
?>
    <div class="product-page">
        <div class="container-product">
            <!-- left -->
            <div class="product-img">
                <div class="product-img__big">
                    
                  <?php
                  if(!empty($list)){
                    foreach ($list as $key) {
                        $brandid = $key['brand_id'];
                        ?>
                        <img id="big-img" style="" src="../admin/uploads/<?= $key['product_img']; ?>" alt=""><?php
                      }
                  }else{
                    
                  }
                 
                  ?>
                    
                </div>
                <div class="product-img__list">
                    <?php
                    if(!empty($list)){
                        foreach ( $list_img as $key){
                            echo '<div class="product-img__item">';
                            ?>
                            <img class="small-img" src="../admin/uploads/<?= $key['product_images']; ?>" alt=""><?php
                            echo '</div>';
                        }
                    }else{

                    }
                       
                        ?>
                </div>
            </div>
            <!-- right -->
            <div class="product-infor">
                <div class="product-infor__title">
                <?php
                if(!empty($list)){
        foreach ($list as $key) {
                    ?>
                    <h5><?= $key['product_name']; ?></h5>
                    <?php
                  }
                }else{

                }     
                  ?>
                </div>
                <div class="product-infor__price">
                    
                    <?php
                    if(!empty($list)){
                        foreach ($list as $key) {
                            ?>
                            <?= $key['product_price']; ?><sup>đ</sup>
                            <?php
                          }
                    }else{

                    }
                  
                  ?>
                </div>
                    <!-- <div class="product-infor__color">
                        <div class="title-color">
                            Màu sắc:
                            <span>Be Sáng</span>
                        </div>
                        <button class="color"></button>
                        <button class="color"></button>
                        <button class="color"></button>
                    </div> -->
                <div class="product-infor__size">
                    <button>S</button>
                    <button>M</button>
                    <button>L</button>
                    <button>XL</button>
                </div>
                <div class="product-infor__size-show">
                   <a href="">
                       <span class="ti-ruler-alt"></span>
                       <span>Kiểm tra size của bạn</span>
                   </a>
                </div>
                <div class="product-infor__quanlity">
                    
                    <h6>Số lượng</h6>
                    <!-- <div class="item-quantily">
                       
                    <input type="number" name="soluong" min="1" max="10" value="1">
                    </div> -->
                   
                    <form id="addToCartForm" action="index.php?act=addtocart" method="post">
                        <div class="item-quantily">
                            <button type="button" class="btn-Minus" onclick="handleMinus()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>              
                        </button>
                        <input type="number" name="soluong" id="amount" value="1">
                        <button type="button" class="btn_Plus" onclick="handlePlus()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                        </button>
                        </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $key['product_id']?>">
                    <input type="hidden" name="name" value="<?php echo $key['product_name']?>">
                    <input type="hidden" name="img" value="<?php echo $key['product_img']?>">
                    <input type="hidden" name="price" value="<?php echo $key['product_price']?>">
                    <div class="button-group">
                        
                    <button id="addToCartButton" value="Đặt hàng" type="submit" name="themgiohang" class="product-infor-btn__add product-infor-btn__adds">Thêm giỏ hàng</button>
                    <button id="placeOrderButton" style="cursor: pointer;" type="submit" name="dathang" value="Thêm hàng" class="product-infor-btn__add">Đặt Hàng</button>
                    </div>
                   
                    
                </form>
                
                <div class="product-infor-textbox">
                    <div class="product-infor__text-titlebox">
                        <div class="product-infor__text-title intro">GIỚI THIỆU</div>
                        <div class="product-infor__text-title detail">CHI TIẾT SẢN PHẨM</div>
                        <div class="product-infor__text-title preserve">BẢO QUẢN</div>
                    </div>
                    <div class="product-infor__text-item_show">
                        <div class="intro-show">
                        <p >Chi tiết bảo quản sản phẩm : * Các sản phẩm thuộc dòng cao cấp (Senora) và chất lượng cao </p>  
                        <?php
                    if(!empty($list)){
                        foreach ($list as $key) {
                            ?>
                            <?php echo '<p class="product-infor__text-item_hidden hidden-intro">' .$key['product_desc']. '</p>'; ?>
                            <?php
                          }
                    }           
                  ?>                                             
                </div>
                        <div class="preserve-show"> 
                        <p>Chi tiết bảo quản sản phẩm : * Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.</p>
                            <?php
                    if(!empty($list)){
                        foreach ($list as $key) {
                            ?>
                            <?php echo '<p class="product-infor__text-item_hidden hidden-preserve" >'.$key['product_preverse'].'</p>';  ?>
                            <?php
                          }
                    }
                  ?>
                 
                        </div>
                    </div>
                    <div class="show-more">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="arrow-down w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow-up w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                            </svg> 
                        </div>
                        <div class="inline"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-title">
            
            <span>Sản phẩm liên quan</span>
        </div>
        <div class="row product-content">
            <?php
            $product = new product;
            if(isset($brandid)){
                $list_sp_same = $product->show_sp_same($brandid);
                foreach($list_sp_same as $key){
                    echo '<div class="product-related-item">
                    <img src="../admin/uploads/'.$key['product_img'].'" alt="">
                    <h1>'.$key['product_name'].'</h1>
                    <div class="price">
                        <p>'.$key['product_price'].'<sup>đ</sup></p>
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>                      
                        </a>
                    </div>
                </div>';    
                }
            }else{
                echo "chung toi chua co san pham";
            }
           
            ?>
            

            
            
        </div>
    </div> 
<script>
// Lấy danh sách các hình nhỏ
const smallImages = document.querySelectorAll('.small-img');

// Lặp qua từng hình nhỏ và thêm sự kiện click
smallImages.forEach(img => {
    img.addEventListener('click', function() {
        // Lấy đường dẫn của hình nhỏ được click
        const smallImgSrc = this.getAttribute('src');
        // Thay đổi hình lớn bằng hình nhỏ tương ứng
        document.getElementById('big-img').setAttribute('src', smallImgSrc);
    });
});
  $(document).ready(function(){
    $('#addToCartButton').click(function(e){
        e.preventDefault();
        $.ajax({
            url: 'index.php?act=addtocart',
            type: 'POST',
            data: $('#addToCartForm').serialize() + '&themgiohang=1',
            success: function(response){
                alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
                // Optionally update the cart UI here
            },
            error: function(){
                alert('Failed to add product to cart.');
            }
        });
    });

    // $('#placeOrderButton').click(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: 'index.php?act=addtocart',
    //         type: 'POST',
    //         data: $('#addToCartForm').serialize() + '&dathang=1',
    //         success: function(response){
    //             alert('Order placed successfully!');
    //             // Optionally update the UI or redirect here
    //         },
    //         error: function(){
    //             alert('Failed to place order.');
    //         }
    //     });
    // });
});
  const header = document.querySelector("header")
  window.addEventListener("scroll",function(){
      x = window.pageYOffset
      if(x>0){
          header.classList.add("sticky")
      }
      else{
          header.classList.remove("sticky")
      }
  })

   //--------Product--------//
   const butTon = document.querySelector(".product-content-right-bottom-top")
   if(butTon){
      butTon.addEventListener("click",function(){
          document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
      })
   }
   const bigImg = document.querySelector(".product-content-left-big-img img")
   const smallImg = document.querySelectorAll(".product-content-left-small-img img")
  smallImg.forEach(function(imgItem,X){
      imgItem.addEventListener("click",function(){
          bigImg.src = imgItem.src
      })
  })

  let amountElement = document.getElementById('amount')
      let amount = amountElement.value

      let render = (amount) =>{
          amountElement.value = amount
      }
      // Handle Plus
      let handlePlus = () =>{
          amount++
          render(amount);
      }
      // Handle Minus
      let handleMinus = () =>{
          if(amount > 1)
              amount--;
          render(amount);
      }

      amountElement.addEventListener('input' , () =>{
          amount = amountElement.value;
          amount = parseInt(amount);
          amount = (isNaN(amount) || amount==0 )?1:amount;
          render(amount);

      });

      // text
      const gioiThieu = document.querySelector(".intro");
      const chiTiet = document.querySelector(".detail");
      const baoQuan = document.querySelector(".preserve");

      if(gioiThieu){
          gioiThieu.addEventListener("click", function(){
              document.querySelector(".preserve-show").style.display = "none";
              document.querySelector(".intro-show").style.display = "block";
          })
      }
      if(baoQuan){
          baoQuan.addEventListener("click", function(){
              document.querySelector(".intro-show").style.display = "none";
              document.querySelector(".preserve-show").style.display = "block";
          })
      }

      // zoom
      const Zoom = document.querySelector(".show-more");
      if(Zoom){
          Zoom.addEventListener("click",function(){
              document.querySelector(".hidden-intro").classList.toggle("activeB")
          })
      }
      const Zoom2 = document.querySelector(".show-more");
      if(Zoom2){
          Zoom.addEventListener("click",function(){
              document.querySelector(".hidden-preserve").classList.toggle("activeC")
          })
      }
      const arrow_down = document.querySelector(".arrow-down");
      if(arrow_down){
          arrow_down.addEventListener("click", function(){
              document.querySelector(".arrow-up").style.display = "block";
              document.querySelector(".arrow-down").style.display = "none";
          })
      }
      const arrow_up = document.querySelector(".arrow-up");
      if(arrow_up){
          arrow_up.addEventListener("click", function(){
              document.querySelector(".arrow-down").style.display = "block";
              document.querySelector(".arrow-up").style.display = "none";
          })
      }
      // if(show_icon){
      //     show_icon.addEventListener("click", function(){
      //         document.querySelector(".arrow-up").style.display = "none";
      //         document.querySelector(".arrow-down").style.display = "block";
      //     })
      // }
</script>