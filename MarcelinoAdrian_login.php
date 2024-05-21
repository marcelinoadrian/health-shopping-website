<?php
session_start();
if(!empty($_SESSION['user_id']))
{
   header("location: ../home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link type="icon" rel="icon" href="./images/favicon.ico">
    <title>Login</title>

    <style>
    .loginBanner {
    width: 65vw;
    height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(./images/pexels-jane-doan-2027696.jpg) center/cover fixed no-repeat;
    float: left;
}
    a {
    text-decoration: none;
    
    }
    #regLogo {
    border: 1px solid black;
    display: inline-block;
    padding: 5px;
    border-radius: 10px;
    margin-bottom: 80px;
}

#login {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid gray;
    width: 80px;
    margin-bottom: 10px;
}
    .reg
    {
        padding-top: 120px;
    }
    </style>
</head>

<body>
    <div class="loginBanner"></div>
    <div class="reg">
        <h1 id="regLogo">Online Health Shopping Website</h1>
        <h2>Log In</h2>
        <?php
        if(isset($_GET["error"]))
        {

            if($_GET["error"] == "invalidusernameorpassword")
            {
                echo "<p>Invalid Username or Password</p>";
            }
            
        }
        ?>
        
        <form class="registration" action="login.php" method="POST">

            <input type="text" id="username" name="username" placeholder="E-mail">
            <br>

            <input type="password" id="pword" name="pword" placeholder="Password" required>
            <br>
            <input id="login" type="submit" name="login" value="Log In" required>
            
        </form>
        <a id="forgot" href="MarcelinoAdrian_forgot.php">Forgot Password?</a>
        <br>
        <br>
        <br>
        <p>Don't you have an account?<a href="./MarcelinoAdrian_registration.php"> Sign Up</a></p>
    </div>
</body>



</html>