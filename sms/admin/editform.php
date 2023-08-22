
<?php

include("../dbcon.php");

$cid = $_GET['cid'];

echo $cid;

$qry = "SELECT `id`, `first_name`, `last_name`, `fees`, `age`, `package`, `image` FROM `student` WHERE id='$cid'";

$run = mysqli_query($con , $qry);

$data = mysqli_fetch_assoc($run);


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
       
   
 <form action="updatedata.php" method="Post" enctype="multipart/form-data">
            
        <h3>First Name</h3>
        <input type="text" name="fname" value="<?php echo $data['first_name'] ?>" required/>

        <h3>Last Name</h3>
        <input type="text" name="lname" value="<?php echo $data['last_name'] ?>" required/>

        <h3>Fees</h3>
        <input type="text" name="fees" value="<?php echo $data['fees'] ?>" required/>

        <h3>Age</h3>
        <input type="number" name="age" value="<?php echo $data['age'] ?>" required/>
        

        <h3>Package</h3>
        <input type="text" name="package" value="<?php echo $data['package'] ?>" required/>
        

        <h3>Image</h3>
        <input type="file" name="cimg" required/>
        <input type="hidden" name="cid" value="<?php echo $cid ?>" />

        <input type="submit" name='submit'/>
        

        
        
    </div>
    
</body>
</html>