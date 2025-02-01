<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<h3>You must log in first. Redirecting to login page...</h3>";
    header("Refresh:3; url=../login.php");
    exit();
}

// Retrieve the user ID from the session
$Id = $_SESSION['user_id'];

include "../connection.php";

$sql = "SELECT * FROM COMPANY WHERE ID=$Id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $rows = mysqli_fetch_assoc($result);
} else {
    echo "<h3>No company found with the provided ID.</h3>";
}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f4f6f9;
        font-family: Arial, sans-serif;
    }

    label {
        font-weight: bold;
    }

    a {
        font-weight: bold;
    }

    .sidebar {
        height: 100vh;
        background-color: #343a40;
        color: white;
        overflow-y: auto;
    }

    .nav-item {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sidebar h2 {
        font-size: 1.5rem;
        text-align: center;
    }

    .nav-link {
        padding: 10px 20px;
        display: flex;
        align-items: center;
    }

    .nav-link i {
        margin-right: 10px;
    }

    @media (max-width: 768px) {
        .sidebar {
            height: auto;
            position: relative;
            padding-bottom: 10px;
        }

        .main-content {
            padding-left: 0;
        }

        .navbar-toggler {
            display: block;
        }

        .navbar-collapse {
            display: none;
        }

        .navbar-collapse.show {
            display: block;
        }
    }

    @media (max-width: 992px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            padding-left: 0;
        }

        .nav-link {
            padding: 10px 20px;
        }
    }
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar p-3">
            <div class="text-center">
                <i class="fas fa-user-circle fa-5x mb-3"></i>
                <h2><?php echo "{$rows['Company Name']}"; ?></h2>
            </div>
            <hr>
            <ul class="nav flex-column fs-5 fw-light">
                <li class="nav-item">
                    <a class="nav-link text-white text-20" href="#" onclick="loadContent('Dashboard')">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="loadContent('jobpost')">
                        <i class="fas fa-briefcase me-2"></i> Post Job
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="loadContent('email')">
                        <i class="fas fa-search me-2"></i> Application Status
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="loadContent('profile')">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/jobboard/logout.php">
                        <i class="fas fa-sign-out fa-flip-horizontal me-2"></i> Log Out
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="main-content vh-100 overflow-auto">
                <?php include "dashboard.php"; ?>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function loadContent(page) {
        event.preventDefault();
        const mainContent = document.querySelector('.main-content');
        const id = <?php echo $Id; ?>;

        fetch(`${page}.php?id=${id}`)
            .then(response => response.text())
            .then(data => {
                mainContent.innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading content:', error);
            });
    }

    window.addEventListener('load', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page');
        if (page) {
            loadContent(page); 
        }
    });

    function toggleEditMode() {
        const inputs = document.querySelectorAll('input');
        const selects = document.querySelectorAll('select');
        inputs.forEach(input => input.readOnly = !input.readOnly);
        selects.forEach(select => select.disabled = !select.disabled);
        const editButton = document.getElementById('editButton');
        const updateButton = document.getElementById('updateButton');
        if (editButton.style.display === 'none') {
            editButton.style.display = 'block';
            updateButton.style.display = 'none';
        } else {
            editButton.style.display = 'none';
            updateButton.style.display = 'block';
        }
    }

    document.getElementById("profileForm").addEventListener("submit", function () {
        document.querySelectorAll("input, select").forEach(field => {
            field.readOnly = false;
            field.disabled = false;
        });
    });
</script>
</body>
</html>