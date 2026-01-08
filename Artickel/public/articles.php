<?php
include "../config/db.php";

// tampilkan hanya artikel publish
$data = mysqli_query($conn,
    "SELECT * FROM articles WHERE status='publish' ORDER BY created_at DESC"
);
?>

<h2>Daftar Artikel</h2>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <h3><?= $row['title']; ?></h3>
        <img src="../uploads/<?= $row['image']; ?>" width="150"><br>
        <p><?= substr($row['content'],0,100); ?>...</p>
        <a href="detail.php?id=<?= $row['id']; ?>">Baca Selengkapnya</a>
    </div>
<?php } ?>
<div class="row">
<?php while($row=mysqli_fetch_assoc($data)) { ?>
<div class="col-md-4 mb-3">
  <div class="card shadow h-100">
    <img src="../uploads/articles/<?= $row['image']; ?>" class="card-img-top">
    <div class="card-body">
      <h5><?= $row['title']; ?></h5>
      <p><?= substr($row['content'],0,80); ?>...</p>
      <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
    </div>
  </div>
</div>
<?php } ?>
</div>
