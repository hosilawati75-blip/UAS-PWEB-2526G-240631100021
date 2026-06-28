<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id    = $_POST['id'];
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi', email='$email', no_hp='$no_hp' WHERE id='$id'");

    if ($query) {
        header("location:index.php");
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='index.php';</script>";
    }
}
?>