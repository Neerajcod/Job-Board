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
        label {
            font-weight: bold;
        }
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
        <form action="insert.php" method="post" id="profileForm">
           
            <h1 class="text-center mb-4">Your Profile</h1>
            <fieldset>
                <legend>Personal Information</legend>
                
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="dob" id="dob" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </fieldset>

          
            <fieldset>
                <legend>Professional Details</legend>
                <div class="mb-3">
                    <label for="latestEducation" class="form-label">Latest Education <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="education" name="education" required>
                </div>
                <div class="mb-3">
                    <label for="marks" class="form-label">Marks/CGPA/SGPA <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="marks" name="marks" required>
                </div>
                <div class="mb-3">
                    <label for="workexperience" class="form-label">Work Experience <span class="text-danger">*</span></label>
                    <label for="workexperience" class="form-label">Work Experience <span class="text-danger">*</span></label>
                    <select class="form-select" id="workexperience" name="workexp" required>
                        <option selected disabled value="">Select your Work Experience</option>
                        <option value="Fresher">Fresher</option>
                        <option value="1 Year">1 Year</option>
                        <option value="2 Year">2 Year</option>
                        <option value="3 Year">3 Year</option>
                        <option value="4 Year">4 Year</option>
                        <option value="5 Year">5 Year</option>
                        <option value="More Than 5 Year">More Than 5 Year</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">Skills <span class="text-danger">*</span></label>
                    <input type="text" id="skillInput" name="skills" class="form-control">
                </div>
            </fieldset>

           
            <fieldset>
                <legend>Links</legend>
                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn Profile</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" >
                </div>
                <div class="mb-3">
                    <label for="portfolio" class="form-label">Portfolio</label>
                    <input type="url" class="form-control" id="portfolio" name="portfolio" >
                </div>
            </fieldset>
            <fieldset>
                <legend>Password</legend>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span>
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span>
                    </label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                </div>

            </fieldset>
            
            
            <div class="text-center">
                <button type="button" class="btn btn-secondary w-25" id="editButton">Register</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
   document.querySelector('form').addEventListener('submit', function(event) {
    const form = event.target;

    
    if (!form.checkValidity()) {
        event.preventDefault(); 
        form.reportValidity(); 
        return;
    }

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

   
    if (password !== confirmPassword) {
        event.preventDefault(); 
        alert('Passwords do not match. Please try again.');
    }
});

</script>
</body>
</html>