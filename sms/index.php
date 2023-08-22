<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <link rel="stylesheet" href="css/mystylesheet.css">
</head>
<body>
    <div class="welcome">
    <h1>Welcome to hard Guys gym</h1>
    </div>
    <div class="badadiv">
        <div class="clientdata">
            <form action="index.php" method="POST">
                <h3>Client Data</h3>
                <label>Enter client id</label>
                <input type="text" name="clientid"/>
                <input type="submit" name="submit">
            </form>
        </div>

        <div class="adminlogindiv">
            <a href="login.php"><h1>Admin Login</h1></a>
        </div>

    </div>
   
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    include("dbcon.php");
    $cid = $_POST['clientid'];

    $qry = "SELECT * FROM `student` WHERE `id`='$cid'";

    $run=mysqli_query($con , $qry);

    if(mysqli_num_rows($run)>0)
    {
        $data = mysqli_fetch_assoc($run);

        ?>

        </div>


    <table align="center">
    <tr>
    <th>Sno.</th>
    <th>Image</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Fees</th>
    <th>Age</th>
    <th>Package</th>
    <th>Edit</th>
    </tr>
    </table>
    </div>
    <div>
    <table align="center">
                <tr>
                
                 <td><img src="clientimg/<?php echo $data['image']?>" alt="Image"></td>;
                 <td> <?php echo $data['first_name'] ?> </td>
                 <td>  <?php echo $data['last_name'] ?> </td>
                 <td> <?php echo $data['fees'] ?> </td>
                 <td> <?php echo $data['age'] ?> </td>
                 <td> <?php echo $data['package'] ?></td>
                 </tr>;

                </table>
    </div>

    <?php
    }
    else{
        ?>
        <script>
            alert("NO data Found");
        </script>
        <?php
    }
}




?>