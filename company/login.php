<?php
session_start();

include "../connection.php";

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if ($email && $password) {
    $sql = "SELECT * FROM COMPANY WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $company = mysqli_fetch_assoc($result);
        $companyId = $company['Id'];
        header("location:main.php?id=$companyId");
        exit();
    } else {
        echo "Invalid credentials. <a href='login.html'>Try Again</a>";
    }
} else {
    echo "Email and Password are required. <a href='login.html'>Try Again</a>";
}
mysqli_close($conn);
?>