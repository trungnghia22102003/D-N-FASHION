<?php
    if(isset($_SESSION['role'])&&($_SESSION['role']!="")){
    $users = new user;
    $userss = $_SESSION['user'];
    $show_infor = $users -> showinfor($userss);
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
            <h1 class="">Thông tin cá nhân</h1>       
            <table class="">
                    <?php    
                    if($show_infor){$i=0;
                        while($result = $show_infor->fetch_assoc()){$i++;
                    ?> 
                <tbody>
                <tr>
                    <th>Họ và tên:</th>
                    <td><?php echo $result['name']?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <th>Địa chỉ:</th>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td><?php echo $result['phone']?></td>
                </tr> 
                </tbody>
                <?php
                         }
                        }
                    ?> 
            </table>                     
        </div>
    </div>
