<?php
include 'dbconnection.php';
$conn = OpenCon();
session_start();

if(isset($_GET['order_delete'])){
    $delete_id = $_GET['order_delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `orders` WHERE order_id = $delete_id") or die('query failed');
    if($delete_query){
       header('location:orders.php');
    }
 };
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    <link rel="stylesheet" href="style.css">
    <style>
       *
       {
         box-sizing: border-box;
         padding: 0;
         margin: 0;
       }
        table{
            
            max-width: 500px;
            margin: 50px auto;
            text-align:center;
        }
        table, tr, th, td{
            border: 1px solid rgba(0,0,0,0.5);
            border-collapse: collapse;
            padding: 5px;
        }
        th, td{
            text-align: left;

        }
        tr:nth-child(even){

           background: green;
        }

        
        .noResult
        {
            margin-top: 50px;
            text-align:center;
            background: green;
            color: white;
        }
        
    </style>

</head>
<body>
    
<?php
    include 'admin_header.php';
?>
<section class="orders-container">
        <div class="records">
        
        <h2 align="center" style="margin: 50px 0;">Orders List</h2>
        <table>

        <thead>
   <th>Customer Name</th>
   <th>Phone No.</th>
   <th>E-mail</th>
   <th>Payment Method</th>
   <th>House No.</th>
   <th>Baranggay</th>
   <th>City</th>
   <th>Province</th>
   <th>Products Ordered</th>
   <th>Total Price</th>
   <th>Date Ordered</th>
   <th>Delete</th>
</thead>
<tbody>
<?php
         
         $orders = mysqli_query($conn, "SELECT * FROM `orders`");
         if(mysqli_num_rows($orders) > 0){
            while($row = mysqli_fetch_assoc($orders)){
      ?>
<tr>
            
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['email_add']; ?></td>
            <td><?php echo $row['payment_method']; ?></td>
            <td><?php echo $row['house_no']; ?></td>
            <td><?php echo $row['baranggay']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['province']; ?></td>
            <td><?php echo $row['ordered_products']; ?></td>
            <td>₱<?php echo $row['total_price']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td>
               <a href="orders.php?order_delete=<?php echo $row['order_id']; ?>" onclick="return confirm('Remove Order from List?')" class="delete-btn"> delete</a>
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
        </div>
</section>
  
 
</body>
</html>