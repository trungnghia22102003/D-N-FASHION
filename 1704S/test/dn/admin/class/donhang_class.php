    <?php
    class donhang{
        public $db;
        public function __construct(){
            $this -> db = new Database();
        }  
        public function taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel){
            $query = "INSERT INTO tbl_donhang(madh, tongdonhang, pttt,  name, address, email, tel) VALUES ('".$madh."','".$tongdonhang."','".$pttt."','".$name."','".$address."','".$email."','".$tel."')";
            if (mysqli_query($this->db->link, $query)) {
                $last_id = mysqli_insert_id($this->db->link);
                return $last_id;
            } else {
            return null;
            }
            //  Lấy ID tự động tăn
        }

        public function get_ttdh($n){
            switch($n){
                case '0':
                    $tt ="Đơn hàng mới";
                    break;
                    case '1':
                        $tt ="Đang xử lý";
                        break;
                        case '2':
                            $tt ="Đang giao hàng";
                            break;
                            case '3':
                                $tt ="Đã giao hàng";
                                break;
                                default:
                                $tt ="Đơn hàng mới";
                                break;
            }
            return $tt;
        }
        public function delete_bill($id){
            $query = "DELETE FROM tbl_donhang WHERE id = '$id'";
            $result = $this -> db -> delete($query);
            echo "<script> window.location = 'index.php?act=listbill' </script>";
            return $result;
        }
        public function update_bill($madh,$name, $address,$tel,$id){
            
            $query = "UPDATE tbl_donhang SET madh = '$madh',name='$name',tel='$tel',address=' $address' WHERE id = '$id'";
            $result = $this -> db -> update($query);
            echo "<script> window.location = 'index.php?act=listbill' </script>";
            return $result;
        } 


        public function addtocart($iddh,$idpro,$tensp,$img,$dongia,$soluong){
            $query = "INSERT INTO tbl_cart(iddh,idpro,soluong,dongia,tensp,img) VALUES('".$iddh."','".$idpro."','".$soluong."','".$dongia."','".$tensp."','".$img."')";
            $result = $this->db->insert($query);
            return $result; 
        }

        public function getshowcart($iddh){
            $query = "SELECT * FROM tbl_cart WHERE iddh=".$iddh."";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_bill($id){
            $query = "SELECT * FROM tbl_donhang WHERE id = '$id'";
            $result = $this -> db -> select($query);
            return $result;

        }
        public function show_bill(){
            $query = "SELECT * FROM tbl_donhang ORDER BY id DESC  ";
            $result = $this->db->select($query);
            return $result;
        }
            }

    ?>