
<?php
   class user{
      private $db;
      public function __construct(){
         $this -> db = new Database();
      }
      function checkuser($user,$pass){
       $db = new Database();
       $sql = "SELECT * FROM tbl_users WHERE user='".$user."' AND pass='".$pass."'";
       $result = $db->link->query($sql);
       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
            return $row['role'];
         }
       }else{
            echo '<script>alert("Sai username or password");</script>';
            header('location: login.php');
       }
      }
      function getuserinfo($user,$pass){
         $db = new Database;
         $sql = "SELECT * FROM tbl_users WHERE user='".$user."' AND pass='".$pass."'";
         $result = $this -> db ->select($sql);
         return $result;
        }
   }
?>