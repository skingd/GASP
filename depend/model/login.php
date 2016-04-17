<?php
    if(isset($_POST)){
        $isValid = true;
        if(!empty($_POST['user_name'])){
            $email = $_POST['user_name'];
        }else{
            $isValid = false;
           
        }
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
          
                
            }
        }else{
            $isValid = false;
        }
        if($isValid){
            $loginModal = LoginModal(ReadDatabase());
            if(isset($result)){
                $_SESSION['user_id'] = $result['user_id'];
            }
        }
    }
?>
