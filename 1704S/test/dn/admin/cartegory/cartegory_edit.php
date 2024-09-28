<link rel="stylesheet" href="../static/style.css">
<?php
     $cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id'] == NULL ){
        echo "<script> window.location = 'index.php?act=cate' </script> ";
    }else{
        $cartegory_id = $_GET['cartegory_id'];
    }

    $get_cartegory = $cartegory -> get_cartegory($cartegory_id);
    if($get_cartegory){
        $result = $get_cartegory -> fetch_assoc();
    }
?> 
<?php
     if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $cartegory_name = $_POST['cartegory_name'];
        $update_cartegory = $cartegory -> update_cartegory($cartegory_name,$cartegory_id);
}
?> 
    <div class="section-content">
            <div class="admin-content-right-cartegory__add">
                        <h1>Sửa Danh Mục</h1>
                    <form action="" method="POST">
                        <input class="cartegory_name" name="cartegory_name" type="text" value="
                        <?php
                        echo $result['cartegory_name'];
                        ?>">
                        <button type="submit">Update</button>
                    </form>
            </div>
    </div>
