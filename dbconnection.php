<?php
    session_start();
    
    //initialize variables
    $username = "";
    $email = "";
    $errors = array();
    
    //server connection
    $dsn = 'mysql:dbname=ffy_dev;host=localhost';
    $user = 'admin1';
    $password = '1234';    
    
    try{
        $dbh = new PDO($dsn, $user, $password);
    }catch (PDOException $e){
        echo 'Connection has been failed: ' . $e->getMessage();
    }    
