<?php
session_start();

if(isset($_SESSION["uid"]))
{
    header('location:admin/dashboard.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
        <form action="login.php" method="post">
            <div style="text-align: center;">
                <h3>Admin Login</h3>
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>


</body>
</html>


<?php
include("dbcon.php");


if(isset($_POST["submit"]))
{
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo("typed uername is ".$username." and types password is ".$password);

    $sql = "SELECT * from `admin` WHERE `username` = '$username' AND `password` = '$password'";


    $val = mysqli_query($con,$sql);

    //echo($val);

    $rows = mysqli_num_rows($val);

    echo($rows);

    if($rows<1)
    {
        ?>
        <script>
            alert("Wrong Credentials");
        </script>
        <?php

    }
    else{

        $data = mysqli_fetch_assoc($val);

        $id = $data["id"];

        

        header('location:admin/dashboard.php');

        $_SESSION["uid"] = $id;

    }

}



?>