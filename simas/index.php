<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h2 class="main-title">Data Mahasiswa</h2>

    <div class="header-wrapper">
        <div class="left-buttons">
            <a href="tambah.php" class="btn btn-success">+ Tambah Data</a>
            <a href="logout.php" class="btn btn-danger" onclick="return confirm('Apakah anda ingin logout?');">Logout</a>
        </div>
        
        <form method="get" action="index.php" class="right-search">
            <input type="text" name="cari" placeholder="Cari NIM, Nama, Prodi..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
            <button type="submit" class="btn btn-search">Cari</button>
        </form>
    </div>

    <table>
        <tr>
            <th style="width: 60px;">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Email</th>
            <th>No HP</th>
            <th style="width: 130px;">Aksi</th>
        </tr>
        <?php
        $no = 1;
        if (isset($_GET['cari']) && $_GET['cari'] != '') {
            $cari = $_GET['cari'];
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%' OR prodi LIKE '%$cari%' OR email LIKE '%$cari%'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        }

        if (mysqli_num_rows($query) > 0) {
            while ($d = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nim']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['prodi']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['no_hp']; ?></td>
                    <td>
                        <div class="action-container">
                            <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center; color:#999; padding:20px;'>Data tidak ditemukan.</td></tr>";
        }
        ?>
    </table>

</body>
</html>