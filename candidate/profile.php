<?php 
include "../connection.php";
$Id = $_GET['id'];

$sql = "SELECT * FROM CANDIDATE WHERE ID=$Id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        fieldset {
            border-radius: 5px;
            border: 2px solid #000;
            margin-bottom: 20px;
            padding: 15px 20px;
        }
        legend {
            font-size: 1.2rem;
            font-weight: bold;
            color: #000;
            border: none;
            width: auto;
            padding: 0 10px;
        }
        /* label {
            font-weight: bold;
        } */
        input[readonly] {
            background-color: #e9ecef;
        }
        .btn-secondary, .btn-primary {
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="update.php" method="post" id="profileForm">
            <!-- Personal Information Section -->
            <h1 class="text-center mb-4">Your Profile</h1>
            <fieldset>
                <legend>Personal Information</legend>
                <div class="mb-3">
                    <label for="Id" class="form-label">Full Id <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="Id" name="id" value="<?php echo "{$rows['Id']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullName" name="name" value="<?php echo "{$rows['Name']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo "{$rows['DOB']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo "{$rows['Email']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo "{$rows['Phone No']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo "{$rows['Address']}"; ?>" readonly>
                </div>
            </fieldset>

            <!-- Professional Details Section -->
            <fieldset>
                <legend>Professional Details</legend>
                <div class="mb-3">
                    <label for="latestEducation" class="form-label">Latest Education <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="education" name="education" value="<?php echo "{$rows['Education']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="marks" class="form-label">Marks/CGPA/SGPA <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="marks" name="marks" value="<?php echo "{$rows['Marks']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="workexperience" class="form-label">Work Experience <span class="text-danger">*</span></label>
                    <select class="form-select" id="experience" name="experience" disabled>
                        <option disabled>Select your Work Experience</option>
                        <option value="Fresher" <?php echo ($rows['Experience']=='Fresher')?'selected':'';?>>Fresher</option>
                        <option value="1 Year" <?php echo ($rows['Experience']=='1 Year')?'selected':'';?>>1 Year</option>
                        <option value="2 Year" <?php echo ($rows['Experience']=='2 Year')?'selected':'';?>>2 Year</option>
                        <option value="3 Year" <?php echo ($rows['Experience']=='3 Year')?'selected':'';?>>3 Year</option>
                        <option value="4 Year" <?php echo ($rows['Experience']=='4 Year')?'selected':'';?>>4 Year</option>
                        <option value="5 Year" <?php echo ($rows['Experience']=='5 Year')?'selected':'';?>>5 Year</option>
                        <option value="More Than 5 Year" <?php echo ($rows['Experience']=='More Than 5 Year')?'selected':'';?>>More Than 5 Year</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">Skills <span class="text-danger">*</span></label>
                    <input type="text" id="skillInput" name="skills" class="form-control" readonly><?php echo htmlspecialchars($rows['Skills']); ?>
                </div>
            </fieldset>

            <!-- Links Section -->
            <fieldset>
                <legend>Links</legend>
                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn Profile</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" value="<?php echo "{$rows['Linkedin']}"; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="portfolio" class="form-label">Portfolio</label>
                    <input type="url" class="form-control" id="portfolio" name="portfolio" value="<?php echo "{$rows['Portfolio']}"; ?>" readonly>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <div class="text-center">
                <button type="button" class="btn btn-secondary w-25" id="editButton" onclick="toggleEditMode()">Edit Profile</button>
                <center><button type="submit" class="btn btn-primary w-25" id="updateButton" style="display:none;">Update Profile</button></center>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
