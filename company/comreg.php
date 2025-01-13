<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5 border border-2 border-dark rounded-3 p-3">
    <h2 class="text-center mb-4">Company Registration Form</h2><hr>
    <form action="insert.php" method="post">
      <!-- Company Name -->
      <div class="mb-3">
        <label for="companyName" class="form-label">Company Name</label>
        <input type="text" class="form-control" id="companyName" name="comname" placeholder="Enter company name" required>
      </div>
      <div class="mb-3">
        <label for="companyEmail" class="form-label">Company Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email" required>
      </div>
      <!-- Type of Business -->
      <div class="mb-3">
        <label for="businessType" class="form-label">Type of Business</label>
        <select class="form-select" id="businessType" name="busstype" required>
          <option value="" disabled selected>Select business type</option>
          <option value="soleProprietorship">Sole Proprietorship</option>
          <option value="partnership">Partnership</option>
          <option value="privateLimited">Private Limited</option>
          <option value="others">Others</option>
        </select>
      </div>
      <!-- Business Activity -->
      <div class="mb-3">
        <label for="businessActivity" class="form-label">Business Activity</label>
        <textarea class="form-control" id="businessActivity" rows="3" name="activity" placeholder="Describe your business activity" required></textarea>
      </div>
      <!-- Registered Address -->
      <div class="mb-3">
        <label for="registeredAddress" class="form-label">Registered Address</label>
        <textarea class="form-control" id="registeredAddress" rows="2" name="address" placeholder="Enter registered address" required></textarea>
      </div>
      <!-- Owner Name -->
      <div class="mb-3">
        <label for="ownerName" class="form-label">Owner Name</label>
        <input type="text" class="form-control" id="ownerName" name="owner" placeholder="Enter owner name" required>
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>
      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary w-25">Register</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
