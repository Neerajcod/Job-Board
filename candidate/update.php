<?php

 
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $marks = $_POST['marks'];
    $Experience = isset($_POST['Experience']) ? $_POST['Experience'] : '';
    $skills = $_POST['skills'];
    $linkedin = $_POST['linkedin'];
    $portfolio = $_POST['portfolio'];

    
    $sql = "UPDATE CANDIDATE SET 
            `Name`='$name', 
            `DOB`='$dob', 
            `Email`='$email', 
            `Phone No`='$phone', 
            `Address`='$address', 
            `Education`='$education', 
            `Marks`='$marks', 
            `Experience`='$Experience', 
            `Skills`='$skills', 
            `Linkedin`='$linkedin', 
            `Portfolio`='$portfolio' 
            WHERE ID='$id'";

    if (mysqli_query($conn, $sql)) {
        // header("location:main.php");
        echo 'Profile updated successfully!';
    } else {
        echo 'Error updating profile: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>



?>