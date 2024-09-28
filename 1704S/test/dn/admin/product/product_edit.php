<link rel="stylesheet" href="../static/style.css">
<?php
$product = new product;
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
}

    // if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL ){
    //     echo "<script> window.location = 'brand_list.php' </script> ";
    // }else{
    //     $cartegory_id = $_GET['product_id'];
    // }

    $get_product = $product -> get_product($product_id);
    if($get_product){
        $resultA =  $get_product -> fetch_assoc();
    }

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $cartegory_id = $_POST['cartegory_id'];
        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $product_preverse=$_POST['product_preverse'];
        $product_price = $_POST['product_price'];
        $product_img = $_FILES['product_img']['name'];
        $update_product = $product -> update_product($product_id,$product_name, $product_price, $product_desc,$product_img,$product_preverse);    
    }
?>
<div class="section-content">
        <div class="admin-content-right-cartegory__add">
        <h1>Sửa sản phẩm</h1>
            <form class="edit-form"  action="" method="POST" enctype="multipart/form-data">
                <div class="flex-item">
                <select name="cartegory_id" id="">
                    <option value="">Chọn Danh Mục</option>
                    <?php
                    $show_cartegory = $product ->show_cartegory();
                    if($show_cartegory){
                        while($rusult = $show_cartegory -> fetch_assoc()){

                    ?> 
                    <option <?php if($resultA['cartegory_id']==$rusult['cartegory_id']) {echo "SELECTED";} ?>
                     value="<?php echo $rusult['cartegory_id'] ?>"><?php echo $rusult['cartegory_name'] ?></option>
                    <?php
                        }};
                    ?>
                </select>
                </div>
                <div class="flex-item">
                <input class="input-item" required name="product_name" type="text" placeholder="Nhập Tên Loại Sản Phẩm"
                value= "<?php echo $resultA['product_name'] ?>">
                </div>
                <div class="flex-item">
                <input class="input-item" required name="product_price" type="text" placeholder="Nhập Giá Sản Phẩm"
                value= "<?php echo $resultA['product_price'] ?>">
                </div>
                <div class="flex-item">
                <input class="input-item"  name="product_desc" type="text" placeholder="Nhập Mô Tả Sản Phẩm"
                value= "<?php echo $resultA['product_desc'] ?>">
                </div>
                <div class="flex-item">
                <input class="input-item"  name="product_preverse" type="text" placeholder="Nhập Mô Tả Bảo Quản"
                value= "<?php echo $resultA['product_preverse'] ?>">
                </div>
                <div class="flex-item">
                <input class="input-img" name="product_img" type="file"  placeholder="Nhập Hình Ảnh Sản Phẩm"
                value= "<?php echo $resultA['product_img'] ?>">
                </div>
              
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
