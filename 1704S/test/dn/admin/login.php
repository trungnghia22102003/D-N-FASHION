<?php
    session_start();
    ob_start();
    include 'import/database.php';
    include "class/user.php";
    $users = new user;
    if((isset($_POST['dangnhap']))&&($_POST['dangnhap'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $role = $users->checkuser($user,$pass);
             $_SESSION['role']=$role;
             if($role==1){
                $_SESSION['user']=$user;
                header('location:index.php');
            }         
            elseif($role==0){
                $_SESSION['user']=$user;
                $_SESSION['pass']=$pass;
                header('Location: ../page/index.php');
            }
            else{
                echo "<script>alert('Sai tài khoản hoặc mật khẩu!');</script>";
            }
           }
         
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login/login-style.css">
</head>
<body>
    
    <input type="checkbox" id="check">
    <div class="login-form">
        <div class="login page">
            <div class="login-page_input">
                <div class="heading">Đăng nhập</div>
                <div class="title">Đăng nhập để không bỏ quên quyền lợi tích lũy và hoàn tiền cho bất kỳ đơn hàng nào.</div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="entryarea">
                        <input type="text" name="user" required autocomplete="false">
                        <div class="labelline">Email/SĐT của bạn</div>
                    </div>
                    <div class="entryarea">
                        <input type="password" name="pass" required >
                        <div class="labelline">Mật khẩu</div>
                    </div>
                    <div class="login-box-btn">
                        <input type="submit" name="dangnhap" value="Đăng nhập" id="login-btn">
                    </div>
                    <div class="request">
                        <div class="switch">
                            <label for="check">Đăng ký tài khoản mới</label>
                        </div>
                        <a class="forgot-pass" href="#">Quên mật khẩu</a>
                    </div>
                </form>
            </div>
            <div class="login-img">
                <img class="imglogin" src="login/Image/poster.jpg">
            </div>
        </div>
        <?php
                if(isset($_POST['dangky'])){
                    $users = new user;
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $name = $_POST['ten'];
                    $phone = $_POST['phone'];
                    $adress = $_POST['diachi'];
                    $check_user = $users -> checknewuser($user);
                    if($user == "" || $pass == "" || $name == "" || $email == "" || $phone == "" || $adress == ""){
                        echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
                    }
                    elseif($check_user == $user){
                         echo "<script>alert('Tài khoản đã tồn tại!');</script>";
                    }else{
                        $insert_user = $users -> insertuser($_POST);
                        header("location: index.php?act=login");
                    }
                }
        ?>     
        <div class="signup page">
            <div class="signup-page_input">
                <div class="heading">Đăng ký</div>
                <div class="title">Đăng nhập để không bỏ quên quyền lợi tích lũy và hoàn tiền cho bất kỳ đơn hàng nào.</div>
                <form action="" method="post" autocomplete="false">
                    <div class="infor-entryarea">
                        <div class="entryarea">
                            <input type="text" name="user" required autocomplete="false">
                            <div class="labelline">Tài Khoản</div>
                        </div>
                        <div class="entryarea">
                            <input type="password" name="pass" required autocomplete="false">
                            <div class="labelline">Mật Khẩu</div>
                        </div>
                        <div class="entryarea">
                            <input type="text" name="ten" required autocomplete="false">
                            <div class="labelline">Họ và tên</div>
                        </div>
                        <div class="entryarea">
                            <input type="text" name="email" required autocomplete="false">
                            <div class="labelline">Email của bạn</div>
                         </div>
                        <div class="entryarea">
                            <input id="login-phone" name="phone" type="number" required autocomplete="false">
                            <div class="labelline">SĐT của bạn</div>
                        </div>
                        <div class="entryarea">
                            <input type="text" name="diachi" required autocomplete="false">
                            <div class="labelline">Địa chỉ của bạn</div>
                        </div>
                        </div>
                    <div class="login-box-btn">
                        <input type="submit" name="dangky" value="Đăng ký" id="login-btn">
                    </div>
                   
                    </form>
            </div>
            <div class="signup-img">
                <img class="imgsignup" src="login/Image/poster.jpg">
                <div class="switch-signup">
                            <label for="check">Đăng nhập</label>
                        </div>
            </div>
            
        </div>
    </div>

</body>
</html>