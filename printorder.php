<?php require ('dbconnection.php'); ?>
<?php require ('phplogout.php'); ?>
<?php require ('checkloggedin.php');?>
<?php require ('phpprintorder.php');?>

<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="style.css">
<html>    
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="header">
            <h1><a href="logedin.php" style="color:black;text-decoration: none">Food For You </a></h1>            
        </div>
        <form class="btnform" action="signin.php" style="margin-right: 20%;">
            <input type="submit" value="Log out" name="logout" class="btnsignin" style="width: 70px; margin-right: 40%">
        </form>
        
        <?php
            
            $sum=0;
            
            $sth = $dbh-> prepare('SELECT orders.order_id, ordered_products.product, orders.username FROM orders  
            INNER JOIN ordered_products ON orders.order_id=ordered_products.order_id ');
            $orderId = $dbh->lastInsertId();
            $sth->execute();
            $result = $sth->fetchAll();
            
//            foreach($result as $product){
//                $sth = $dbh->prepare('SELECT price FROM menu WHERE product=?');
//                $sth->execute(array($product['product']));
//                $price= $sth->fetchAll();
//            }
//            print_r($price).'--------';die;
//            
        ?>
        
        <form method="post" action="logedin.php">
            <table style="margin-left:40%">
                <tr>
                    <th><h2 style="width: 90%;">Your Order</h2></th>
                </tr>
                <?php foreach($result as $orderline): ?>
                <?php 
                    $sth = $dbh->prepare('SELECT price FROM menu WHERE product=?');
                    $sth->execute(array($orderline['product']));
                    $price= $sth->fetchAll();
                    $sum = $sum + $price[0]['price'];
                ?>
                <tr>
                    <td><?= $orderline['product'].'...................................  '.$price[0]['price']?></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td>sum: <?= $sum ?></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Confirm" name="confirm" class="btnsignin" style="width: 80px;"></td>
                </tr>
                
            </table>
        </form>        
        
    </body>    
</html>

