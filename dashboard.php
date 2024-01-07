<?php
session_start();
if(empty($_SESSION['username']) AND empty($_SESSION['password']) ){
echo "<script>alert('Anda tidak memiliki akses'); window.location =
'login.php'</script>";
}else{

 // Ambil level pengguna dari sesi
 $level = $_SESSION['level'];

 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <div class="card border-success mb-4">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="m-0">Dashboard</h4>
            <?php
                    if ($level == 'admin') {
                        // Jika level admin, tampilkan tombol Tambah Data
                        ?>
            <a href="tambah_user.php" class="btn btn-primary">Tambah User</a>
            <?php
                    }
                    ?>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Data Mahasiswa</h5>
                                <p class="card-text">Kelola data mahasiswa di sini.</p>
                                <a href='tampil_mahasiswa.php' class='btn btn-light'>Lihat Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Data Dosen</h5>
                                <p class="card-text">Kelola data dosen di sini.</p>
                                <a href='tampil_dosen.php' class='btn btn-light'>Lihat Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Data Matakuliah</h5>
                                <p class="card-text">Kelola data matakuliah di sini.</p>
                                <a href='tampil_matakuliah.php' class='btn btn-light'>Lihat Data</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($level == 'admin') {
                        // Jika level admin, tampilkan tombol Tambah Data
                        ?>
                    <div class="col-md-4 mb-2">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Data Pengguna</h5>
                                <p class="card-text">Kelola data pengguna disini.</p>
                                <a href='tampil_user.php' class='btn btn-light'>Lihat Data</a>
                            </div>
                        </div>
                    </div>     
                <?php 
                }
                 ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
}
?>