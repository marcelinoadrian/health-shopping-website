<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Records</title>
    
    <style>
        table{
            width: 70%;
            margin: 0 auto;
        }
        table, tr, th, td{
            border: 1px solid rgba(0,0,0,0.5);
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;

        }
        tr:nth-child(even){
           background: green;

          
        }
        .grText
        {
            text-align: center;
            margin: 50px;
        }
        .add
        {
            position: relative;
            left: calc(80%);
            text-decoration: none;
            background: #6DD9FF;
            padding: 10px;
            display: inline-block;
            margin-top: 10px;
            color: white;
        }
    </style>
    
</head>
<body>
<?php
    include 'admin_header.php';
?>
     <div class="records">
        
        <h2 class="grText">User Records</h2>
   <?php
   
   include 'dbconnection.php';
    $conn = OpenCon();

	
    
    $sql_query = "SELECT user_id, username, u_pass, email_add, full_name, contact_no FROM user_account";
    
    $result = mysqli_query($conn, $sql_query);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> 
	   <tr> 
	   <th> User ID</th>
	   <th> Username</th> 
	   <th> Password</th> 
	   <th> Email</th> 
	   <th> Full Name</th>
       <th> Contact No.</th>  
	   </tr>';
     
	 while($row = mysqli_fetch_assoc($result)){
        
           echo '<tr > 	
						<td>' . $row["user_id"] . '</td>
						<td>' . $row["username"] . '</td>
						<td>' . $row["u_pass"] . '</td>
						<td> ' . $row["email_add"] . '</td>
						<td>' . $row["full_name"] . '</td> 
                        <td>' . $row["contact_no"] . '</td> </tr>';
       }
       echo '</table>';
    }
    else
    {
        echo "0 results";
    }
  
    mysqli_close($conn);
    
?>
<a class="add" href="MarcelinoAdrian_registration.php">Add</a>
     </div>   
    
</body>
</html>