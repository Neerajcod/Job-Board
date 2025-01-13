


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5 p-5" style="max-width: 700px;">
  <div class="card shadow-lg">
    <div class="card-header bg-dark text-white text-center rounded-top">
      <h2 class="mb-0">Company Registration Form</h2>
    </div>
    <div class="card-body p-4">
      <form action="insert.php" method="post" id="profileForm" onsubmit="submitForm(event)">
      
      <div class="mb-4">
          <label for="ownerName" class="form-label text-dark fw-semibold">Owner Name</label>
          <input type="text" class="form-control" id="ownerName" name="owner" placeholder="Enter owner name"required>
        </div>  
      
        <div class="mb-4">
          <label for="companyName" class="form-label text-dark fw-semibold">Company Name</label>
          <input type="text" class="form-control" id="companyName" name="comname" placeholder="Enter company name" required>
        </div>
        
        <div class="mb-4">
          <label for="companyEmail" class="form-label text-dark fw-semibold">Company Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email" required>
        </div>
        
        <div class="mb-4">
          <label for="businessType" class="form-label text-dark fw-semibold">Type of Business</label>
          <select class="form-select" id="businessType" name="busstype" required>
            <option value="" disabled selected>Select business type</option>
            <option value="soleProprietorship">Sole Proprietorship</option>
            <option value="partnership">Partnership</option>
            <option value="privateLimited">Private Limited</option>
            <option value="others">Others</option>
          </select>
        </div>
        
        <div class="mb-4">
          <label for="businessActivity" class="form-label text-dark fw-semibold">Business Activity</label>
          <textarea class="form-control" id="businessActivity" rows="3" name="activity" placeholder="Describe your business activity" required></textarea>
        </div>
        
        <div class="mb-4">
          <label for="registeredAddress" class="form-label text-dark fw-semibold">Registered Address</label>
          <textarea class="form-control" id="registeredAddress" rows="2" name="address" placeholder="Enter registered address" required></textarea>
        </div>
        
        
        
        <div class="mb-4">
          <label for="Password" class="form-label text-dark fw-semibold">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
        </div>
      
        <div class="text-center">
        <button type="submit" class="btn btn-primary w-25">Register</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>