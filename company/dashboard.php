<!doctype html>
<html lang="en">

<head>
    <title>Enhanced Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2);
        }

        .icon {
            font-size: 2.5rem;
            margin-top: 15px;
        }

        .display-4 {
            font-size: 3rem;
            font-weight: bold;
        }

        .text-muted {
            font-size: 1.1rem;
        }

        .header {
            padding: 20px;
            background-color: #343a40;
            color: white;
            border-bottom: 3px solid #28a745;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }

        footer a {
            color: #28a745;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<?php include('../connection.php'); ?>
   
    <main>
        <div class="container py-5">
            <div class="row g-4">
                   
                   <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div class="display-4 text-success">
                                <?php echo $conn->query("SELECT * FROM JOBLIST")->num_rows; ?>
                            </div>
                            <p class="mb-2 text-muted">Total Jobs Posted</p>
                            <div class="icon text-success">
                                <i class="fa fa-briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
                  
                   <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div class="display-4 text-success">
                                <?php echo $conn->query("SELECT * FROM CANDIDATE")->num_rows; ?>
                            </div>
                            <p class="mb-2 text-muted">Total Candidate</p>
                            <div class="icon text-success">
                                <i class="fa fa-briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div class="display-4 text-success">
                                <?php echo $conn->query("SELECT * FROM APPLICATION")->num_rows; ?>
                            </div>
                            <p class="mb-2 text-muted">Total Applications</p>
                            <div class="icon text-success">
                                <i class="fa fa-briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
               

            </div>
        </div>
    </main>
   

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>