<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();

if($_SESSION['account_type'] != 'admin')
{
   header("location: ../HealthShoppingWebsite/home.php");
}

if(empty($_SESSION['user_id']))
{
   header("location: ../HealthShoppingWebsite/MarcelinoAdrian_login.php");
}


if(isset($_POST['add_product']))
{
    $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_quantity = $_POST['p_quantity'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'products_img/'.$p_image;

   $insert = mysqli_query($conn, "INSERT INTO `products`(product_name, product_img, product_price, product_quantity) VALUES ('$p_name', '$p_image', '$p_price', '$p_quantity')") or die('query failed');
   
   if($insert)
   {
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message = "Product Successfully Added";
        echo "<script type='text/javascript'>alert('$message');</script>";
      header("Refresh:0");
   }


}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE product_id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
   }
};


if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_quantity = $_POST['update_p_quantity'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'products_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET product_name = '$update_p_name', product_price = '$update_p_price', product_img = '$update_p_image', product_quantity = '$update_p_quantity' WHERE product_id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message = "Product Successfully Updated";
      }
      header('location:admin.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
     <style>
        table{
            width: 70%;
            margin: 50px auto;
        }
        table th
        {
         background: green;
         color: white;
        }
        table, tr, th, td{
            border: 1px solid rgba(0,0,0);
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;

        }
        .empty
         {
  
            margin-bottom: 1rem;
            text-align: center;
            background-color: green;
            color: white;
            font-size: 1.5rem;
            padding: 1rem;

         }
         .edit-form-container{
   position: fixed;
   top:0; left:0;
   z-index: 1100;
   background-color: rgba(0,0,0,0.5);
   padding: 25px;
   display: none;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   width: 100%;
}

.edit-form-container form{
   width: 50rem;
   border-radius: .5rem;
   background-color: white;
   text-align: center;
   padding:2rem;
}
        </style>
</head>
<body>
    <?php
        include_once 'admin_header.php';
   
    ?>
    <div class="admin">
        <section>
            
            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3 style="color: white;">Add New Product</h3>
            <input type="text" name="p_name" placeholder="Product name" class="box" required>
            <input type="number" name="p_price" min="0" placeholder="Product Price" class="box" required>
            <input type="number" name="p_quantity" min="0" placeholder="Stock Quantity" class="box" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg, application/pdf" class="box" required>
            <input type="submit" value="Add Product" name="add_product" class="add-btn">
    </form>
        </section>
    </div>

<section class="show_products">
   <h2 align="center">Products</h2>

   <table>

      <thead>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Product Price</th>
         <th>Stock Quantity</th>
         <th>Action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="products_img/<?php echo $row['product_img']; ?>" height="100" alt=""></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>₱<?php echo $row['product_price']; ?>/pc</td>
            <td><?php echo $row['product_quantity']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['product_id']; ?>" onclick="return confirm('Remove Item From Cart?')" class="delete-btn"> Delete</a>
               <a href="admin.php?edit=<?php echo $row['product_id']; ?>" class="option-btn"> Update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>No Product Added</div>";
            };
         ?>
      </tbody>
   </table>
        </section>
        
<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <img src="products_img/<?php echo $fetch_edit['product_img']; ?>" height="100" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['product_id']; ?>">
      <label for="update_p_name">Product Name</label>
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['product_name']; ?>">
      <label for="update_p_price">Price</label>
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['product_price']; ?>">
      <label for="update_p_quantity">Stock Quantity</label>
      <input type="number" min="0" class="box" required name="update_p_quantity" value="<?php echo $fetch_edit['product_quantity']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
    

    <script>
      document.querySelector('#close-edit').onclick = () => 
      {
      document.querySelector('.edit-form-container').style.display = 'none';
      window.location.href = 'admin.php';
      }    </script>
</body>
</html>