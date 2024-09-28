  <?php 
   if((isset($_POST['submit']))){ 
        $users = new user;
        $pass = $_POST["oldpass"];
        $newpass = $_POST["newpass"];
        $renewpass = $_POST["renewpass"];
        $check_pass = $users -> checkpass($pass);
        if($pass == "" || $newpass == "" || $renewpass == ""){
            echo "<script>alert('Nhập đầy đủ thông tin');</script>";
        }
        elseif($check_pass != $pass){
            echo "<script>alert('Mật khẩu hiện tại không chính xác');</script>";
        }
        elseif($renewpass != $newpass){
            echo "<script>alert('Mật khẩu nhập lại không chính xác');</script>";
        }else{
            $update_pass = $users -> updatepass($newpass);
        }
   }
  ?>
  
  
  <div class="infor-container">
        <div class="infor-left">
            <div class="infor-selects">
            <a href="index.php?act=infor" class="infor-select">Thông tin cá nhân</a>
                <a href="index.php?act=changepass" class="infor-select">Thay đổi mật khẩu</a>
                <a href="#" class="infor-select">Thông tin đơn hàng</a>
            </div>
        </div>
        <div class="infor-right">
            <h1 class="">Đổi mật khẩu</h1>
            <form action="" method="POST">       
            <table class="">
                <tbody>
                <tr>
                    <th>Mật khẩu hiện tại:</th>
                    <td><input type="password" name="oldpass"></td>
                </tr>
                <tr>
                    <th>Mật khẩu mới:</th>
                    <td><input type="password" name="newpass"></td>
                </tr>
                <tr>
                    <th>Nhập lại mật khẩu mới:</th>
                    <td><input type="password" name="renewpass"></td>
                </tr>
                <tr>
                    <td colspan=2 class="infor-btn"><button type="submit" name="submit">Update</button></td>
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>

