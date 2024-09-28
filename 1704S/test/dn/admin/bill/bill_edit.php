<link rel="stylesheet" href="../static/style.css">
<?php
     $donhang = new donhang;
    if(!isset($_GET['id']) || $_GET['id'] == NULL ){
        echo "<script> window.location = 'index.php?act=listbill' </script> ";
    }else{
        $id = $_GET['id'];
    }

    $get_bill = $donhang -> get_bill($id);
    if($get_bill){
        $result = $get_bill -> fetch_assoc();
    }
?> 
<?php
     if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $madh = $_POST['madh'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        
        $update_bill=$donhang->update_bill($madh,$name, $address,$tel,$id);
      
}
?> 
    <div class="section-content">
            <div class="admin-content-right-cartegory__add">
                        <h1>Sửa Đơn Hàng</h1>
                    <form action="" method="POST">
                        <label for="">MÃ ĐƠN HÀNG</label>
                        <input class="cartegory_name" name="madh" type="text" value="
                        <?php
                        echo $result['madh'];
                        ?>">
                        <label for="">TÊN KH</label>
                          <input class="cartegory_name" name="name" type="text" value="
                        <?php
                        echo $result['name'];
                        ?>">
                        <label for="">ĐỊA CHỈ</label>
                          <input class="cartegory_name" name="address" type="text" value="
                        <?php
                        echo $result['address'];
                        ?>">
                        <label for="">SĐT</label>
                          <input class="cartegory_name" name="tel" type="text" value="
                        <?php
                        echo $result['tel'];
                        ?>">
                      
                        
                        <button type="submit">Update</button>
                    </form>
            </div>
    </div>
