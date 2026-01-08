<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$article_id = $_GET['article_id'];

if (isset($_POST['save'])) {
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment_text'];
    $rating  = $_POST['rating'];
    $status  = "publish";
    $date    = date('Y-m-d');

    // upload gambar
    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/".$image);

    mysqli_query($conn,
        "INSERT INTO comments
        (user_id, article_id, comment_text, image, rating, status, created_at)
        VALUES
        ('$user_id','$article_id','$comment','$image','$rating','$status','$date')"
    );

    header("Location: ../public/detail.php?id=$article_id");
}
?>

<form method="POST" enctype="multipart/form-data">
    <h3>Tambah Komentar</h3>
    <textarea name="comment_text" required></textarea><br>
    <input type="number" name="rating" min="1" max="5" required><br>
    <input type="file" name="image"><br>
    <button name="save">Kirim</button>
</form>
