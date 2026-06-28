<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, prodi, email, no_hp) VALUES ('$nim', '$nama', '$prodi', '$email', '$no_hp')");
    if ($query) { header("location:index.php"); }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="form-container">
        <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="240631100011" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="ali" required>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <input type="text" name="prodi" class="form-control" placeholder="pif" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="aliii@gmail.com" required>
            </div>
            <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" name="no_hp" class="form-control thick-border" placeholder="089744332211" required>
            </div>
            <div style="margin-top: 20px;">
                <button type="submit" name="simpan" class="btn btn-success">Simpan Data</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>