<link rel="stylesheet" href="../static/style.css">
<?php
    $brand = new brand ;
    $brand_id = $_GET['brand_id'];
    if(!isset($_GET['brand_id']) || $_GET['brand_id'] == NULL ){
        echo "<script> window.location = 'index.php?act=brand' </script>";
    }else{
        $cartegory_id = $_GET['brand_id'];
    }

    $get_brand = $brand -> get_brand($brand_id);
    if($get_brand){
        $resultA = $get_brand -> fetch_assoc();
    }

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $cartegory_id = $_POST['cartegory_id'];
        $brand_name = $_POST['brand_name'];
        $update_brand = $brand -> update_brand($cartegory_id,$brand_name,$brand_id);    
    }
?>
    <div class="section-content">
    <div class="admin-content-right-cartegory__add">
        <h1>Sửa danh mục sản phẩm</h1>
            <form action="" method="POST">
                <select name="cartegory_id" id="">
                    <option value="">Chọn Danh Mục</option>
                    <?php
                    $show_cartegory = $brand ->show_cartegory();
                    if($show_cartegory){
                        while($rusult = $show_cartegory -> fetch_assoc()){

                    ?> 
                    <option <?php if($resultA['cartegory_id']==$rusult['cartegory_id']) {echo "SELECTED";} ?>
                     value="<?php echo $rusult['cartegory_id'] ?>"><?php echo $rusult['cartegory_name'] ?></option>
                    <?php
                        }}
                    ?>
                </select>
                <input class="brand_name" required name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm"
                value= "<?php echo $resultA['brand_name'] ?>">
                <button type="submit">Update</button>
            </form>
    </div>

