<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $candidate_id = intval($_GET['id']);
} else {
    echo "<script>
        alert('Invalid Candidate ID. Redirecting...');
        window.location.href = 'main.php';
    </script>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Listings</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .job-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      position: relative;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .job-card img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 20px;
    }
    .job-details {
      flex-grow: 1;
    }
    .job-time {
      color: green;
      font-weight: bold;
    }
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 18px;
      cursor: pointer;
    }
  </style>
</head>
<body style="background-color: #f8f9fa;">

<main class="container mt-5">
  <h1 class="text-center mb-4">Available Job</h1>

  <?php
  include "../connection.php";

  $sql = "SELECT * FROM JOBLIST ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      echo '<div class="container">';
      while ($row = mysqli_fetch_assoc($result)) {
          $imagePath = "company/" . $row['Logo'];
          echo '<div class="job-card">';
          echo '  <div class="job-logo">';
          echo '    <img src="../' . htmlspecialchars($imagePath) . '" alt="Company Logo">';
          
          echo '  </div>';
          echo '  <div class="job-details">';
          echo '    <h5 class="mb-1">' . htmlspecialchars($row['Title']) . '</h5>';
          echo '    <p class="mb-1 text-muted">Company: ' . htmlspecialchars($row['Compname']) . '</p>';
          echo '    <p class="mb-1 text-muted">Email: ' . htmlspecialchars($row['Email']) . '</p>';
          echo '    <p class="mb-1 text-muted">Description: ' . htmlspecialchars($row['Jobdesc']) . '</p>';
          echo '    <p class="mb-1 text-muted">Location: ' . htmlspecialchars($row['Location']) . '</p>';
          echo '    <p class="job-time">Deadline: ' . htmlspecialchars($row['Deadline']) . '</p>';
          echo '    <div class="d-flex justify-content-end">';
          echo '      <a href="application.php?id=' . $row['Id'] .'&candidate_id=' . $candidate_id .  '"><button class="btn btn-primary">Apply Now</button></a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
      }
      echo '</div>';
  } else {
      echo '<p class="text-center text-muted">No job listings found.</p>';
  }

  $conn->close();
  ?>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
