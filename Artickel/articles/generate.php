<?php
session_start();
include "../config/db.php";

$user_id = $_SESSION['user_id'];

for ($i = 1; $i <= 25; $i++) {
    $title = "Artikel $i";
    $content = "Ini adalah isi artikel ke-$i";
    $image = "default.jpg";
    $views = rand(10,500);
    $status = "publish";
    $date = date('Y-m-d');

    mysqli_query($conn,
        "INSERT INTO articles 
        (user_id, title, content, image, views, status, created_at)
        VALUES
        ('$user_id','$title','$content','$image','$views','$status','$date')"
    );
}

echo "25 artikel berhasil ditambahkan";
