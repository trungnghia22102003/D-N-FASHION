    <!-- <div class="container">
    <h3>Đơn hàng của bạn:$iddh</h3>
    if(isset($_SESSION['iddh'] )&&($_SESSION['iddh'] )>0){
    $getshowcart=$donhang->getshowcart( $_SESSION['iddh'] );
    var_dump($getshowcart);
    if(!empty($getshowcart)){
       echo '<table>
       <tr>
       <th>STT</th>
       <th>Tên sản phẩm</th>
       <th>Hình</th>
       <th>Đơn giá</th>
       <th>Số lượng</th>
       <th>Thành tiền</th>
       </tr>';
       $i=0;
       $tong=0;
       foreach($getshowcart as $item){
           $tt=$item['soluong'] * $item['dongia'];
           $tong+=$tt;
           echo '<tr>
           <td>'.($i+1).'</td>
           <td>'.$item['tensp'].'</td>
           <td><img style="width:110px;height:100px;" src="../admin/uploads/'.$item['img'].'"></td>
           <td>'.$item['dongia'].'</td>
           <td>'.$item['soluong'].'</td>
           <td>'.$tt.'</td>
               <tr>';
               $i++;
       }
       echo '</table>';
   }
   }
    </div>
     -->