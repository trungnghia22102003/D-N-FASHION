<link rel="stylesheet" href="../static/style.css">
<?php
 $donhang = new donhang;
 $show_donhang = $donhang->show_bill();

?>
         <div class="content-header">
                <div class="content-title">Danh sách đơn hàng</div>
               
            </div>
            <div class="section-content">
                <table class="admin_table">    
                    <tr>
                        <th>STT</th>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SĐT</th>
                        <th>GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>TRẠNG THÁI ĐƠN HÀNG </th>
                        <th>THAO TÁC</th>
                        
                        
                    </tr>
              <?php
              if($show_donhang){
                $i=0;
                while($result = $show_donhang->fetch_assoc()){
                $i++;
                $ttdh =$donhang->get_ttdh($result['status']);
              ?>
                   <tr>
                 
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['madh'] ?></td>
                        <td><?php echo $result['name'] ?></td>
                        <td ><?php echo $result['address'] ?></td>
                        <td> <?php echo $result['tel'] ?></td>
                        <td><?php echo $result['tongdonhang'] ?></td>                       
                        <td><?php echo $ttdh ?></td>
                        <td>
                            <a href="index.php?act=bill_edit&id=<?php echo $result['id']?>">Sửa</a>
                            |
                            <a href="index.php?act=bill_delete&id=<?php echo $result['id']?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                }
                }
                    ?>
                   
                </table>              
            </div>
        </div>
