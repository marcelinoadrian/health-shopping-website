
<?php
include 'dbconnection.php';
$conn = OpenCon();

function invalidEmail($email_add)
    {
        $result;
        if(!filter_var($email_add, FILTER_VALIDATE_EMAIL))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }

        return $result;
    }




if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email_add = $_POST['email_add'];
    $u_pass = $_POST['u_pass'];
    $c_pass = $_POST['c_pass'];
    $full_name = $_POST['full_name'];
    $contact_no = $_POST['contact_no'];


    if (invalidEmail($email_add) !== false)
    {
            header("location: ../MarcelinoAdrian_registration.php?error=invalidemail");
            exit();
    }
    
     $query = mysqli_query($conn, "SELECT * FROM `user_account` WHERE username = '$username' OR email_add = '$email_add' ");

       if(mysqli_num_rows($query) > 0)
        {
         header("location: ../MarcelinoAdrian_registration.php?error=userExists");
        exit();
        }
        else if($u_pass != $c_pass){
            header("location: ../MarcelinoAdrian_registration.php?error=passwordnotmatched");
            exit();
        }
      
      else
      {
          $sql_query = "INSERT INTO user_account (`username`, `email_add`, `u_pass`, `full_name`, `contact_no`, `account_type`) VALUES ('$username', '$email_add', '$u_pass', '$full_name', '$contact_no', 'user')"; 
          header("location: ../home.php");
      }

   
    if(mysqli_query($conn, $sql_query))
    {
        header("location: ../home.php");
    }
    else
    {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    mysqli_close($conn);
    }
else
{
    header("location: ../MarcelinoAdrian_registration.php");
}
?>

