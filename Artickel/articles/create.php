<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_POST['save'])) {
    $user_id = $_SESSION['user_id'];
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $views   = $_POST['views'];
    $status  = $_POST['status'];
    $date    = date('Y-m-d');

    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/".$image);

    $query = "INSERT INTO articles 
        (user_id, title, content, image, views, status, created_at)
        VALUES 
        ('$user_id','$title','$content','$image','$views','$status','$date')";

    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold"> Tambah Artikel</h3>
                <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Artikel</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Isi Artikel</label>
                            <textarea name="content" class="form-control" rows="5" placeholder="Tulis isi artikel..." required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Views</label>
                                <input type="number" name="views" class="form-control" value="0">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select">
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload Gambar</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" name="save" class="btn btn-success px-4">
                                 Simpan Artikel
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
