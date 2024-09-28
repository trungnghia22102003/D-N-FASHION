<link rel="stylesheet" href="../static/style.css">
<?php
    $users = new user;
    $show_users = $users -> showuseradmin();
?>
<div class="content-header">
            <div class="content-title">Danh sách Quản Trị Viên</div>
</div>
            <div class="section-content">
                <table class="admin_table">
                    <tr>
                        <th>Name</th>
                        <th>User</th>
                        <th>Phone</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Tùy biến</th>
                    </tr>
               <?php    
                    if($show_users){$i=0;
                        while($result = $show_users->fetch_assoc()){$i++;
                    ?> 
                   <tr>
                        <td><?php echo $result['name']?></td>
                        <td><?php echo $result['user']?></td>
                        <td><?php echo $result['phone']?></td>
                        <td><?php echo $result['address']?></td>
                        <td><?php echo $result['email']?></td>
                        <td>
                            <a href="">Sửa</a>
                            |
                            <a href="">Xóa</a>
                        </td>
                    </tr>
                    <?php
                         }
                        }
                    ?> 
                </table>
              </div>
