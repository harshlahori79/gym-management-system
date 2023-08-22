<?php

$con = mysqli_connect("localhost","root","","sms");

if(!$con)
{
    die("not connected to the database");
}
else{
    echo("connected successfully");
}

?>