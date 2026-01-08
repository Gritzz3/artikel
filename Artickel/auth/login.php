<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php
session_start();
include "../config/db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user  = mysqli_fetch_assoc($query);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        header("Location: ../index.php");
    } else {
        echo "Login gagal!";
    }
}
?>

<div class="row justify-content-center">
<div class="col-md-4">
<div class="card shadow">
<div class="card-body">

<h4 class="text-center mb-3">Login</h4>

<form method="POST">
    <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
    <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
    <button class="btn btn-primary w-100" name="login">Login</button>
</form>

</div>
</div>
</div>
</div>

