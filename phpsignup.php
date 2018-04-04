<?php
    // user registration      
    if((!empty($_POST)) && (isset($_POST['register']))){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        
        //form validation
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        
        if(empty($email)){
            array_push($errors, "Email is required");
        }
        
        if(empty($password_1)){
            array_push($errors, "Password is required");
        }
        
        if($password_1 != $password_2){
            array_push($errors, "The two passwords do not match!");
        }
        
        $sth = $dbh->prepare('SELECT * FROM members WHERE username=? OR email=? ');
        $sth->execute(array($username, $email));
        $user = $sth->fetchAll();

        
        //if user exists
        if(!empty($user)){
           array_push($errors, 'User exists');           
        }        
        
        //if all ok register user
        if(count($errors) == 0){
            $password= md5($password_1);
            $st = $dbh->prepare('INSERT INTO members(username, email, password) VALUES(?,?,?)');
            $st->execute(array($username, $email, $password));

            $_SESSION['username'] = $username;
        }
    }


