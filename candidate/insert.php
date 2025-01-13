<?php

include "../connection.php";

$name=$_POST['name'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$education=$_POST['education'];
$marks=$_POST['marks'];
$workexp=$_POST['workexp'];
$skill=$_POST['skill'];
$linkedin=$_POST['linkedin'];
$portfolio=$_POST['portfolio'];
$password=$_POST['password'];

$sql="INSERT INTO CANDIDATE(`name`, `dob`, `email`, `phone no`, `address`, `education`, `marks`, `experience`, `skills`, `linkedin`, `portfolio`, `password`)VALUES('$name', '$dob', '$email', '$phone', '$address', '$education', '$marks', '$workexp', '$skill', '$linkedin', '$portfolio', '$password')";

if(mysqli_query($conn, $sql)){
    header("location:login.html");
}else{
    echo mysqli_error($conn);
}

mysqli_close($conn);



?>