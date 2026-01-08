<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan";
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn,
    "SELECT * FROM articles 
     WHERE id='$id' AND user_id='$user_id'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Artikel tidak ditemukan";
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h3><?= $data['title']; ?></h3>
    <hr>

    <img src="../uploads/<?= $data['image']; ?>" class="img-fluid mb-3">

    <p><?= nl2br($data['content']); ?></p>

    <p>
        <strong>Status:</strong> <?= $data['status']; ?> |
        <strong>Views:</strong> <?= $data['views']; ?>
    </p>

    <a href="../articles/index.php" class="btn btn-secondary">Kembali</a>

</div>
