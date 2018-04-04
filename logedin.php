<?php require_once ('dbconnection.php'); ?>
<?php require_once ('phplogout.php'); ?>
<?php require_once ('checkloggedin.php');?>

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
            <h1><a href="logedin.php" style="color:black;text-decoration: none;">Food For You </a></h1>            
        </div>
        <div id="welcomeuser">
            <?php if(isset($_SESSION['username'])): ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <table>
                    <tr>                        
                        <td><form method="post" action="createorder.php">
                            <input type="submit" value="Order" name="order" class="btn" style="width:70px; border-radius: 5px; padding: 10px;">
                        </form></td>
                        <td><form method="post" action="phplogout.php">
                            <input type="submit" value="Log out" name="logout" class="btn" style="width:70px; border-radius: 5px; padding: 10px;">                    
                        </form></td>
                    </tr>
                </table>
            <?php endif ?>          
        </div>
        <div class="content">                
            <div class="table" style="margin-left:-18%;">
                <tr>
                    <td><a href="menu.php?type=Burgers"><img id="burger" alt=burger" src="/burgers.jpg"></a></td>
                    <td><a href="menu.php?type=Pizzas"><img id="pizza" alt="pizza" src="/pizza.jpg"></a></td>
                </tr>
                <tr>
                    <td><a href="menu.php?type=Pasta"><img id="pasta" alt="pasta" src="/pasta.jpg"></a></td>
                    <td><a href="menu.php?type=Drinks"><img id="drinks" alt="drinks" src="/drinks.jpg"></a></td>
                </tr>            
            </div> 

            <?php if(isset($_SESSION['success'])): ?>               
                <?php                             
                    unset($_SESSION['success']);
                ?>          
            <?php endif ?>
        </div>   
    </body>
</html>

