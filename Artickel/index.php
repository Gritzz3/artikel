<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">👋 Selamat Datang, <?= $_SESSION['name']; ?></h3>
    </div>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title"> Tambah Artikel</h5>
                    <p class="text-muted">Buat artikel baru</p>
                    <a href="articles/create.php" class="btn btn-success w-100">Tambah</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title"> Artikel </h5>
                    <p class="text-muted">Kelola semua artikel</p>
                    <a href="articles/index.php" class="btn btn-primary w-100">Lihat Artikel</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title"> Logout</h5>
                    <p class="text-muted">Keluar dari sistem</p>
                    <a href="auth/logout.php" class="btn btn-danger w-100">Logout</a>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>
