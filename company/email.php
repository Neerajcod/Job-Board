

<!doctype html>
<html lang="en">
    <head>
        <title>Job Application</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.3.2 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            body {
                background-color: #f4f6f9;
                font-family: Arial, sans-serif;
            }
            label {
            font-weight: bold;
        }
            .card {
                background: white;
                border-radius: 10px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            }
            .card-header {
                background: #007bff;
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                text-align: center;
                padding: 15px;
            }
            .form-control {
                border-radius: 5px;
            }
            button {
                border-radius: 5px;
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                border: none;
            }
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container  p-2" >
            <?php
                include "../connection.php";
                $sql="SELECT * FROM application";
                $result=mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    echo "
                        <div class='container my-5'>
                            <div
                                class='table-responsive'
                            >
                                <table
                                    class='table table-primary'
                                >
                                    <thead>
                                        <tr>
                                            <th scope='col'>Id</th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Email</th>
                                            <th scope='col'>Cover Letter</th>
                                            <th scope='col'>Linked in</th>
                                            <th scope='col'>Resume</th>
                                            <th scope='col'>Status</th>
                                            <th scope='col'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    while($rows=mysqli_fetch_assoc($result)){
                                        echo"
                                         <tr class=''>
                                            <td>{$rows['id']}</td>
                                            <td>{$rows['Full_name']}</td>
                                            <td class='text-break'>{$rows['Email']}</td>
                                            <td>{$rows['Cover_letter']}</td>
                                            <td>{$rows['Linkedin']}</td>
                                            <td>{$rows['Resume']}</td>
                                            <td>{$rows['status']}</td>
                                            <td>
                                                <a href='statusupdate.php?id={$rows['id']}' class='btn btn-warning'>Edit</a>
                                              
                                            </td>
                                            
                                            
                                        </tr>
                                        ";
                                    }
                                       
                                    echo"</tbody>
                                </table>
                            </div>
                            
                        </div>";
                }
            else{
                echo"No Tasks Available";
            }
            
            
            
            
            
            
            ?>
            </div>
        </main>

        <footer>
            <!-- place footer here -->
        </footer>

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