<?php

include "../connection.php";


$searchTitle = $_GET['search_title'] ?? '';
$searchLocation = $_GET['search_location'] ?? '';
$searchType = $_GET['search_type'] ?? '';
$remote = $_GET['remote'] ?? '';
$freelance = $_GET['freelance'] ?? '';

$whereClauses = [];

if (!empty($searchTitle)) {
    $whereClauses[] = "title LIKE '%" . $conn->real_escape_string($searchTitle) . "%'";
}
if (!empty($searchLocation)) {
    $whereClauses[] = "location LIKE '%" . $conn->real_escape_string($searchLocation) . "%'";
}
if (!empty($searchType)) {
    $whereClauses[] = "type = '" . $conn->real_escape_string($searchType) . "'";
}
if (!empty($remote)) {
    $whereClauses[] = "remote = 1";
}
if (!empty($freelance)) {
    $whereClauses[] = "freelance = 1";
}

$whereSql = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';


$sql = "SELECT * FROM joblist  ORDER BY id DESC";
$result = $conn->query($sql);
$jobs = $result->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Search Jobs</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style>
    .job-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      position: relative;
    }
    .job-card img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 15px;
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
    .promoted {
      background-color: #f5f5f5;
    }
  </style>
    </head>

    <body>
        <header>
            <!-- Place navbar here -->
        </header>
        <main>
            <div class="container border border-dark my-5 p-5" style="max-width:700px">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search Jobs</h4>
                    </div>
                    <div class="card-body">
                        <form action="searchinsert.php" method="GET" id="search-form">
                            <div class="form-group">
                                <label for="search_title">Job Title</label>
                                <input type="text" class="form-control" id="search_title" name="search_title" placeholder="Enter job title" value="<?php echo htmlspecialchars($searchTitle); ?>">
                            </div>
                            <div class="form-group">
                                <label for="search_location">Location</label>
                                <input type="text" class="form-control" id="search_location" name="search_location" placeholder="Enter location" value="<?php echo htmlspecialchars($searchLocation); ?>">
                            </div>
                            <div class="form-group">
                                <label for="search_type">Job Type</label>
                                <select class="form-control" id="search_type" name="search_type">
                                    <option value="">All</option>
                                    <option value="Full Time" <?php echo ($searchType === 'Full Time') ? 'selected' : ''; ?>>Full Time</option>
                                    <option value="Part Time" <?php echo ($searchType === 'Part Time') ? 'selected' : ''; ?>>Part Time</option>
                                    <option value="Contract" <?php echo ($searchType === 'Contract') ? 'selected' : ''; ?>>Contract</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Additional Filters</label><br>
                                <div id="additional-filters">
                                    <input type="checkbox" id="remote" name="remote" value="1" <?php echo (!empty($remote)) ? 'checked' : ''; ?>>
                                    <label for="remote">Remote Jobs</label><br>
                                    <input type="checkbox" id="freelance" name="freelance" value="1" <?php echo (!empty($freelance)) ? 'checked' : ''; ?>>
                                    <label for="freelance">Freelance</label><br>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="search-button">Search</button>
                        </form>
                    </div>
                </div>
            </div>

            
            <div class="container my-5">
                <h2 class="text-center">Search Results</h2>
                <?php if (!empty($jobs)): ?>
                    <div class="row g-3">
                        <?php foreach ($jobs as $job): ?>
                            <div class="job-card" style="position: relative; padding: 20px; border: 1px solid #ddd; border-radius: 8px; display: flex; align-items: center; margin-bottom: 20px;">
                <img src="https://via.placeholder.com/50" alt="Company Logo" style="margin-right: 20px;">
                <div class="job-details">
                    <h5 class="mb-1"><?php echo"{$job['Title']}";?></h5>
                    <p class="mb-1 text-muted">Company: <?php echo"{$job['Compname']}"; ?></p>
                    <p class="mb-1 text-muted">Description:<?php echo"{$job['Jobdesc']}"; ?></p>
                    <p class="mb-1 text-muted">Location:<?php echo"{$job['Location']}"; ?></p>
                    <p class="job-time">Deadline:<?php echo"{$job['Deadline']}"; ?></p>
                    <div class="d-flex justify-content-end">
                        <a href="application.php?task_id='$rows['Id']'"><button class="btn btn-primary">Apply Job</button></a>
                    </div>
                </div>
                <span class="close-btn" onclick="return confirm('Are you sure you want to delete this task?')">&times;</span>
            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div id="results"></div>
                <?php endif; ?>
            </div>
        </main>
        <footer>
            <!-- Place footer here -->
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#search-button').click(function () {
                    const formData = $('#search-form').serialize(); 

                    
                    $.ajax({
                        url: 'search.php',
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