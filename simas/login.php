<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = "login";
        header("location:index.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Login Admin</h2>
            <form method="post" action="">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="admin" required>
                </div>
                <div class="form-group" style="margin-top: 15px;">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary" style="margin-top: 10px;">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>