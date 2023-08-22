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

    <div class = "inu">
       
   
 <form action="insertclient.php" method="Post" enctype="multipart/form-data">
            
        <h3>First Name</h3>
        <input type="text" name="fname" required/>

        <h3>Last Name</h3>
        <input type="text" name="lname" required/>

        <h3>Fees</h3>
        <input type="text" name="fees" required/>

        <h3>Age</h3>
        <input type="number" name="age" required/>
        

        <h3>Package</h3>
        <input type="text" name="package" required/>
        

        <h3>Image</h3>
        <input type="file" name="cimg"/>

        <input type="submit" name='submit'/>
        

        
        
    </div>
    
</body>
</html>


<?php

if(isset($_POST['submit']))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $fees = $_POST["fees"];
    $age = $_POST["age"];
    $package = $_POST["package"];


    $imgname = $_FILES['cimg']['name'];
    $tempname = $_FILES['cimg']['tmp_name'];

    move_uploaded_file($tempname , "../clientimg/$imgname");


    include("../dbcon.php");

    $qry = "INSERT INTO `student`(`first_name`, `last_name`, `fees`, `age`, `package`,`image`) VALUES ('$fname','$lname','$fees','$age','$package','$imgname')";
    $run = mysqli_query($con,$qry);

    if($run==true)
    {
        ?>
        

        <script>
            alert("data inserted successfully");
        </script>
        
        <?php
        header("Location: insertclient.php");
        exit;
    }
    else{
        echo "something went wrong";
    }
}

?>


