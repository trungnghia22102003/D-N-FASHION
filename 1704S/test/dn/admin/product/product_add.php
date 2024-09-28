<link rel="stylesheet" href="../static/style.css">

<?php
    $product = new product;
     if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $insert_product = $product -> insert_product($_POST,$_FILES);
    }

?>

    <div class="content-header_product">
        <div class="content-title">Thêm sản phẩm</div>
    </div>
    <div class="section-content_product">
                <form id="form_product" action="" method="POST" enctype="multipart/form-data">
                <div class="form_input">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_name" type="text" placeholder="Nhập tên sản phẩm">
                        <label for="">Chọn danh mục <span style="color: red;">*</span></label>
                        <select name="cartegory_id" id="cartegory_id">
                            <option value="#">--Chọn--</option>
                            <?php 
                                $show_cartegory = $product -> show_cartegory();
                                if($show_cartegory){
                                    while($result = $show_cartegory -> fetch_assoc()){                 
                            ?>
                            <option value="<?php echo $result['cartegory_id']?>"><?php echo $result['cartegory_name']?></option>
                            <?php       
                                    }
                                }
                            ?>
                        </select>
                        <label for="">Chọn loại sản phẩm <span style="color: red;">*</span></label>
                        <select name="brand_id" id="brand_id">
                            <option value="#">--Chọn--</option>
                           
                        </select>
                        <label for="">Giá sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_price" type="text">
                        <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                        <input name="product_sale" type="text">
                </div>
                <div class="form_img">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea name="product_desc" id="editor1" cols="30" rows="5"></textarea>
                    <label for="">Mô tả bảo quản <span style="color: red;">*</span></label>
                    <textarea name="product_preverse" id="editor1" cols="30" rows="5"></textarea>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <span style="color:red"><?php if(isset($insert_product)){
                            echo ($insert_product);
                    } ?></span>
                    <input name="product_img" type="file">
                    <label for="">Ảnh mô tả <span style="color: red;">*</span></label>
                    <input name="product_images[]" multiple type="file">
                    <button id="button_add" type="submit">Thêm</button>
                </form>
                </div>    
              
    </div>
    <script>
        $(document).ready(function(){
            $("#cartegory_id").change(function(){
                // alert($(this).val());
                var x = $(this).val()
                $.get("ajax.php",{cartegory_id:x},function(data){
                    $("#brand_id").html(data);
                })
            })
        })
    </script>
















