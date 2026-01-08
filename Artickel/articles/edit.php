<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id      = $_GET['id'];
$user_id = $_SESSION['user_id'];

$data = mysqli_query($conn,
    "SELECT * FROM articles WHERE id='$id' AND user_id='$user_id'"
);
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Akses ditolak!";
    exit;
}

if (isset($_POST['update'])) {
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $views   = $_POST['views'];
    $status  = $_POST['status'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../uploads/".$image);

        $query = "UPDATE articles SET
                    title='$title',
                    content='$content',
                    image='$image',
                    views='$views',
                    status='$status'
                  WHERE id='$id' AND user_id='$user_id'";
    } else {
        $query = "UPDATE articles SET
                    title='$title',
                    content='$content',
                    views='$views',
                    status='$status'
                  WHERE id='$id' AND user_id='$user_id'";
    }

    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold"> Edit Artikel</h3>
                <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Artikel</label>
                            <input type="text" name="title" class="form-control" 
                                   value="<?= $row['title']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Isi Artikel</label>
                            <textarea name="content" class="form-control" rows="5" required><?= $row['content']; ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Views</label>
                                <input type="number" name="views" class="form-control" value="<?= $row['views']; ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select">
                                    <option value="draft" <?= $row['status']=='draft'?'selected':''; ?>>Draft</option>
                                    <option value="publish" <?= $row['status']=='publish'?'selected':''; ?>>Publish</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar Saat Ini</label><br>
                            <img src="../uploads/<?= $row['image']; ?>" class="img-thumbnail" width="150">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Ganti Gambar (Opsional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" name="update" class="btn btn-warning px-4 text-white">
                                 Update Artikel
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
