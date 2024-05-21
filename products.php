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
    <link rel="stylesheet" href="products.css">
    <script src="https://kit.fontawesome.com/d806250adb.js" crossorigin="anonymous"></script>
    <title>Products</title>
   
</head>
<body>
    <?php
        include_once 'header.php';
    ?>

    
<div class="prod-container">

<section class="prod">

   <h1 align="center" style="color:white;" class="heading">Products</h1>

   <div class="products">

      <?php

      if(isset($_POST['add_to_cart'])){

         $product_name = $_POST['product_name'];
         $product_price = $_POST['product_price'];
         $product_image = $_POST['product_image'];
         $product_quantity = 1;
      
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name'");
         
         if(mysqli_num_rows($select_cart) > 0){
            $message = "Product already added to cart";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0");
           
         }else{
            $insert_product = mysqli_query($conn, "INSERT INTO `cart`(product_name, product_price, product_img, product_quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
            $message = "Product added to cart successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0");
         }
         
      
      }

      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="item">
            <div class="itemImg">
               <img src="products_img/<?php echo $fetch_product['product_img']; ?>" alt="">
            </div>
            <div class="itemText">
            <h3><?php echo $fetch_product['product_name']; ?></h3>
            <div class="price">₱<?php echo $fetch_product['product_price']; ?>/pc</div>
            </div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_img']; ?>">
            <input type="submit" class="btn" value="Add To Cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>
</body>
</html>