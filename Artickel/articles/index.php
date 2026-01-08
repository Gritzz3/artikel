<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$data = mysqli_query($conn, 
    "SELECT * FROM articles WHERE user_id='$user_id'"
);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Artikel </h2>
    <a href="../auth/logout.php" 
       class="btn btn-danger"
       onclick="return confirm('Yakin ingin logout?')">
       Logout
    </a>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="create.php" class="btn btn-success">
         Tambah Artikel
    </a>
</div>
<hr>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
  <th>No</th>
  <th>Judul</th>
  <th>Gambar</th>
  <th>Views</th>
  <th>Status</th>
  <th>Opsi</th>
</tr>
</thead>


<?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['title']; ?></td>
    <td><img src="../uploads/<?= $row['image']; ?>" width="80"></td>
    <td><?= $row['views']; ?></td>
    <td><?= $row['status']; ?></td>
    <td>
    <a class="btn btn-sm btn-info" href="../public/detail.php?id=<?= $row['id']; ?>">Detail</a>
    <a class="btn btn-sm btn-warning" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
    <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row['id']; ?>" 
       onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</a>
</td>


</tr>
<?php } ?>
</table>
