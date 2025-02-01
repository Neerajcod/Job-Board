<?php

include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determine form type
    $form_type = $_POST['form_type'];

    if ($form_type === 'candidate') {
        // Candidate form submission
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $education = $_POST['education'];
        $marks = $_POST['marks'];
        $workexp = $_POST['workexp'];
        $skill = $_POST['skills'];
        $linkedin = $_POST['linkedin'];
        $portfolio = $_POST['portfolio'];
        $password = $_POST['password'];

        $sql = "INSERT INTO CANDIDATE(`name`, `dob`, `email`, `phone no`, `address`, `education`, `marks`, `experience`, `skills`, `linkedin`, `portfolio`, `password`)
                VALUES('$name', '$dob', '$email', '$phone', '$address', '$education', '$marks', '$workexp', '$skill', '$linkedin', '$portfolio', '$password')";

        if (mysqli_query($conn, $sql)) {
            header("location:login.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } elseif ($form_type === 'company') {
        // Company form submission
        $comname = $_POST['comname'];
        $email = $_POST['email'];
        $busstype = $_POST['busstype'];
        $activity = $_POST['activity'];
        $address = $_POST['address'];
        $owner = $_POST['owner'];
        $password = $_POST['password'];

        $sql = "INSERT INTO COMPANY(`company name`, `email`, `bussiness type`, `bussiness activity`, `address`, `owner`, `password`)
                VALUES('$comname', '$email', '$busstype', '$activity', '$address', '$owner', '$password')";

        if (mysqli_query($conn, $sql)) {
            header("location:login.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid form submission.";
    }
}

mysqli_close($conn);

?>
