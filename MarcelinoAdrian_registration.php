<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link type="icon" rel="icon" href="./images/favicon.ico">
    <title>Create Account</title>
</head>
<body>
    <div class="regBanner"></div>
    <div class="reg">
        <h1 id="regLogo">Online Health Shopping Website</h1>
        <h2>Create an account</h2>

        <?php
        if(isset($_GET["error"]))
        {

            if($_GET["error"] == "invalidemail")
            {
                echo "<p>Invalid Email Address</p>";
            }
            else if($_GET["error"] == "passwordnotmatched")
            {
                echo "<p>Passwords not matched</p>";
            }
            else if($_GET["error"] == "userExists")
            {
                echo "<p>Username or Email already taken</p>";
            }
        }
    
        ?>
        <form class="registration" action="add_record.php" method="POST">

            
            <input type="text" id="username" name="username" placeholder="Username" required>
            <br>
            <input type="email" id="email" name="email_add" placeholder="E-mail" required>
            <br>
            
            <input type="password" id="pword" name="u_pass" placeholder="Password" required>
            <br>
          
            <input type="password" id="cpword" name="c_pass" placeholder="Confirm Password" required>
            <br>
            
            <input type="text" id="name" name="full_name" placeholder="Full Name" required>
            <br>
       

           
            <input type="number" id="cnumber" name="contact_no" placeholder="Contact Number" required>
            <br>
            
            <input type="reset" id="reset" name="reset">
            <input type="submit" id="submit" name="submit">
        </form>
        <br>
        <p>Already have an account?<a href="MarcelinoAdrian_login.php"> Sign In</a></p>
    </div>
    

</body>
</html>