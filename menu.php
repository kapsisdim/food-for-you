<?php require_once ('dbconnection.php'); ?>

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
            <h1><a href="index.php" style="color:black;text-decoration: none;">Food For You </a></h1>            
        </div>
        <form id="form" action="signin.php">
            <input type="submit" value="Sign in" name="signin" class="btnsignin" style="float:right; margin-right: ">
        </form>
        <div class="form" style="margin-top:5%; border: none; padding-left:0px; padding-right:0px;">
        <?php
            $type = $_GET['type'];
            $sth = $dbh->prepare('SELECT product, price FROM menu WHERE type=?');
            $sth->execute(array($type));
            $products = $sth->fetchAll();                      
        ?>          
        <table style='margin-top:-17.6%;'>
            <tr>
                <th><h2 style="width: 90%;"><?php echo $type;?></h2></th>
            </tr>
            <?php foreach($products as $product): ?>
            <tr>
                <td><?php echo $product['product'].'.....................................'.$product['price'].'€';?></td>
            </tr>
            <?php endforeach ?>
        </table>
        </div>
    </body>
    
</html>


