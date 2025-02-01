 <?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\Exception.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\PHPMailer.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\SMTP.php';

// if (isset($_GET['id']) && isset($_POST['status'])) {
//     include "../connection.php";
    
//     $Id = intval($_GET['id']);
//     $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

//     $sql = "SELECT * FROM application WHERE id=$Id";
//     $result = mysqli_query($conn, $sql);

//     if ($result) {
//         $candidate = mysqli_fetch_assoc($result);

//         if ($candidate) {
//             $updateSql = "UPDATE application SET status='$newStatus' WHERE id=$Id";
//             if (mysqli_query($conn, $updateSql)) {
//                 echo "Status updated successfully!";
//             } else {
//                 echo "Error updating status: " . mysqli_error($conn);
//             }

//             try {
//                 $mail = new PHPMailer(true);
//                 $mail->isSMTP();
//                 $mail->Host       = 'smtp.gmail.com'; 
//                 $mail->SMTPAuth   = true;
//                 $mail->Username   = 'jobboard2025@gmail.com';
//                 $mail->Password   = 'lkwi qqcd qxoy ethr';
//                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//                 $mail->Port       = 587;

//                 $mail->setFrom('jobboard2025@gmail.com', 'Job Board');
//                 $mail->addAddress($candidate['Email'], $candidate['Full_name']);
//                 $mail->addReplyTo('jobboard2025@gmail.com', 'Job Board');

//                 $mail->isHTML(true);
//                 $mail->Subject = 'Job Application Status Update';
//                 $mail->Body    = "
//                     <p>Dear " . htmlspecialchars($candidate['Full_name']) . ",</p>
//                     <p>Your job application status has been updated to <strong>" . htmlspecialchars($newStatus) . "</strong>.</p>";

//                 if ($newStatus == 'Interview Scheduled') {
//                     $mail->Body .= "<p>  

//                     Dear Candidate,
//                     <br>
//                     Thank you for your application to JobBoard. We are pleased to inform you that your interview has been scheduled for [13/01/2025] at [12:30 PM]. The interview will take place [Mumbai]. If you have any questions or need to reschedule, please feel free to contact us at [jobboard2025@gmail.com]. 
//                     We look forward to discussing how your skills and experiences align with the opportunities at Job Board.  
//                     <br>
//                     <br>
//                     Best regards,<br> 
//                     [Job Board Team]<br>
//                     HR Team<br>
//                     JobBoard</p>";
//                 }

//                 $mail->AltBody = 'Your job application status has been updated to ' . htmlspecialchars($newStatus) . '.';

//                 $mail->send();
//                 echo 'Email sent successfully.';
//             } catch (Exception $e) {
//                 echo "Error sending email: {$mail->ErrorInfo}";
//             }
            
//         } else {
//             echo "Candidate not found.";
//         }
//     } else {
//         echo "Error fetching candidate data: " . mysqli_error($conn);
//     }

//     mysqli_close($conn);
// } else {
//     echo "Error: Missing 'id' or 'status' parameter.";
// }
?>
