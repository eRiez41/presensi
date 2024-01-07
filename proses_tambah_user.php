<?php
include "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $level = mysqli_real_escape_string($koneksi, $_POST['level']);

    // Enkripsi password menggunakan MD5
    $md5_password = md5($password);

    $query = "INSERT INTO tbl_user (username, password, nama_lengkap, level) 
              VALUES ('$username', '$md5_password', '$nama_lengkap', '$level')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('User berhasil ditambahkan'); window.location = 'dashboard.php'</script>";
    } else {
        echo "<script>alert('Gagal menambahkan user');</script>";
    }
} else {
    header("Location: dashboard.php");
}
?>
