<?php
session_start();

include "../connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM `CANDIDATE` WHERE `Email` = '$email' AND `Password` = '$password'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
    $rows=mysqli_fetch_assoc($result);
    $candid=$rows['Id'];
    header("location:main.php?id=$candid");
} else {
    echo "Invalid credentials <a href='login.html'>Try Again</a>";
}



mysqli_close($conn);
?>
?>