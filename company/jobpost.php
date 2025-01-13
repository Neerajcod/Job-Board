<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job Listing</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5 p-5" style="max-width: 700px;">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center rounded-top">
            <h2 class="mb-0">Post a New Job</h2>
        </div>
        <div class="card-body p-4">
            <form action="jobpostquery.php" method="POST" enctype="multipart/form-data">
                <!-- Job Title -->
                <div class="mb-4">
                    <label for="job_title" class="form-label text-dark fw-semibold">Job Title</label>
                    <input type="text" class="form-control" id="job_title" name="job_title" maxlength="100" placeholder="Enter job title" required>
                </div>

                <!-- Company Name -->
                <div class="mb-4">
                    <label for="company_name" class="form-label text-dark fw-semibold">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email" required>
                </div>

                <!-- Job Description -->
                <div class="mb-4">
                    <label for="job_description" class="form-label text-dark fw-semibold">Job Description</label>
                    <textarea class="form-control" id="job_description" name="job_description" rows="5" placeholder="Describe the job role and responsibilities" required></textarea>
                </div>

                <!-- Job Type -->
                <div class="mb-4">
                    <label for="job_type" class="form-label text-dark fw-semibold">Job Type</label>
                    <select class="form-select" id="job_type" name="job_type" required>
                        <option selected disabled>Choose job type...</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <label for="location" class="form-label text-dark fw-semibold">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter job location" required>
                </div>

                <!-- Salary Range -->
                <div class="mb-4">
                    <label for="salary_range" class="form-label text-dark fw-semibold">Salary Range</label>
                    <input type="number" class="form-control" id="salary_range" name="salary_range" placeholder="Enter salary in USD" required>
                </div>

                <!-- Application Deadline -->
                <div class="mb-4">
                    <label for="application_deadline" class="form-label text-dark fw-semibold">Application Deadline</label>
                    <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
                </div>

                <!-- Company Logo -->
                <div class="mb-4">
                    <label for="company_logo" class="form-label text-dark fw-semibold">Company Logo</label>
                    <input type="file" class="form-control" id="company_logo" name="company_logo" accept="image/*" required>
                    <small class="text-muted">Recommended size: 400x400 px</small>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-dark w-50 py-2">Post Job</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS & Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
