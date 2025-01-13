<?php

include "../connection.php";

$comname=$_POST['comname'];
$email=$_POST['email'];
$busstype=$_POST['busstype'];
$activity=$_POST['activity'];
$address=$_POST['address'];
$owner=$_POST['owner'];
$password=$_POST['password'];

$sql="INSERT INTO COMPANY(`company name`,`email`, `bussiness type`, `bussiness activity`, `address`, `owner`, `password`)VALUES('$comname','$email', '$busstype', '$activity', '$address', '$owner', '$password')";

if(mysqli_query($conn, $sql)){
    header("location:login.html");
}else{
    echo mysqli_error($conn);
}

mysqli_close($conn);



?>