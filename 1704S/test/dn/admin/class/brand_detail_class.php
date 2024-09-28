<?php
    class detail{
        private $db;

        public function __construct(){
            $this -> db = new Database();
        }  
        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        // public function show_sp(){
        //     $query ="SELECT * FROM tbl_product ORDER BY product_id desc";
        //     $result = $this->db->SELECT($query);
        //     return $result;
        // }
        
        public function show_brand(){
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
            $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
            FROM tbl_brand INNER JOIN tbl_cartegory on tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
            ORDER BY tbl_brand.brand_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        // public function get_product($product_id){
        //     $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        //     $result = $this -> db -> select($query);
        //     return $result;

        // }
        public function update_product($product_id,$product_name, $product_price, $product_desc){
            $query = "UPDATE tbl_product SET  product_name='$product_name',product_price='$product_price',product_desc='$product_desc' WHERE product_id='$product_id' ";
            $result = $this -> db -> update($query);
            echo "<script> window.location = 'product_list.php' </script>";
            return $result;
                
        }
        public function insert_product( ){
            $product_name = $_POST['product_name'];
            $cartegory_id = $_POST['cartegory_id'];
            $brand_id = $_POST['brand_id'];
            $product_price = $_POST['product_price'];
            $product_sale = $_POST['product_sale'];
            $product_desc = $_POST['product_desc'];
            $product_img = $_FILES['product_img']['name'];
            $filetarget = basename($_FILES['product_img']['name']);
            $filetype = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
            if(file_exists("../uploads/$filetarget")){
                $alert = "Image đã tồn tại";
                return $alert;
            }
            else{
                if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"){
                    $alert = "Incorrect file format";
                    return $alert;
                }
                else{

                    move_uploaded_file($_FILES['product_img']['tmp_name'],"../uploads/".$_FILES['product_img']['name']);
                    $query = "INSERT INTO tbl_product(
                        product_name,
                        cartegory_id,
                        brand_id,
                        product_price,
                        product_sale,
                        product_desc,
                        product_img)
                        VALUES (
                        '$product_name',
                        '$cartegory_id',
                        '$brand_id',
                        '$product_price',
                        '$product_sale',
                        '$product_desc',
                        '$product_img')";
                    $result = $this->db->insert($query);
                    if($result){
                        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                        $result = $this -> db -> select($query)-> fetch_assoc();
                        $product_id = $result['product_id'];
                        $filename = $_FILES['product_images']['name'];
                        $filttmp = $_FILES['product_images']['tmp_name'];
                        
                        foreach ($filename as $key => $value)
                        {
                            move_uploaded_file($filttmp [$key],"../uploads/".$value);
                            $query = "INSERT INTO tbl_product_images(product_id,product_images) 
                            VALUES ('$product_id','$value')";
                            $result = $this -> db -> insert($query);
                        }
                    }
                } 
                }
            echo "<script> window.location = 'product_list.php' </script>";
            return $result;
        } 
        public function show_brand_ajax($cartegory_id){
            $query = "SELECT * FROM tbl_brand WHERE cartegory_id = '$cartegory_id'";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_product(){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        
        public function delete_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> delete($query);
            header('Location:product_list.php');
            return $result;
        }



























     

        


        public function get_brand($brand_id){
            $query = "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
            $result = $this -> db -> select($query);
            return $result;
        }
        
        public function  update_brand($cartegory_id,$brand_name,$brand_id){
            $query = "UPDATE tbl_brand SET brand_name = '$brand_name',cartegory_id = '$cartegory_id' WHERE brand_id = '$brand_id'";
            $result = $this -> db -> update($query);
            echo "<script> window.location = 'brand_list.php' </script>";
            return $result;
        } 

    }
?>
    <script src="../static/app.js"></script>
    