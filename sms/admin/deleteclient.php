<?php

session_start();

if(isset($_SESSION["uid"]))
{
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

    <div class="tablesearch">

    <table align="center">
    <form action="deleteclient.php" method = "POST">
        <tr>
        <th>Enter Name</th>
        <td><input type="text" name="naam"></td>
        <td><input type="submit" name="submit" value="search"></td>

    </form>
    </table>

    <div style="height:90px">
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


    
    
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $_SESSION['noresult'] = false;
        $naam = $_POST['naam'];
        //echo $naam;

        include("../dbcon.php");

        $qry = "SELECT * FROM `student` WHERE first_name LIKE '%$naam%' or last_name LIKE '%$naam%'";
        
        

        $run = mysqli_query($con,$qry);

              $count = 1;
            while ($data = mysqli_fetch_assoc($run)) {
                ?>
                <table align="center">
                <tr>
                 <td> <?php echo $count ?>  </td>
                 <td><img src="../clientimg/<?php echo $data['image']?>" alt="Image"></td>;
                 <td> <?php echo $data['first_name'] ?> </td>
                 <td>  <?php echo $data['last_name'] ?> </td>
                 <td> <?php echo $data['fees'] ?> </td>
                 <td> <?php echo $data['age'] ?> </td>
                 <td> <?php echo $data['package'] ?></td>
                 <td> <a href="deleteform.php?cid=<?php echo $data['id'] ?>" >Delete</a>
                 </tr>;

                </table>
                 <?php
                $count++;
            }

        if(mysqli_num_rows($run)<1)
        {
            
            if(mysqli_num_rows($run) < 1) {
                echo "<tr><td colspan='7'>No result found</td></tr>";
            }
            
        }
        
        
          
        

    }


?>