<?php

include "../connection.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\Exception.php';
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\PHPMailer.php';
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $job_id = intval($_POST['job_id']);
    $cover_letter = mysqli_real_escape_string($conn, $_POST['cover_letter']);
    $linkedin_profile = mysqli_real_escape_string($conn, $_POST['linkedin']);
    
    
    $resume = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_path = 'uploads/' . $resume;
    move_uploaded_file($resume_tmp, $resume_path);

    
    $sql = "INSERT INTO application (full_name, email, job_id, resume, cover_letter, linkedin) 
            VALUES ('$full_name', '$email', '$job_id', '$resume_path', '$cover_letter', '$linkedin_profile')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Application submitted successfully!";

        
        $stmt = $conn->prepare("SELECT email FROM joblist WHERE id = ?");
        $stmt->bind_param("i", $job_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $job = $result->fetch_assoc();

        if ($job && !empty($job['email'])) {
            $companyEmail = $job['email'];

            
            $emailSent = sendApplicationToCompany($full_name, $email, $job_id, $resume_path, $cover_letter, $linkedin_profile, $companyEmail);
            if ($emailSent) {
                echo "Email has been sent to the company.";
                
                exit();
            } else {
                echo "There was an error sending the email.";
            }
        } else {
            echo "No company email found for the selected job.";
        }
    } else {
        echo "Error submitting application: " . mysqli_error($conn);
    }
    
    
    mysqli_close($conn);
} else {
    echo "Error: Form not submitted correctly.";
}


function sendApplicationToCompany($full_name, $email, $job_id, $resume_path, $cover_letter, $linkedin_profile, $companyEmail) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jobboard2025@gmail.com';  
        $mail->Password   = 'lkwi qqcd qxoy ethr';      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('jobboard2025@gmail.com', 'Job Board');
        $mail->addAddress($companyEmail);
        $mail->isHTML(true);
        $mail->Subject = 'New Job Application';
        $mail->Body    = "
            <p>Dear Hiring Manager,</p>
            <p>A new job application has been submitted by:</p>
            <p><strong>Name:</strong> " . htmlspecialchars($full_name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Job Applied:</strong> " . htmlspecialchars($job_id) . "</p>
            <p><strong>Cover Letter:</strong> " . nl2br(htmlspecialchars($cover_letter)) . "</p>
            <p><strong>LinkedIn Profile:</strong> " . htmlspecialchars($linkedin_profile) . "</p>
            <p><strong>Resume:</strong> <a href='" . htmlspecialchars($resume_path) . "'>Download</a></p>
        ";

        return $mail->send();
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
        return false;
    }
}
?>



<!doctype html>
<html lang="en">
    <head>
        <title>Job Application</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.3.2 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            body {
                background-color: #f4f6f9;
                font-family: Arial, sans-serif;
            }
            .card {
                background: white;
                border-radius: 10px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            }
            .card-header {
                background: #000;
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                text-align: center;
                padding: 15px;
            }
            .form-control {
                border-radius: 5px;
            }
            .btn-dark {
                background-color: #007bff;
                border-radius: 5px;
                padding: 10px 20px;
                border: none;
            }
            .btn-dark:hover {
                background-color: #0056b3;
            }
            .form-text {
                font-size: 0.9rem;
            }
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container my-5 p-5" style="max-width: 700px;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Job Application</h3>
                    </div>
                    <div class="card-body">
                        <form action="application.php" method="POST" enctype="multipart/form-data" id="job-application-form">
                           
                            <div class="form-group mb-4">
                                <label for="full_name" class="form-label fw-semibold text-dark">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required placeholder="Enter your full name">
                            </div>

                           
                            <div class="form-group mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                            </div>

                            
                            <div class="form-group mb-4">
                                <label for="job_id" class="form-label fw-semibold text-dark">Select Job</label>
                                <select class="form-control" id="job_id" name="job_id" required>
                                    <?php
                                    
                                    $conn = new mysqli('localhost', 'root', '', 'jobboard');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $result = $conn->query("SELECT Id, Title FROM joblist");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['Id'] . "'>" . $row['Title'] . "</option>";
                                    }
                                    $conn->close();
                                    ?>
                                </select>
                            </div>

                           
                            <div class="form-group mb-4">
                                <label for="resume" class="form-label fw-semibold text-dark">Resume (Max: 5MB)</label>
                                <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                                <small class="form-text text-muted">Allowed formats: .pdf, .doc, .docx</small>
                            </div>

                           
                            <div class="form-group mb-4">
                                <label for="cover_letter" class="form-label fw-semibold text-dark">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4" placeholder="Write your cover letter here"></textarea>
                            </div>

                            
                            <div class="form-group mb-4">
                                <label for="linkedin_profile" class="form-label fw-semibold text-dark">LinkedIn Profile (Optional)</label>
                                <input type="url" class="form-control" id="linkedin_profile" name="linkedin" placeholder="Enter your LinkedIn profile URL">
                            </div>

                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <!-- place footer here -->
        </footer>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
