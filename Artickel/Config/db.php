<?php
$conn = mysqli_connect("localhost", "root", "", "artickel");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
