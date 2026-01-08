<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php
session_start();
include "../config/db.php";

if (isset($_POST['register'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $date  = date('Y-m-d');

    $query = "INSERT INTO users (name, email, password, created_at)
              VALUES ('$name', '$email', '$pass', '$date')";
    mysqli_query($conn, $query);

    header("Location: login.php");
}
?>

<form method="POST">
    <h2>Register</h2>
    <input type="text" name="name" placeholder="Nama" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button name="register">Register</button>
</form>
