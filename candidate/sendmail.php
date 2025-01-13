<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\Exception.php';
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\PHPMailer.php';
require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\SMTP.php';

if (isset($_GET['id']) && isset($_POST['status'])) {
    include "../connection.php";
    
    $Id = intval($_GET['id']);
    $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "SELECT * FROM application WHERE id=$Id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $candidate = mysqli_fetch_assoc($result);

        if ($candidate) {
            $updateSql = "UPDATE application SET status='$newStatus' WHERE id=$Id";
            if (mysqli_query($conn, $updateSql)) {
                echo "Status updated successfully!";
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }

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
                // Add this logic in ca_sendmail.php after successful application
$mail->addAddress('jobboard2025@gmail.com', 'Job Board');  // Send email to the company
$mail->isHTML(true);
$mail->Subject = 'New Job Application';
$mail->Body    = "
    <p>Dear Hiring Manager,</p>
    <p>A new job application has been submitted by:</p>
    <p><strong>Name:</strong> " . htmlspecialchars($candidate['full_name']) . "</p>
    <p><strong>Email:</strong> " . htmlspecialchars($candidate['email']) . "</p>
    <p><strong>Job Applied:</strong> " . htmlspecialchars($candidate['job_id']) . "</p>
    <p><strong>Cover Letter:</strong> " . nl2br(htmlspecialchars($candidate['cover_letter'])) . "</p>
    <p><strong>LinkedIn Profile:</strong> " . htmlspecialchars($candidate['linkedin_profile']) . "</p>
    <p><strong>Resume:</strong> <a href='" . htmlspecialchars($candidate['resume_url']) . "'>Download</a></p>
";


                $mail->AltBody = 'Your job application status has been updated to ' . htmlspecialchars($newStatus) . '.';

                $mail->send();
                echo 'Email sent successfully.';
            } catch (Exception $e) {
                echo "Error sending email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Candidate not found.";
        }
    } else {
        echo "Error fetching candidate data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Error: Missing 'id' or 'status' parameter.";
}
?>
