


<?php
class LoginModal{
    
    protected $db;
    
    public function __construct(PDO $db){
        $this->db = $db;
    }
    
     public function haveAccount($userName, $userPassword){
        return $this->db->query("SELET user_id FROM user WHERE user_name = ".$userName." AND user_password = SHA1('".$userPassword."')");
     }
    
    public function createAccount($firstName,$secondName, $userName, $password, ){
        return $this->$db->query("INSERT INTO user ('first_name','second_name','user_name','user_password') VALUES('".$firstName."','".$secondName."','".$userName."',SHA1('".$password."'))");
    }
}