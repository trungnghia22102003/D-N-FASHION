<link rel="stylesheet" href="../static/style.css">
<?php
    $cartegory = new cartegory;
    $show_cartegory = $cartegory -> show_cartegory();
?>
<?php
    $cartegory = new cartegory;
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $cartegory_name = $_POST['cartegory_name'];
        $insert_cartegory = $cartegory -> insert_cartegory($cartegory_name);
    }
?>

            <div class="content-header">
                <div class="content-title">Danh sách sản phẩm</div>
                <button type="button" class="btn" id="button_add" data-bs-toggle="modal" data-bs-target="#myModal">Thêm Danh Mục</button>
                      <div class="modal" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Thêm Danh Mục</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <form class="insert_brand" action="" method="POST">
                              <input id="input_add" name="cartegory_name" type="text" placeholder="Nhập tên danh mục">
                            
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button class="btn-add" button type="submit">Add</button>
                              </form>
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
            <div class="section-content">
                <table class="admin_table">
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Danh Mục</th>
                        <th>Tùy biến</th>
                    </tr>
               <?php    
                    if($show_cartegory){$i=0;
                        while($result = $show_cartegory->fetch_assoc()){$i++;
                    ?> 
                   <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['cartegory_id']?></td>
                        <td><?php echo $result['cartegory_name']?></td>
                        <td>
                            <a href="index.php?act=edit_cate&cartegory_id=<?php echo $result['cartegory_id']?>">Sửa</a>
                            |
                            <a href="index.php?act=delete_cate&cartegory_id=<?php echo $result['cartegory_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                         }
                        }
                    ?> 
                </table>
              </div>



