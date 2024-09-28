
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Box/CartForm/style.css">
    <link rel="stylesheet" href="../admin/assets/icon/fontawesome-free-6.5.2-web/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-cart">
        <div class="cart-infor">            
            <div class="cart-infor_banner">
                <div class="cart-infor_banner__logo">Tham gia D&N</div>
                <div class="cart-infor_banner__text">Tham gia D&NClub để nhận ngay nhiều ưu đãi và quà tặng dành cho bạn</div>
            </div>
            <div class="cart-infor_title__box">
                <div class="cart-title">Thông tin vận chuyển</div>
                <div class="cart-infor_recommen">
                    <div id="cart-infor_recommen__text">Bạn đã có tài khoản?</div>
                    <a id="cart-infor_recommen__link" href="index.php?act=dangnhap">Đăng nhập ngay</a>
                </div>
            </div>
            
            <!-- entryarea zone -->
            <form class="cart-information" action="index.php?act=thanhtoan" method="post">
                <input value="<?php $_SESSION['tong']?>" type="hidden" name="tongdonhang" >
                <div class="cart-infor_entryarea">
                    <input type="text" required name="name" value="">
                    <div class="cart-infor_labelline">Họ tên</div>
                </div>
                <div class="cart-infor_entryarea">
                    <input name="tel" type="number" required>
                    <div class="cart-infor_labelline">SĐT</div>
                </div>
                <div class="cart-infor_entryarea">
                    <input name="email" type="email" required>
                    <div class="cart-infor_labelline">Email</div>
                </div>
                <div class="cart-infor_entryarea">
                    <input name="address" type="text" required>
                    <div class="cart-infor_labelline">Địa chỉ</div>
                </div>
                <div class="cart-title">Hình thức thanh toán</div>
                <label for="payment-COD" class="payment-method__item active">
                    <span class="payment-method__item-custom-checkbox custom-radio">
                        <input name="pttt" type="radio" id="payment-COD" name="payment-method" autocomplete="off" value="1" data-gtm-form-interact-field-id="1">
                        <span class="checkmark"></span>
                    </span>
                    <span class="payment-method__item-wrappper">
                        <img class="payment-method__item-icon-wrapper" src="../../Box/CartForm/assets/img/COD.jpg" alt="COD <br> Thanh toán khi nhận hàng">
                    </span>
                    <span class="payment-method__item-">
                    COD <br> Thanh toán khi nhận hàng 
                    </span>
                </label>
                <!-- Momo -->
                <!-- <label for="payment-momo" class="payment-method__item">
                    <span class="payment-method__item-custom-checkbox custom-radio">
                        <input name="pttt" type="radio" id="payment-momo" name="payment-method" autocomplete="off" value="2" data-gtm-form-interact-field-id="1">
                        <span class="checkmark"></span>
                    </span>
                    <span class="payment-method__item-wrappper">
                        <img class="payment-method__item-icon-wrapper" src="../../Box/CartForm/assets/img/momo.png" alt="Thanh Toán MoMo">
                    </span>
                    <span class="payment-method__item-">
                        Thanh Toán MoMo
                    </span>
                </label> -->
                <!-- VNpay -->
                <label for="payment-VNPAY" class="payment-method__item">
                    <span class="payment-method__item-custom-checkbox custom-radio">
                        <input name="pttt" type="radio" id="payment-VNPAY" name="payment-method" autocomplete="off" value="2" data-gtm-form-interact-field-id="1">
                        <span class="checkmark"></span>
                    </span>
                    <span class="payment-method__item-wrappper">
                        <img class="payment-method__item-icon-wrapper" src="../../Box/CartForm/assets/img/vnpay2.png" alt="Ví điện tử VNPAY / VNPAY QR">
                    </span>
                    <span class="payment-method__item-">
                        Ví điện tử VNPAY / VNPAY QR
                    </span>
                </label>
            <button name="pay" type="submit" class="checkout-btn">
                Thanh toán
                <span>(COD)</span>
                <span> - Đổi trả 60 ngày</span>
           </button>
        </div>
           

            <!-- SelectPay zone -->
           

        <!-- Cart-item -->
        <div class="cart-items">
            <div class="cart-title">Giỏ hàng</div>
            <div class="cart-items__header">
                <span>MÔ TẢ SẢN PHẨM</span>
                <span>SỐ LƯỢNG</span>
                <span>GIÁ</span>
            </div>
            <div class="cart-item">
            <?php 
              $ship = (float) 0;
              $tt = (float) 0;
             $_SESSION['tong'] = (float) 0 ;
             $i=0;
            if(sizeof($_SESSION['mycart'])>0){
              
               foreach($_SESSION['mycart'] as $cart){
                         if(isset($cart[1])){
                           $ship=25;
                         }else{
                           $ship=0;
                         }
                   $ttien = (number_format($cart[3]) * $cart[4]);
                   $hinh ='../admin/uploads/'.$cart[2];
                   $tt+=$ttien;
                   $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input  type="button" value=""></a>';
                   echo '<div class="cart-item-thumbnail">
                   <img style="width: 100%;" src="'.$hinh.'">
               </div>
       
           <div class="cart-item-content">
               <div class="cart-item-content__wrapper">
                   <div class="cart-item-content__inner">
                       <h3 class="cart-item__title">'.$cart[1].'</h3>
                       <div class="cart-item__variant">Đen / S</div>
                   </div>
                   <div class="cart-item-actions">
                       
                       <div class="cart-item-quantily">
                           
                         <input  type="text" name="amount" id="amount" value="'.$cart[4].'" disabled>
                         
                       </div>
                       <div class="cart-item-price">
                           <span>'.$cart[3].'đ</span>
                       </div>
                   </div>
                   
                   <div class="cart-item-delete">
                   <a style="float:right;" href="index.php?act=delcart&idcart='.$i.'">
                   <i class="fa-solid fa-trash-can"></i>
                   </a>                                  
              </div>
               </div>
           </div>';
           $i+=1;
               } 
            }else{
                echo' <div class="container">
                <div class="cart">
                    <div class="cart-header">
                        <h3>Hiện tại giỏ hàng chưa có sản phẩm</h3>
                    </div>
                    <div class="cart-body">
                        <div class="cart-empty">
                            <img src="https://bizweb.dktcdn.net/100/325/189/themes/675912/assets/empty-cart.png?1533693226542" alt="Mặt buồn">
                            <p>Hãy thêm sản phẩm vào giỏ hàng</p>
                            <a href="index.php" class="btn-continue">Quay lại mua sắm</a>
                        </div>
                    </div>
                   
                </div>
            </div>';
            }
                ?>
            </div>
            <div class="cart-table">
                <table>
                <?php 
               if(sizeof($_SESSION['mycart'])>0){
                if(isset($cart[3])){
                    $_SESSION['tong']=$tt + $ship; 
                }else{
                    $_SESSION['tong']= $tt;
                }
               
                    echo '
                    <tr>
                        <td>Tạm tính</td>
                        <td>'.number_format($tt,3).'đ</td>
                    </tr>
                    <tr>
                        <td>Giảm giá</td>
                        <td>0đ</td>
                    </tr>
                    <tr>
                        <td>Phí giao hàng</td>
                        <td>'. number_format($ship,3).'</td>
                    </tr>
                    <tr>
                        <td>Tổng</td>
                        <td>'.number_format($_SESSION['tong'],3).'đ</td>
                    </tr>   
                ';
               
                  echo '<tr>
                  <td>Tổng đơn hàng</td>
                  <td>'. number_format($_SESSION['tong'],3) .'đ</td>
                    </tr>';
               }
               
                ?>
                </table>
            </div>
        </div>
        </form>
    </div>
    <script src="../../Box/CartForm/script.js"></script>  
</body>
</html>