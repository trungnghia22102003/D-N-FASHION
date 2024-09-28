<?php
    class cartegory{
        private $db;
        public function __construct(){
            $this -> db = new Database();
        }  
        public function insert_cartegory($cartegory_name){
            $query = "INSERT INTO tbl_cartegory(cartegory_name) VALUES ('$cartegory_name')";
            $result = $this->db->insert($query);
            echo "<script> window.location = 'index.php?act=cate' </script>";
            return $result;
        } 

        public function show_sp(){
            $query ="SELECT * FROM tbl_product ORDER BY product_id desc";
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
        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC ";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_cartegory_sub($id){
            $query = "SELECT * FROM tbl_brand WHERE cartegory_id = $id";
            $result = $this -> db -> select($query);
            return $result;
        }

        public function get_cartegory($cartegory_id){
            $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
            $result = $this -> db -> select($query);
            return $result;

        }
        
        public function update_cartegory($cartegory_name,$cartegory_id){
            $query = "UPDATE tbl_cartegory SET cartegory_name = '$cartegory_name' WHERE cartegory_id = '$cartegory_id'";
            $result = $this -> db -> update($query);
            echo "<script> window.location = 'index.php?act=cate' </script>";
            return $result;
        } 

        public function delete_cartegory($cartegory_id){
            $query = "DELETE FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
            $result = $this -> db -> delete($query);
            echo "<script> window.location = 'index.php?act=cate' </script>";
            return $result;
        }   
    }
?>
    