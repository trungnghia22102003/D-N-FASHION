<link rel="stylesheet" href="../static/style.css">
<?php
    $product = new product;
    $show_product = $product -> show_product();
?>
         <div class="content-header">
                <div class="content-title">Danh sách sản phẩm</div>
                <a href="index.php?act=product_add"><button type="submit" id="button_add">Thêm sản phẩm</button></a>
            </div>
            <div class="section-content">
                <table class="admin_table">    
                    <tr>
                        <th >STT</th>
                        <th style="width: 150px;" >Tên Sản Phẩm</th>
                        <th style="width: 150px;" >Giá Sản Phẩm</th>
                        <th>Mô Tả</th>
                        <th style="width: 120px;">Hình Ảnh</th>
                        <th style="width: 120px;" >Tùy Biến</th>
                        
                    </tr>
               <?php    
                    if($show_product){$i=0;
                        while($result = $show_product->fetch_assoc()){$i++;
                    ?> 
                   <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_name']?></td>
                        <td><?php echo $result['product_price']?></td>
                        <td ><?php echo $result['product_desc']?></td>
                       <td><?php echo '<img style="width: 80px;
                        height: 80px;" src="uploads/'.$result['product_img'].'" alt=""> '?> </td>
                        <td style="width:100px;">
                            <a href="index.php?act=product_edit&product_id=<?php echo $result['product_id']?>">Sửa</a>
                            |
                            <a href="index.php?act=product_delete&product_id=<?php echo $result['product_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                         }
                        }
                    ?> 
                </table>              
            </div>
        </div>
