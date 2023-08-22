<?php

$fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $fees = $_POST["fees"];
    $age = $_POST["age"];
    $package = $_POST["package"];

    $cid = $_POST["cid"];
    echo $cid;
    $imgname = $_FILES['cimg']['name'];
    $tempname = $_FILES['cimg']['tmp_name'];

    move_uploaded_file($tempname , "../clientimg/$imgname");


    include("../dbcon.php");

    $qry = "UPDATE `student` SET `first_name`='$fname',`last_name`='$lname',`fees`='$fees',`age`='$age',`package`='$package',`image`='$imgname' WHERE `id`='$cid'";
    $run = mysqli_query($con,$qry);

    if($run==true)
    {
        ?>
        <script>
            alert("Data updated successfully");
            window.open("editform.php?cid=<?php echo $cid ?>" , "_self");
        </script>
        <?php
    }



    ?>