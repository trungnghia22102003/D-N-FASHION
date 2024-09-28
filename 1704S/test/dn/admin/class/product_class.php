<?php
    class product{
        private $db;
        public function customFormatNumber($number) {
            // Nếu số lớn hơn hoặc bằng 1000000, thì sẽ được hiển thị với định dạng 1.590.000
            if ($number >= 1000000) {
                return number_format($number / 1000000, 3, ',', '.000');
            }
            // Nếu số lớn hơn hoặc bằng 1000, thì sẽ được hiển thị với định dạng 590.000
            elseif ($number >= 1000) {
                return number_format($number / 1000, 3, ',', '.000');
            }
            // Ngược lại, số nhỏ hơn 1000 sẽ được hiển thị mà không có số 0 sau dấu phẩy
            else {
                return number_format($number, 0, ',', '.000');
            }
        }
        public function __construct(){
            $this -> db = new Database();
        }  
        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function hienthiall_sp(){
            $query =" SELECT * FROM tbl_product ORDER BY product_id desc ";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function show_sp_all_nam(){
            $query ="SELECT * FROM tbl_product where cartegory_id = 27";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function show_sp_all_nu(){
            $query ="SELECT * FROM tbl_product where cartegory_id = 28";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function show_sp_all_treem(){
            $query ="SELECT * FROM tbl_product where cartegory_id = 29";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function hienthisotrangtreem($tongsosp,$soluongsp){
            $tongsanpham=mysqli_num_rows($tongsosp);
            $sotrang=ceil($tongsanpham/$soluongsp);
            $html_sotrang="";
            for($i=1;$i<=$sotrang;$i++){
                $html_sotrang.='<li><a href="index.php?act=product&cartegory_id=29&page='.$i.'">'.$i.'</a></li>';
            }
            return $html_sotrang;
        }
        public function hienthisotrangu($tongsosp,$soluongsp){
            $tongsanpham=mysqli_num_rows($tongsosp);
            $sotrang=ceil($tongsanpham/$soluongsp);
            $html_sotrang="";
            for($i=1;$i<=$sotrang;$i++){
                $html_sotrang.='<li><a href="index.php?act=product&cartegory_id=28&page='.$i.'">'.$i.'</a></li>';
            }
            return $html_sotrang;
        }
        public function show_sp_nam(){
            $query ="SELECT * FROM tbl_product where cartegory_id = 27 LIMIT 5";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function show_sp_nu(){
            $query ="SELECT * FROM tbl_product where cartegory_id = 28 LIMIT 5";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function show_sp_treem(){
            $query ="SELECT * FROM tbl_product where cartegory_id = 29 LIMIT 5";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function hienthisotrangnam($tongsosp,$soluongsp){
            $tongsanpham=mysqli_num_rows($tongsosp);
            $sotrang=ceil($tongsanpham/$soluongsp);
            $html_sotrang="";
            for($i=1;$i<=$sotrang;$i++){
                $html_sotrang.='<li><a href="index.php?act=product&cartegory_id=27&page='.$i.'">'.$i.'</a></li>';
            }
            return $html_sotrang;
        }
        public function hienthisotrang($tongsosp,$soluongsp){
            $tongsanpham=mysqli_num_rows($tongsosp);
            $sotrang=ceil($tongsanpham/$soluongsp);
            $html_sotrang="";
            for($i=1;$i<=$sotrang;$i++){
                $html_sotrang.='<li><a href="index.php?act=product&page='.$i.'">'.$i.'</a></li>';
            }
            return $html_sotrang;
        }
        public function show_sp($keyw="",$page,$soluongsp){
            // if(($page="")||($page=0)) $page=1;
            $batdau=($page-1)*$soluongsp;
            $query = "";
            if(!empty($keyw)){
                if($keyw!=""){
                    $query .= " SELECT * FROM tbl_product WHERE product_name LIKE '%$keyw%'";
                    $query .=" LIMIT ".$batdau.",".$soluongsp;
                    $result = $this->db->SELECT($query); // Thực thi truy vấn
                    return $result;
                }else{
                    echo "không có sản phẩm phù hợp";
                }
            }else{
                $query .=" SELECT * FROM tbl_product ORDER BY product_id desc ";
                $query .=" LIMIT ".$batdau.",".$soluongsp;
                $result = $this->db->SELECT($query);
                return $result;
            }
        }

        public function show_sp_same($id){
            $query ="SELECT * FROM tbl_product where brand_id = $id LIMIT 5";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function show_sp_id($id){
            $query ="SELECT * FROM tbl_product Where product_id = $id ";
            $result = $this->db->SELECT($query);
            return $result;
        }
        
        public function show_sp__br_id($br_id,$cr_id){
            $query ="SELECT * FROM tbl_product Where cartegory_id = $cr_id and brand_id = $br_id ";
            $result = $this->db->SELECT($query);
            return $result;
        }

        public function show_sp_all($cr_id,$page,$soluongsp){
            $batdau=($page-1)*$soluongsp;
            $query ="";
                $query .=" SELECT * FROM tbl_product Where cartegory_id = $cr_id ";
                $query .=" LIMIT ".$batdau.",".$soluongsp;
                $result = $this->db->SELECT($query);
                return $result;
        }


        public function show_sp_id_images($id){
            $query ="SELECT * FROM tbl_product_images Where product_id = $id ";
            $result = $this->db->SELECT($query);
            return $result;
        }
        public function showdanhmucchitiet(){
            $sql ="SELECT
            c.cartegory_id,
            c.cartegory_name AS cartegory_name,
            cd.brand_id,
            cd.brand_name AS brand_name
            FROM
            tbl_cartegory c
            JOIN
            tbl_brand cd ON c.cartegory_id = cd.cartegory_id;";
            
            $result = mysqli_query($this->db->connectDB(),$sql);
            $cartegories = array();
            while ($row = mysqli_fetch_assoc($result)){
                $cartegory_id = $row['cartegory_id'];
                $cartegory_name = $row['cartegory_name'];
                $brand_id = $row['brand_id'];
                $brand_name = $row['brand_name'];
                //Tạo mảng đa chiều
                $cartegories[$cartegory_id]['name'] = $cartegory_name;
                $cartegories[$cartegory_id]['details'][$brand_id] = $brand_name;
            }
            return $cartegories;
        }


        public function show_brand(){
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
            $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
            FROM tbl_brand INNER JOIN tbl_cartegory on tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
            ORDER BY tbl_brand.brand_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function get_product($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> select($query);
            return $result;

        }
        public function update_product($product_id,$product_name, $product_price, $product_desc,$product_img,$product_preverse){
           if($product_img){
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
             $query = "UPDATE tbl_product SET  product_name='$product_name',product_price='$product_price',product_desc='$product_desc',product_img='$product_img',product_preverse='$product_preverse' WHERE product_id='$product_id' ";       
            $result = $this -> db -> update($query);
            echo "<script> window.location = 'index.php?act=product_list' </script>";
            return $result;  
           }else{
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']); 
            $query = "UPDATE tbl_product SET  product_name='$product_name',product_price='$product_price',product_desc='$product_desc',product_preverse='$product_preverse' WHERE product_id='$product_id' ";       
            $result = $this -> db -> update($query);
            echo "<script> window.location = 'index.php?act=product_list' </script>";
            return $result;   
        }
               
        }
       
        public function insert_product(){
            $product_name = $_POST['product_name'];
            $cartegory_id = $_POST['cartegory_id'];
            $brand_id = $_POST['brand_id'];
            $product_price = $_POST['product_price'];
            $product_sale = $_POST['product_sale'];
            $product_desc = $_POST['product_desc'];
            $product_preverse = $_POST['product_preverse'];
            $product_img = $_FILES['product_img']['name'];
            $filetarget = basename($_FILES['product_img']['name']);
            $filetype = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
            if(file_exists("uploads/$filetarget")){
                $alert = "Image đã tồn tại";
                return $alert;
            }
            else{
                if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"){
                    $alert = "Incorrect file format";
                    return $alert;
                }
                else{
                    move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
                    $query = "INSERT INTO tbl_product(
                        product_name,
                        cartegory_id,
                        brand_id,
                        product_price,
                        product_sale,
                        product_desc,
                        product_preverse,
                        product_img)
                        VALUES (
                        '$product_name',
                        '$cartegory_id',
                        '$brand_id',
                        '$product_price',
                        '$product_sale',
                        '$product_desc',
                        ' $product_preverse',
                        '$product_img'
                        )";
                    $result = $this->db->insert($query);
                    if($result){
                        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                        $result = $this -> db -> select($query)-> fetch_assoc();
                        $product_id = $result['product_id'];
                        $filename = $_FILES['product_images']['name'];
                        $filttmp = $_FILES['product_images']['tmp_name'];
                        
                        foreach ($filename as $key => $value)
                        {
                            move_uploaded_file($filttmp [$key],"uploads/".$value);
                            $query = "INSERT INTO tbl_product_images(product_id,product_images) 
                            VALUES ('$product_id','$value')";
                            $result = $this -> db -> insert($query);
                        }
                    }
                } 
                }
            echo "<script> window.location = 'index.php?act=product_list' </script>";
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
            echo "<script> window.location = 'index.php?act=product_list' </script>";
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
    