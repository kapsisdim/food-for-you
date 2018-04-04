<?php
    //log in user
    if((!empty($_POST)) && (isset($_POST['signin']))){   
                
        $username= ($_POST['username']);
        $password= $_POST['password'];        
        
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        
        if(empty($password)){
            array_push($errors,"Password is required");
        }
        
        if(count($errors) == 0){
            $password = md5($password);
            $stt = $dbh->prepare('SELECT * FROM members WHERE username=? AND password=?');
            $stt ->execute(array($username, $password));
            $result = $stt->fetchAll();
            
            if(count($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: logedin.php');
            }else{
                array_push($errors,"The username/password is invalid");
            }
        }        
    }

