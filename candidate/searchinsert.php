<?php

$search_title = $_GET['search_title'] ?? '';
$search_location = $_GET['search_location'] ?? '';
$search_type = $_GET['search_type'] ?? '';

$conn = new mysqli('localhost', 'root', '', 'jobboard');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM joblist WHERE Title LIKE '%$search_title%' AND Location LIKE '%$search_location%' AND Jobtype LIKE '%$search_type%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display results
    while ($row = $result->fetch_assoc()) {
        echo "<div><h3>" . $row['Title'] . "</h3><p>" . $row['Compname'] . "</p><p>" . $row['Location'] . "</p></div>";
    }
} else {
    // Show alert message if no jobs are found
    echo "<script>alert('No jobs found matching your search criteria.'); window.history.back();</script>";
}

$conn->close();
?>