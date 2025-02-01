<?php
include "../connection.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $candidate_id = intval($_GET['id']);
} else {
    echo "<script>
        alert('Invalid Candidate ID. Redirecting...');
        window.location.href = 'main.php';
    </script>";
    exit();
}

$search_title = $_GET['search_title'] ?? '';
$search_email = $_GET['search_email'] ?? '';
$search_location = $_GET['search_location'] ?? '';
$search_type = $_GET['search_type'] ?? '';
$remote = isset($_GET['remote']) ? 1 : 0;
$freelance = isset($_GET['freelance']) ? 1 : 0;

$Id = $_GET['id'] ?? 0;

// if (!$Id || !is_numeric($Id)) {
//     echo "<h3>Invalid or missing candidate ID.</h3>";
//     exit();
// }

$sql = "SELECT * FROM joblist WHERE 
        Title LIKE '%$search_title%'
        AND Email LIKE '%$search_email%' 
        AND Location LIKE '%$search_location%' 
        AND jobtype LIKE '%$search_type%'";

if ($remote) {
    $sql .= " AND is_remote = 1";
}

if ($freelance) {
    $sql .= " AND is_freelance = 1";
}

$result = $conn->query($sql);

if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
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
        echo '</div>';








        }
    } else {
        echo "<p class='text-warning'>No results found for your search.</p>";
    }
    exit();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Search Job</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>

    body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .search-container {
            max-width: 75%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group i {
            position: absolute;
            margin-top: 12px;
            margin-left: 10px;
            color: #6c757d;
        }
        .form-control {
            padding-left: 35px;
        }
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

    <body>
        <main>

<div class="container">
        <div class="search-container">
            <h4 class="text-center mb-4">Find Your Dream Job</h4>
            <form id="search-form">
            <input type="hidden" name="id" value="<?php echo $Id; ?>">
                <div class="form-group position-relative mb-3">
                    <i class="fas fa-briefcase"></i>
                    <input type="text" class="form-control" id="search_title" name="search_title" placeholder="Job Title">
                </div>
                <div class="form-group position-relative mb-3">
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" class="form-control" id="search_location" name="search_location" placeholder="Location">
                </div>
                <div class="form-group mb-3">
                    <label for="search_type">Job Type</label>
                    <select class="form-control" id="search_type" name="search_type">
                        <option value="">All</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </form>
        </div>
        <div id="search-results" class="mt-4"></div>
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