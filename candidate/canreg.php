<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tag {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 0.5em 0.75em;
            border-radius: 20px;
            margin: 0.25em;
            font-size: 0.875em;
        }
        .tag .remove-tag {
            margin-left: 0.5em;
            cursor: pointer;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Candidate Registration Form</h2>
        <form action="insert.php" method="post">
            <!-- Personal Information Section -->
            <fieldset class="border border-dark p-4 mb-4">
                <legend class="float-none w-auto px-3">Personal Information</legend>
                
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="dob" id="dob" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter your address" required></textarea>
                </div>
            </fieldset>

            <!-- Professional Details Section -->
            <fieldset class="border border-dark p-4 mb-4">
                <legend class="float-none w-auto px-3">Professional Details</legend>
                <div class="mb-3">
                    <label for="latestEducation" class="form-label">Latest Education <span class="text-danger">*</span></label>
                    <select class="form-select" id="latestEducation" name="education" required>
                        <option selected disabled value="">Select your education level</option>
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="graduation">Graduation</option>
                        <option value="postGraduation">Post Graduation</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marks" class="form-label">Marks/CGPA/SGPA <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="marks" name="marks" placeholder="Enter your marks, CGPA, or SGPA" required>
                </div>
                <div class="mb-3">
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
                    <div class="input-group">
                        <input type="text" id="skillInput" class="form-control" placeholder="Type a skill and press Enter" required>
                    </div>
                    <div id="skillTags" class="mt-3"></div>
                    <input type="hidden" id="skillsHidden" name="skill">
                </div>

            </fieldset>

            <!-- LinkedIn and Portfolio Section -->
            <fieldset class="border border-dark p-4 mb-4">
                <legend class="float-none w-auto px-3">Links</legend>
                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn Profile</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="Enter your LinkedIn profile URL">
                </div>
                <div class="mb-3">
                    <label for="portfolio" class="form-label">Portfolio</label>
                    <input type="url" class="form-control" id="portfolio" name="portfolio" placeholder="Enter your portfolio URL">
                </div>
            </fieldset>

            <fieldset class="border border-dark p-4 mb-4">
                <legend class="float-none w-auto px-3">Password</legend>
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

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-25">Submit</button>
            </div>
        </form>
    </div>

    <!-- <script>
       const skillInput = document.getElementById('skillInput');
const skillTags = document.getElementById('skillTags');
const skillsHidden = document.getElementById('skillsHidden');
let skills = []; // Array to store the skills

skillInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        // event.preventDefault();
        const skill = skillInput.value.trim();
        if (skill && !skills.includes(skill)) {
            skills.push(skill);
            addSkillTag(skill);
            updateSkillsHidden();
        }
        skillInput.value = '';
    }
});

function addSkillTag(skill) {
    const tag = document.createElement('span');
    tag.className = 'tag';
    tag.textContent = skill;

    const removeButton = document.createElement('span');
    removeButton.className = 'remove-tag';
    removeButton.innerHTML = '&times;';
    removeButton.onclick = () => {
        skills = skills.filter(s => s !== skill);
        tag.remove();
        updateSkillsHidden();
    };

    tag.appendChild(removeButton);
    skillTags.appendChild(tag);
}

function updateSkillsHidden() {
    skillsHidden.value = skills.join(','); // Update the hidden input with a comma-separated list of skills
}

    </script> -->

<!-- <script>
   document.querySelector('form').addEventListener('submit', function(event) {
    const form = event.target;

    // Check if the form is valid according to native validation rules
    if (!form.checkValidity()) {
        event.preventDefault(); // Prevent form submission
        form.reportValidity(); // Trigger the native validation UI
        return;
    }

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // Custom validation for password confirmation
    if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        alert('Passwords do not match. Please try again.');
    }
});

</script> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
