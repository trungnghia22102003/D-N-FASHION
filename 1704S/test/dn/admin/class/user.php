<?php
    class user{
    private $db;
    public function __construct(){
        $this -> db = new Database();
    } 
    public function checkuser($user,$pass){
    $db = new Database;
    $user = mysqli_real_escape_string($db->link,$user);
    $pass = mysqli_real_escape_string($db->link,$pass);
    $sql = "SELECT * FROM tbl_users WHERE user='".$user."' AND pass='".$pass."'";
    $result = $db->link->query($sql);
    if (mysqli_num_rows($result)>0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           return $row['role'];
        }}else{        
            return "";
        }
    }
    public function checkpass($pass){
        $db = new Database;
        $pass = mysqli_real_escape_string($db->link,$pass);
        $sql = "SELECT * FROM tbl_users WHERE pass='".$pass."'";
        $result = $db->link->query($sql);
        if (mysqli_num_rows($result)>0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               return $pass;
            }}else{        
                return "";
            }
    }
    public function checknewuser($user){
        $db = new Database;
        $user = mysqli_real_escape_string($db->link,$user);
        $sql = "SELECT * FROM tbl_users WHERE user='".$user."'";
        $result = $db->link->query($sql);
        if (mysqli_num_rows($result)>0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               return $user;
            }}else{        
                return "";
            }
    }
    public function updatepass($newpass){
        $query = "UPDATE tbl_users SET pass = '$newpass' WHERE user='".$_SESSION['user']."'";
        $result = $this -> db -> update($query);
        echo "<script>alert('Mật khẩu đã được thay đổi');</script>";
        return $result;
        }
    public function showinfor($userss){
        $query = "SELECT * FROM tbl_users where user = '$userss'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function showuser(){
        $query = "SELECT * FROM tbl_users where role = 0 ORDER BY id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function showuseradmin(){
        $query = "SELECT * FROM tbl_users where role = 1 ORDER BY id DESC";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function insertuser(){
        $name = $_POST['ten'];
        $dienthoai = $_POST['phone'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "INSERT INTO tbl_users(name,phone,address,email,user,pass) VALUE ('".$name."',
        '".$dienthoai."','".$diachi."','".$email."','".$user."','".$pass."')";
        $result = $this->db->insert($query);
        return $result;
    }      
}
    // public function getuserinfo($user,$pass){
    //       $sql = "SELECT * FROM tbl_users WHERE user='".$user."' AND pass='".$pass."'";
    //       $result = $this -> db ->select($sql);
    //       return $result;
    //      }

    
?>

                