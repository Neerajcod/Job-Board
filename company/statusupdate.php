<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\Exception.php';
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\PHPMailer.php';
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\SMTP.php';

include "../connection.php";  

if (!isset($_GET['id'])) {
    die("Error: Missing 'id' parameter.");
}

$Id = intval($_GET['id']);

$sql = "SELECT * FROM application WHERE id=$Id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching application details: " . mysqli_error($conn));
}

$rows = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

    $updateSql = "UPDATE application SET status='$newStatus' WHERE id=$Id";
    if (mysqli_query($conn, $updateSql)) {
        echo "Status updated successfully!";

        $email = $rows['Email'];
        $full_name = $rows['Full_name'];

        // Send Email Directly Here
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true;
            $mail->Username   = 'jobboard2025@gmail.com';
            $mail->Password   = 'lkwi qqcd qxoy ethr'; // Use App Password for Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('jobboard2025@gmail.com', 'Job Board');
            $mail->addAddress($email, $full_name);
            $mail->addReplyTo('jobboard2025@gmail.com', 'Job Board');

            $mail->isHTML(true);
            $mail->Subject = 'Job Application Status Update';
            $mail->Body    = "
                <p>Dear " . htmlspecialchars($full_name) . ",</p>
                <p>Your job application status has been updated to <strong>" . htmlspecialchars($newStatus) . "</strong>.</p>";

            // Additional Message for Interview Scheduled
            if ($newStatus == 'Interview Scheduled') {
                $mail->Body .= "<p>  
                Dear Candidate,<br>
                Thank you for your application to JobBoard. We are pleased to inform you that your interview has been scheduled for <strong>13/01/2025 at 12:30 PM</strong>. 
                The interview will take place in <strong>Mumbai</strong>. If you have any questions or need to reschedule, please feel free to contact us at <a href='mailto:jobboard2025@gmail.com'>jobboard2025@gmail.com</a>.
                <br><br>
                Best regards,<br> 
                <strong>Job Board Team</strong><br>
                HR Team<br>
                JobBoard</p>";
            }

            $mail->AltBody = 'Your job application status has been updated to ' . htmlspecialchars($newStatus) . '.';

            if ($mail->send()) {
                echo "<script>
                alert('Status updated successfully and email sent to candidate.');
                window.location.href = 'main.php';
              </script>";
        exit();
            } 
            // else {
            //     echo ' Error sending email.';
            // }

        } catch (Exception $e) {
            echo "<script>
                    alert('Status updated successfully but failed to send email: " . addslashes($mail->ErrorInfo) . "');
                    window.location.href = 'statusupdate.php?id=$Id';
                  </script>";
            exit();
        }
        
    } else {
        echo "<script>
        alert('Error updating status: " . addslashes(mysqli_error($conn)) . "');
        window.location.href = 'statusupdate.php?id=$Id';
      </script>";
exit();
    }
}

mysqli_close($conn);
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
                        <form action="statusupdate.php?id=<?php echo"{$rows['id']}"; ?>" method="POST" enctype="multipart/form-data" id="search-form">
                            
                            <div class="form-group mb-4">
                                <label for="full_name" class="form-label fw-semibold text-dark">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required placeholder="Enter your full name" value="<?php echo"{$rows['Full_name']}"?>" readonly>
                            </div>

                           
                            <div class="form-group mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address" value="<?php echo"{$rows['Email']}"?>" readonly>
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
                                <input type="type" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" value="<?php echo"{$rows['Resume']}"?>" readonly>
                                <small class="form-text text-muted">Allowed formats: .pdf, .doc, .docx</small>
                            </div>

                           
                            <div class="form-group mb-4">
                                <label for="cover_letter" class="form-label fw-semibold text-dark">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4" placeholder="Write your cover letter here"></textarea>
                            </div>

                           
                            <div class="form-group mb-4">
                                <label for="linkedin_profile" class="form-label fw-semibold text-dark">LinkedIn Profile (Optional)</label>
                                <input type="text" class="form-control" id="linkedin_profile" name="linkedin_profile" placeholder="Enter your LinkedIn profile URL" value="<?php echo"{$rows['Linkedin']}"?>" readonly>
                            </div>
                            <div class="mb-4">
                            <label for="" class="form-label">Status</label>
                            <select
                                class="form-select form-select-sm"
                                name="status"
                                id="">
                                <option value="Recieved" <?php echo $rows['status'] == 'Recieved' ? 'selected' : ''; ?>>Recieved</option>
                                <option value="Reviewed" <?php echo $rows['status'] == 'Reviewed' ? 'selected' : ''; ?>>Reviewed</option>
                                <option value="Interview Scheduled" <?php echo $rows['status'] == 'Interview Scheduled' ? 'selected' : ''; ?>>Interview Scheduled</option>

                            </select>
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
            <script>
            $(document).ready(function () {
                $('#search-button').click(function () {
                    const formData = $('#search-form').serialize(); 

                    
                    $.ajax({
                        url: 'email.php', 
                        type: 'GET',
                        data: formData,
                        success: function (response) {
                            
                            if (response.trim() === 'No jobs found') {
                                alert('No jobs found matching your search criteria.');
                            } else {
                                
                                $('#results').html(response);
                            }
                        },
                        error: function () {
                            alert('An error occurred while processing your request.');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
