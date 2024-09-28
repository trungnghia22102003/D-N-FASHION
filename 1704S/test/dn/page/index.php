<?php
    include '../admin/import/database.php';
    include '../admin/class/cartegory_class.php';
    include '../admin/class/product_class.php';
    include '../admin/class/brand_class.php';
    include '../admin/class/donhang_class.php';
?>
<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['mycart']))
        $_SESSION['mycart']=[];
    include 'header.php';
    include '../admin/class/user.php';
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case'thanhtoan':
                $donhang = new donhang;
                if (isset($_POST['pay'])){
                    //lấy dữ liệu để tạo đơn hàng
                    $tongdonhang=$_SESSION['tong'];
                    $name=$_POST['name'];
                    $address=$_POST['address'];
                    $email=$_POST['email'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $madh="DNS".rand(0,999999);
                    //tạo đơn hàng và trả về 1 id đơn hàng
                    // $spadd =[$id,$name,$img,$price,$soluong,$ttien];
                    $iddh=$donhang->taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel);
                    $_SESSION['iddh'] = $iddh;
                    if(isset($_SESSION['mycart'])&&(count($_SESSION['mycart'])>0)){
                        foreach ($_SESSION['mycart'] as $item) {
                           $addtocart=$donhang-> addtocart($iddh,$item[0],$item[1],$item[2],$item[3],$item[4]);
                        }
                        unset($_SESSION['mycart']); 
                    }
                }
                include 'thankyou.php';
                break;
            // case 'billconfirm':
            //     $donhang = new donhang;
            //     if(isset($_POST['pay'])){
            //         $name=$_POST['name'];
            //                 $address=$_POST['address'];
            //                 $email=$_POST['email'];
            //                 $tel=$_POST['tel'];
            //                 $name=$_POST['name'];
            //                 $pttt=$_POST['pttt'];
            //                 $ngaydathang=date('h:i:sa d/m/Y');
            //                 $tongdonhang=$_SESSION['tong'];
            //                 $idbill=$donhang->insert_bill($name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);

            //                 //insert into cart:$session['mycart'] & idbill
            //                 foreach ($_SESSION['mycart'] as $cart) {
            //                    $insert_cart= $donhang-> insert_cart($_SESSION['user']['id'],$cart[0],$cart[1],$cart[2],$cart[3],$cart[4],$cart[5],$idbill);
            //                 }
            //     }
            //     $listbill=$donhang->loadone_bill($idbill);
            //     include 'bill.php';
            //     break;
            case'product':
                $sanpham = new product;
                if(isset($_POST['keyw'])&&($_POST['keyw']!="")){
                    $keyw=$_POST['keyw'];
                }else{
                    $keyw="";
                }
                if(!isset($_GET['page'])){
                    $page =1;
                }else{
                    $page =$_GET['page'];
                }
                $soluongsp=8;
               
                include 'cartegory.php';
                break;
            case'product_details':
                include 'product.php';
                break;
            case'dangnhap':
                header("Location: ../admin/login.php");
                break;
            case'logout':
                unset($_SESSION['role']);
                session_unset();
                session_destroy();
                header('location:index.php');
                break;
               
            case'addtocart':
                if(isset($_POST['dathang'])&& $_POST['dathang']){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price= $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $ttien=$soluong * $price;
                    $fl=0;
                    for($i=0; $i< sizeof($_SESSION['mycart']);$i++){

                        if($_SESSION['mycart'][$i][1]==$name){
                            $fl=1;
                            $soluongnew=$soluong+$_SESSION['mycart'][$i][4];
                            $_SESSION['mycart'][$i][4]= $soluongnew;
                            break;
                        }

                    }
                    if($fl==0){
                        $spadd =[$id,$name,$img,$price,$soluong,$ttien];
                        array_push($_SESSION['mycart'],$spadd);
                      
                    }

                    include "cart.php";
                }elseif(isset($_POST['themgiohang'])&& $_POST['themgiohang']){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price= $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $ttien=$soluong * $price;
                    $fl=0;
                    for($i=0; $i< sizeof($_SESSION['mycart']);$i++){

                        if($_SESSION['mycart'][$i][1]==$name){
                            $fl=1;
                            $soluongnew=$soluong+$_SESSION['mycart'][$i][4];
                            $_SESSION['mycart'][$i][4]= $soluongnew;
                            break;
                        }

                    }
                    if($fl==0){
                        $spadd =[$id,$name,$img,$price,$soluong,$ttien];
                        array_push($_SESSION['mycart'],$spadd);
                    }  
                    
                }
               
                break;
                
            case'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                    
                }else{
                    $_SESSION['mycart']=[];
                }
                header('location:index.php?act=viewcart');
                break;
            case'viewcart':
                include "cart.php";
                break;
            case'infor':
                include "infor.php";
                break;
            case 'changepass':
                include "changepass.php";
                break;
        
        }
    }else{
        include 'pagehome.php';
    }
    include 'footer.php';
?>

