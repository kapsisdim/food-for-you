<?php require_once ('dbconnection.php'); ?>
<?php require_once ('phpsignin.php'); ?>

<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="style.css">

<html>
    <head>
        <title></title>              
    </head>
    
    <body>
        <h1><a href="index.php" style="color:black;text-decoration: none;">Food For You </a></h1>            

        <div class="header">
            <h2>Sign in</h2>
        </div>
        <form class="form" method="post" action="signin.php">
            
            <?php include('errors.php') ?>
            
            <div class="input">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password">
            </div>            
            <div class="input">
                <input type="submit" value="Sign in" name="signin" class="btn" style="width:70px;">
            </div>
            <p>Not a member? <a href="signup.php"> Sign up</a></p>
            
        </form>
        
    </body>    
</html>


