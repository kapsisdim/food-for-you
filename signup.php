<?php require_once ('dbconnection.php'); ?>
<?php require_once ('phpsignup.php'); ?>

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
            <h2>Sign up</h2>
        </div>
        
        <form class="form" method="post" action="signup.php">
            <?php include('errors.php') ?>

            <div class="input">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input">
                <input type="submit" value="Register" name="register" class="btn" style="width:70px;">
            </div>
            <p>Already a member? <a href="signin.php"> Sign in</a></p>
        </form>
        
    </body>   
</html>
