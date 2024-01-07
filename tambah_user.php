<?php
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
    echo "<script>alert('Anda tidak memiliki akses'); window.location = 'login.php'</script>";
} else {
    // Ambil level pengguna dari sesi
    $level = $_SESSION['level'];

    // Cek apakah pengguna adalah admin
    if ($level !== 'admin') {
        echo "<script>alert('Anda tidak memiliki akses'); window.location = 'dashboard.php'</script>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-dvf8C79NIgIy5HDSnVc1PWWy4sy6cSN2fH3xKMEz1rBftNRLu1TII53QbQZJz5q24" crossorigin="anonymous">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu.php"; ?>
            </div>
        </div>
        <div class="card border-secondary mb-4">
            <div class="card-header bg-secondary text-white">
                <h4 class="m-0">Tambah User</h4>
            </div>
            <div class="card-body">
                <form action="proses_tambah_user.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <!-- Level diisi otomatis sebagai 'user' -->
                    <input type="hidden" name="level" value="user">
                    <button type="submit" class="btn btn-primary">Tambah User</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
}
?>
