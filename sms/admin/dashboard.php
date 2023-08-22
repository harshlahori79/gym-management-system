<?php
session_start();

if(isset($_SESSION["uid"]))
{
    // echo("welcome to admin dashboard");

    // echo("User id :".$_SESSION["uid"]);
    echo "";
}
else{
    header('location:../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/mystylesheet.css">
</head>
<body>

    <div class = "dashhead">
        <h1>Welcome to Admin Dashboard</h1>
    </div>

    <div class="container">
        <div class = "admincontrol">
            <a href="insertclient.php">New Client</a>
        </div>
        <div class = "admincontrol">
            <a href="updateclient.php">Update Client</a>
        </div>
        <div class = "admincontrol">
            <a href="deleteclient.php">Delete Client</a>
        </div>

    </div>

    <div class = "admincontrol" style="background-color:green">
        <a href="../logout.php" style="color:Yellow">Logout</a>
    </div>
    
</body>
</html>