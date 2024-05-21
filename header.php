

<header class="header">
        <link rel="stylesheet" href="style.css">
        <a href="home.php"><img class="logo" src="./images/cardiogram2.png" alt="logo"></a>
        <ul class="navlinks">
            <li><a href="home.php">Home</a></li>
            <li><a href="home.php#abtPanel">About</a></li>
            <li><a href="products.php">Products</a></li>

            <?php
                 
                 if(isset($_SESSION['user_id']))
                {
                    echo "<li><a href='logout.php'>Log Out</a></li>";
                }
                else
                {
                    echo "<div class='accBtn'>
                     <a href='MarcelinoAdrian_login.php'>Log In</a>
                    <span>/</span>
                    <a href='MarcelinoAdrian_registration.php'>Sign Up</a>
                    </div>";
                }    
            ?>
            <?php
      
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

                ?>

        <li><a href="cart.php" class="cart"><span><i class="fa fa-cart-shopping"></i> <span><?php echo $row_count; ?></span></a></li>
        </ul>
    </header>

   

                