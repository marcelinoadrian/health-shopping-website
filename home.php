<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/d806250adb.js" crossorigin="anonymous"></script>
    <title>Home</title>

</head>
<body>
    <?php
        include_once 'header.php';
    ?>

    <section class="home">
        <div class="banner">
            <h1>The First Wealth is Health.</h1>
            <p>A fit, healthy, body - That is the best fashion statement. </p>
        </div>
        <div class="featured">
        <div class="item">
            <div class="itemImg">
                <img src="./images/apples.jpg" alt="">
            </div>
            <div class="itemText">
                <div class="itemTxt">
                    <h3>Apple</h3>
                    <p>₱ 69</p>
                </div>
                <div class="itemLink">
                    <a class="addLink" href="#">Add to Cart</a>
        
                    <a class="buyLink" href="#">Buy Now</a>
                </div>
            </div>
        
        </div>
        <div class="item">
            <div class="itemImg">
                <img src="./images/banana.jpg" alt="">
            </div>
            <div class="itemText">
                <div class="itemTxt">
                    <h3>Banana</h3>
                    <p>₱ 69</p>
                </div>
                <div class="itemLink">
                    <a class="addLink" href="#">Add to Cart</a>
        
                    <a class="buyLink" href="#">Buy Now</a>
                </div>
            </div>
        
        </div>
        <div class="item">
            <div class="itemImg">
                <img src="./images/cucumber.jpg" alt="">
            </div>
            <div class="itemText">
                <div class="itemTxt">
                    <h3>Cucumber</h3>
                    <p>₱ 69</p>
                </div>
                <div class="itemLink">
                    <a class="addLink" href="#">Add to Cart</a>
        
                    <a class="buyLink" href="#">Buy Now</a>
                </div>
            </div>
        
        </div>
        <div class="item">
            <div class="itemImg">
                <img src="./images/turmeric.jpg" alt="">
            </div>
            <div class="itemText">
                <div class="itemTxt">
                    <h3>Turmeric</h3>
                    <p>₱ 69</p>
                </div>
                <div class="itemLink">
                    <a class="addLink" href="#">Add to Cart</a>
        
                    <a class="buyLink" href="#">Buy Now</a>
                </div>
            </div>
        
        </div>
        </div>
    </section>
    <section class="abtPanel" id="abtPanel">

        
            
        <div class="about">
            <div class="image">
            <img src="./images/cardiogram2.png" alt="pic">
        </div>
        <div class="txtDiv">
            <h2>What is TopHealth?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, exercitationem. Qui soluta ipsam alias quod!
                Asperiores animi rerum iste doloremque at incidunt nam fugiat iure. Dolorum ullam vero voluptates quisquam
                quaerat animi. Vitae facere exercitationem quasi, ea placeat labore rem magnam totam quisquam doloremque
                molestiae, atque omnis alias cum repellat.</p>
        </div></div>
        <div class="abtText">
            <h2>The Minds Behind TopHealth</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio totam aut saepe voluptatem minima harum dolorem
                neque perferendis natus quae!</p>
        </div>
        <div class="members">
        
            <div class="member-1">
                <img src="./images/members/Gabriel.jpg" alt="">
                <h3>Gabriel Angelo Berba</h3>
                <a href="https://www.facebook.com/gabrielangelo.berba.3" target="_blank">Profile Page</a>
            </div>
            <div class="member-1">
                <img src="./images/members/Greg.jpg" alt="">
                <h3>Greg Francis De Castro</h3>
                <a href="https://www.facebook.com/profile.php?id=100087364554283" target="_blank">Profile Page</a>
            </div>
            <div class="member-1">
                <img src="./images/members/Adrian.jpg" alt="">
                <h3>Adrian Marcelino</h3>
                <a href="https://www.facebook.com/marcelino.adrian33" target="_blank">Profile Page</a>
            </div>
            <div class="member-1">
                <img src="./images/members/Joshua.jpg" alt="">
                <h3>Joshua Caleb Dacutanan</h3>
                <a href="https://www.facebook.com/JoshuaCalebDacutanan" target="_blank">Profile Page</a>
            </div>
            <div class="member-1">
                <img src="./images/members/Sean.jpg" alt="">
                <h3>Sean Allen Nagales</h3>
                <a href="https://www.facebook.com/Shoooooooooon" target="_blank">Profile Page</a>
            </div>
        </div>
    </section>
   
</body>
</html>