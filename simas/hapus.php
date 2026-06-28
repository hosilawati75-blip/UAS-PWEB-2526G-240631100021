<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

if ($query) {
    header("location:index.php");
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>