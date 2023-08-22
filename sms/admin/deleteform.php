<?php



    $cid = $_REQUEST["cid"];
    echo $cid;
   



    include("../dbcon.php");

    $qry = "DELETE FROM `student` WHERE `id`='$cid'";
    $run = mysqli_query($con,$qry);

    if($run==true)
    {
        ?>
        <script>
            alert("Data deleted successfully");
            window.open("deleteclient.php" , "_self");
        </script>
        <?php
    }



    ?>