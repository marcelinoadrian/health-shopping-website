<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET product_quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
    <script src="https://kit.fontawesome.com/d806250adb.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <section class="cart">
        <h1 class="heading" align="center" style="margin-top:20px;">Shopping Cart</h1>
        <table>

             <thead>
         <th>Image</th>
         <th>Product Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total price</th>
         <th>Action</th>
      </thead>
      <tbody>
        <?php 
         
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $grand_total = 0;
            if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <tr>
            <td><img src="products_img/<?php echo $fetch_cart['product_img']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['product_name']; ?></td>
            <td>₱<?php echo ($fetch_cart['product_price']); ?>/pc</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['product_quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>₱<?php echo $sub_total = ($fetch_cart['product_price'] * $fetch_cart['product_quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove Item From Cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         }; 
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
            <td colspan="3">Total Price</td>
            <td>₱<?php echo $grand_total; ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
         </tr>

      </tbody>
</table>
<div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
   </div>
        </section>
    </div>
</body>
</html>