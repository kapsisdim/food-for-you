<?php
    //check if there is a user logged in
    if(empty($_SESSION['username'])){
        header('location: signin.php');
    }
       
