<?php
session_start(); // Start the session

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "jobboard";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    
    // Check in the candidate table
    $candidate_query = "SELECT id FROM candidate WHERE email='$email' AND password='$password'";
    $candidate_result = $conn->query($candidate_query);

    if ($candidate_result && $candidate_result->num_rows > 0) {
        $candidate = $candidate_result->fetch_assoc();
        $candid = $candidate['id'];

        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $candid;
        $_SESSION['user_type'] = 'candidate'; // Optional: to distinguish user type
        
        // Redirect to candidate main page
        header("Location: candidate/main.php");
        exit();
    }

    // Check in the company table
    $company_query = "SELECT id FROM company WHERE email='$email' AND password='$password'";
    $company_result = $conn->query($company_query);

    if ($company_result && $company_result->num_rows > 0) {
        $company = $company_result->fetch_assoc();
        $compid = $company['id'];

        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $compid;
        $_SESSION['user_type'] = 'company'; // Optional: to distinguish user type
        
        // Redirect to company main page
        header("Location: company/main.php");
        exit();
    }

    // If no match found
    // echo "Invalid email or password. <a href='login.html'>Try Again</a>";
    echo'<script>
        alert("Invalid email or password")
    </script>';
}
?>






<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style>
      body {
        background-color: #f8f9fa;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .login-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        border: 2px solid #343a40;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      }
      .login-header {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        color: #343a40;
        margin-bottom: 20px;
      }
      .login-form button {
        background-color: #343a40;
        border: none;
      }
      .login-form button:hover {
        background-color: #495057;
      }
      .signup-link a {
        text-decoration: none;
        color: #007bff;
      }
      .signup-link a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <h1 class="login-header">Login Here</h1>
      <hr />
      <form class="login-form" action="" method="post">
        <div class="mb-4">
          <label for="email" class="form-label"><b>Email</b></label>
          <input
            type="email"
            class="form-control"
            name="email"
            id="email"
            placeholder="abc@mail.com"
            required
          />
        </div>
        <div class="mb-4">
          <label for="password" class="form-label"><b>Password</b></label>
          <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            placeholder="Enter Password"
            required
          />
        </div>
        <div class="mb-4 text-center">
          <button type="submit" class="btn btn-dark w-100 py-2">Login</button>
        </div>
        <div class="signup-link text-center">
          <span>Don't have an account? </span>
          <a href="allreg.php">Sign Up</a>
        </div>
      </form>
    </div>

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

