<link rel="stylesheet" href="../static/style.css">
<?php
    $brand = new brand;
    $show_brand = $brand -> show_brand();
?>
<?php
    $brand = new brand ;
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $cartegory_id = $_POST['cartegory_id'];
        $brand_name = $_POST['brand_name'];
        $insert_brand = $brand -> insert_brand($cartegory_id,$brand_name);    
    }
?>

            <div class="content-header">
                <div class="content-title">Danh sách sản phẩm</div>
                <button type="button" class="btn" id="button_add" data-bs-toggle="modal" data-bs-target="#myModal">Thêm Loại sản phẩm</button>
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
                                <select name="cartegory_id" id="option_add">
                                    <option value="">Chọn Danh Mục</option>
                                    <?php
                                    $show_cartegory = $brand ->show_cartegory();
                                    if($show_cartegory){
                                        while($rusult = $show_cartegory -> fetch_assoc()){

                                    ?> 
                                    <option value="<?php echo $rusult['cartegory_id'] ?>"><?php echo $rusult['cartegory_name'] ?></option>
                                    <?php
                                        }}
                                    ?>
                                </select>
                                <input required id="input_add" name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm">
                            
                            </div> 

                            <!-- Modal footer -->
                           <div class="modal-footer d=flex justify=center">
                           <button class="btn-add" type="submit">Add</button>
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
                        <th>Loại Sản Phẩm</th>
                        <th>Tùy biến</th>
                    </tr>
               <?php    
                    if($show_brand){$i=0;
                        while($result = $show_brand->fetch_assoc()){$i++;
                    ?> 
                   <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brand_id']?></td>
                        <td><?php echo $result['cartegory_name']?></td>
                        <td><?php echo $result['brand_name']?></td>
                        <td>
                            <a href="index.php?act=brand_edit&brand_id=<?php echo $result['brand_id']?>">Sửa</a>
                            |
                            <a href="index.php?act=brand_delete&brand_id=<?php echo $result['brand_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                         }
                        }
                    ?> 
                </table>
       </div>
        </div>
