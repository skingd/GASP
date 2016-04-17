<?php
    if(isset($_POST)){
        $isValid = true;
        
        if(!empty($_POST['first_name'])){
            $firstName = $_POST['first_name'];
        }else{
            $isValid = false;
        }
        if(!empty($_POST['last_name'])){
            $lastName = $_POST['last_name'];
        }else{
            $isValid = false;
        }
        if(!empty($_POST['user_name'])){
            $userName = $_POST['user_name'];
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
            $result = $loginModal->createAccount($firstName, $lastName, $userName, $password);
            $_SESSION['user_id'] = $result['user_id'];
            
        }
    }
?>