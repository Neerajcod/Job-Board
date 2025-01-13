<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'jobboard');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $cover_letter = $_POST['cover_letter'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';
    $job_id = $_POST['job_id']; // Get the job_id from the form
// echo print_r($Job_id);
    // Validate inputs
    if (empty($job_id) || empty($full_name) || empty($email)) {
        die("Error: Please fill in all required fields, including job selection.");
    }

    // Handle the resume upload
    $resume = $_FILES['resume'];
    $target_dir = "uploads/resumes/";
    $target_file = $target_dir . basename($resume["name"]);
    if (!move_uploaded_file($resume["tmp_name"], $target_file)) {
        die("Error: Failed to upload resume.");
    }

    // Insert the data into the database
    $sql = "INSERT INTO application (`job_id`,`Full_name`, `Email`, `Cover_letter`, `Linkedin`, `Resume`) 
            VALUES ('$job_id','$full_name', '$email', '$cover_letter', '$linkedin', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        Application Submitted Successfully
        </script>";
        // header("location:main.php?id={$row}");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>