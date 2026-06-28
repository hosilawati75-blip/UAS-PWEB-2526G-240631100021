<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="form-container">
        <h3>Edit Data Mahasiswa</h3>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $d['nim']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control thick-border" value="<?php echo $d['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <input type="text" name="prodi" class="form-control" value="<?php echo $d['prodi']; ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $d['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $d['no_hp']; ?>" required>
            </div>
            <div style="margin-top: 20px;">
                <button type="submit" name="update" class="btn btn-primary" style="width:auto;">Update Data</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>