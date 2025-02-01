<?php

 
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $comname = $_POST['comname'];
    $email = $_POST['email'];
    $busstype = $_POST['busstype'];
    $address = $_POST['address'];
    $activity = $_POST['activity'];
    $owner = $_POST['owner'];
    $password = $_POST['password'];
    

    
    $sql = "UPDATE COMPANY SET 
            `Company Name`='$comname', 
            `Email`='$email', 
            `Bussiness Type`='$busstype', 
            `Bussiness Activity`='$activity', 
            `Address`='$address', 
            `Owner`='$owner', 
            `Password`='$password'
            WHERE ID='$id'";

    if (mysqli_query($conn, $sql)) {
        
        // echo 'Profile updated successfully!';
        echo"<script>
            alert('Profile updated successfully!');
            window.location.href='main.php';
        </script>";
    } else {
        echo 'Error updating profile: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>