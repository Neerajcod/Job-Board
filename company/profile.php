<?php 
include "../connection.php";
$Id = $_GET['id'];

$sql = "SELECT * FROM COMPANY WHERE ID=$Id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

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
      <form action="update.php" method="post" id="profileForm" onsubmit="submitForm(event)">
       
        <div class="mb-4">
          <label for="companyName" class="form-label text-dark fw-semibold">Company Name</label>
          <input type="text" class="form-control" id="companyName" name="comname" placeholder="Enter company name" value="<?php echo "{$rows['Company Name']}"; ?>" readonly>
        </div>
        
        <div class="mb-4">
          <label for="companyEmail" class="form-label text-dark fw-semibold">Company Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email" value="<?php echo "{$rows['Email']}"; ?>" readonly>
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
          <label for="ownerName" class="form-label text-dark fw-semibold">Owner Name</label>
          <input type="text" class="form-control" id="ownerName" name="owner" placeholder="Enter owner name" value="<?php echo "{$rows['Owner']}"; ?>" readonly>
        </div>
        
        <div class="mb-4">
          <label for="Password" class="form-label text-dark fw-semibold">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo "{$rows['Password']}"; ?>" readonly>
        </div>
       
        <div class="text-center">
          <button type="button" class="btn btn-warning w-25" id="editButton" onclick="toggleEditMode()">Edit Profile</button>
          <center><button type="submit" class="btn btn-success w-25" id="updateButton" style="display:none;">Update Profile</button></center>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function toggleEditMode() {
    const form = document.querySelector('#profileForm');
    const inputs = form.querySelectorAll('input, textarea, select');
    const editButton = document.getElementById('editButton');
    const updateButton = document.getElementById('updateButton');

    inputs.forEach(input => input.readOnly = !input.readOnly);
    editButton.style.display = editButton.style.display === 'none' ? 'inline-block' : 'none';
    updateButton.style.display = updateButton.style.display === 'none' ? 'inline-block' : 'none';
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
