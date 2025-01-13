<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'jobboard');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $job_description = $_POST['job_description'];
    $job_type = $_POST['job_type'];
    $location = $_POST['location'];
    $salary_range = $_POST['salary_range'];
    $application_deadline = $_POST['application_deadline'];

    $logo = $_FILES['company_logo'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($logo["name"]);
    move_uploaded_file($logo["tmp_name"], $target_file);

    $sql = "INSERT INTO JOBLIST (`Title`, `Compname`,`Email`, `Jobdesc`, `Jobtype`, `Location`, `Salary`, `Deadline`, `Logo`) 
            VALUES ('$job_title', '$company_name','$email', '$job_description', '$job_type', '$location', '$salary_range', '$application_deadline', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New job Posted Successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>