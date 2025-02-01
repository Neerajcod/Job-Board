<!doctype html>
<html lang="en">
  <head>
    <title>All Register</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <style>
      body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }
      .register-container {
        background-color: #fff;
        border: 2px solid #343a40;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 600px;
      }
      .register-option {
        display: flex;
        justify-content: space-between;
        gap: 20px;
      }
      .option-card {
        flex: 1;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
        font-weight: bold;
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
      }
      .candidate-card {
        background-color: #ffc107;
      }
      .candidate-card:hover {
        background-color: #e0a800;
      }
      .company-card {
        background-color: #dc3545;
      }
      .company-card:hover {
        background-color: #c82333;
      }
      .custom-link {
        text-decoration: none;
        color: white;
        font-size: 16px;
      }
      .custom-link:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="register-container text-center">
      <h1 class="mb-4">Sign Up</h1>
      <div class="register-option">
        <div class="option-card candidate-card">
          <h2>Candidate Register</h2>
          <a href="canreg.php" class="custom-link">
            Register <i class="bi bi-arrow-right-circle blink"></i>
          </a>
        </div>
        <div class="option-card company-card">
          <h2>Company Register</h2>
          <a href="comreg.php" class="custom-link">
            Register <i class="bi bi-arrow-right-circle blink"></i>
          </a>
        </div>
      </div>
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