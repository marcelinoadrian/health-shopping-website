<?php

include 'dbconnection.php';
$conn = OpenCon();
session_start();


if (isset($_POST['login']))
{

    $email_add = $_POST['username'];
    $u_pass = $_POST['pword'];
     

    // if(emptyInput($username, $u_pass) !== false)
    // {
    //     header("location: ../HealthShoppingWebsite/MarcelinoAdrian_login.php?error=emptyinput");
    //     exit();
    // }

      $query = "SELECT * FROM `user_account` WHERE email_add = '$email_add' AND u_pass = '$u_pass' ";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if($row['account_type'] === 'admin')
            {
                
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['account_type'] = $row['account_type'];
                header("location: ../admin.php");
            }
            else if($row['account_type'] === 'user')
            {
                
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['account_type'] = $row['account_type'];
                header("location: ../home.php");
            }
            
        }
        else
        {
            header("location: ../MarcelinoAdrian_login.php?error=invalidusernameorpassword");
            exit();
        }

}

function emptyInput($email_add, $u_pass)
{
    $result;
    
    if (empty($email_add) || empty($u_pass))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }

    return $result;   
}


?>