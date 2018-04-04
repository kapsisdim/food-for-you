<?php require_once ('dbconnection.php'); ?>
<?php require_once ('phplogout.php'); ?>
<?php require_once ('checkloggedin.php');?>
<?php require_once ('phpcreateorder.php'); ?>


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
            <h1><a href="logedin.php" style="color:black; text-decoration: none;text-decoration: none;">Food For You </a></h1>            
        </div>
        <form class="btnform" action="signin.php" style="margin-right: 20%;">
            <input type="submit" value="Log out" name="logout" class="btnsignin" style="width: 70px; margin-right: 40%">
        </form>
        
        <?php
            $sth = $dbh-> prepare('SELECT product, type, price FROM menu');
            $sth->execute();
            $order = $sth->fetchAll();                     
        ?>        
        <form method="post" action="phpcreateorder.php">
            <?php include ('errors.php');?>
            <table style="margin-left:35%">
                <tr>
                    <th><h2 style="width: 90%;">Pick you Order</h2></th>
                </tr>
                                
                <?php foreach($order as $product): ?>
                <tr>                    
                    <td><input type="checkbox" name="checkbox[]" value="<?= $product['product'];?>" ><?= ' '. $product['product'].'...................................  '.$product['price'].'€';?></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td><input type="submit" value="Submit" name="submit" class="btnsignin">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="logedin.php" class="btnsignin" style="text-decoration: none;margin-right: 0">Cancel</a></td>                    
                </tr>          
            </table>       
        </form>
    </body>
</html>




