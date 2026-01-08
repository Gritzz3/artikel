<!DOCTYPE html>
<html>
<head>
    <title>Final Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/final_exam/home.php">Final Exam</a>
    <div>
      <?php if (isset($_SESSION['user_id'])) { ?>
        <span class="text-white me-3"><?= $_SESSION['name']; ?></span>
        <a href="/final_exam/auth/logout.php" class="btn btn-sm btn-danger">Logout</a>
      <?php } ?>
    </div>
  </div>
</nav>

<div class="container mt-4">
