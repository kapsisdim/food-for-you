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
            <h1><a href="index.php" style="color:black;text-decoration: none;" >Food For You </a></h1>            
        </div>
        <form class="btnform" action="signin.php" style="margin-right:10%;">
            <input type="submit" value="Sign in" name="signin" class="btnsignin" style="">
        </form>
            
        <table class="content">
            <tr>
                <td><a href="menu.php?type=Burgers"><img id="burger" alt=burger" src="/burgers.jpg"></a></td>
                <td><a href="menu.php?type=Pizzas"><img id="pizza" alt="pizza" src="/pizza.jpg"></a></td>
            </tr>
            <tr>
                <td><a href="menu.php?type=Pasta"><img id="pasta" alt="pasta" src="/pasta.jpg"></a></td>
                <td><a href="menu.php?type=Drinks"><img id="drinks" alt="drinks" src="/drinks.jpg" style=""></a></td>
            </tr>          
        </table>   
    </body>
</html>
