
<?php
    require_once ('dbconnection.php');
    require_once ('errors.php');

    if(isset($_POST['submit'])){ 
                       
        //check if there is an order for this user
        $sth = $dbh->prepare('SELECT status, order_id FROM orders WHERE username=? AND status="pending"');
        $sth->execute(array($_SESSION['username']));
        $result = $sth->fetchAll();
        
        //if there isn't, create a new order for this  user
        if(empty($result)){
            //create user's order
            $sth = $dbh->prepare('INSERT INTO orders(username, status) VALUES(?,?)');
            $sth->execute(array($_SESSION['username'], "pending"));
            $orderId = $dbh->lastInsertId();
            if(!empty($_POST['checkbox'])){
                foreach($_POST['checkbox'] as $check){ 
                    $sth = $dbh->prepare('INSERT INTO ordered_products(order_id, product) VALUES(?, ?) ');
                    $sth->execute(array($orderId, $check));
                }
                header("location: printorder.php");           
            }else{
                //ftia3imo
                array_push($errors, "Your order is empty");
            }
        //if the user already has a pending order
        }else{
            if(!empty($_POST['checkbox'])){
                
                $sth = $dbh->prepare('SELECT order_id FROM orders WHERE username=? AND status="pending"');
                $sth->execute(array($_SESSION['username']));
                $result = $sth->fetchAll();
                
                foreach($_POST['checkbox'] as $check){
                    $sth = $dbh->prepare('INSERT INTO ordered_products(order_id, product) VALUES(?,?) ');
                    $sth->execute(array($result[0]['order_id'], $check));
                }
            }
            header("location: printorder.php");
        }
    }

