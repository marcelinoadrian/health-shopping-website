<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();

if(empty($_SESSION['user_id']))
{
   header("location: ../HealthShoppingWebsite/MarcelinoAdrian_login.php");
}

if(isset($_POST['order_btn'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $house_no = $_POST['house_no'];
    $baranggay = $_POST['baranggay'];
    $city = $_POST['city'];
    $province = $_POST['province'];

 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($select_cart) > 0){
       while($product_item = mysqli_fetch_assoc($select_cart)){
          $product_name[] = $product_item['product_name'] .' ('. $product_item['product_quantity'] .') ';
          $product_price = $product_item['product_price'] * $product_item['product_quantity'];
          $price_total += $product_price;
       };
    };
 
    $total_product = implode(', ',$product_name);
    $date = date('Y-m-d H:i:s');
    $insert_orders = mysqli_query($conn, "INSERT INTO `orders`(customer_name, phone_number, email_add, payment_method, house_no, baranggay, city, province, ordered_products, total_price, order_date) 
    VALUES('$name','$number','$email','$method','$house_no','$baranggay','$city','$province', '$total_product','$price_total','$date')") or die('query failed');
 
    if($select_cart && $insert_orders){
     
   
       echo "
       <div class='order-message-container'>
       <div class='message-container'>
          <h3>Purchase successful!</h3>
          <div class='order-detail'>
             <span>".$total_product."</span>
             <span class='total'> Total Price: ₱".$price_total."  </span>
          </div>
          <div class='customer-details'>
             <p> Name : <span>".$name."</span> </p>
             <p> Phoneumber : <span>".$number."</span> </p>
             <p> E-mail : <span>".$email."</span> </p>
             <p> Address : <span>".$house_no.", ".$baranggay.", ".$city.", ".$province."</span> </p>
             <p> Payment Method : <span>".$method."</span> </p>
          </div>
             <a href='products.php' class='btn'>Browse other products</a>
          </div>
       </div>
       
       ";
        mysqli_query($conn, "DELETE FROM `cart`");
    }
 
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d806250adb.js" crossorigin="anonymous"></script>
    <title>Checkout</title>
</head>
<body>
<?php
       
       include_once 'header.php';
   ?>
   <div class="container">

<section class="checkout-form">

   <h1 class="heading" align="center">Confirm Order Details</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['product_price'] * $fetch_cart['product_quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['product_quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Total Price: ₱<?= $grand_total; ?></span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Name</span>
            <input type="text" placeholder="Enter Full Name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Phone Number</span>
            <input type="number" placeholder="Enter Phone Number" name="number" required>
         </div>
         <div class="inputBox">
            <span>E-mail</span>
            <input type="email" placeholder="Enter valid email address" name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="COD(Cash On Delivery)" selected>COD(Cash On Delivery)</option>
               <option value="Credit Card">Credit Card</option>
               <option value="Gcash">Gcash</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address1</span>
            <input type="text" placeholder="House No. / Street Name" name="house_no" required>
         </div>
         <div class="inputBox">
            <span>Address2</span>
            <input type="text" placeholder="Baranggay" name="baranggay" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="City/Municipality" name="city" required>
         </div>
         <div class="inputBox">
            <span>Province</span>
            <input type="text" placeholder="Province" name="province" required>
         </div>
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>
</body>
</html>