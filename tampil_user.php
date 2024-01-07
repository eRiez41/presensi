<?php
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['password']) || $_SESSION['level'] !== 'admin') {
    echo "<script>
            setTimeout(function() {
                alert('Anda tidak memiliki akses');
                window.location = 'login.php';
            }, 1000); // Delay 1 detik
          </script>";
} else {
    // Ambil level pengguna dari sesi
    $level = $_SESSION['level'];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Pengguna</title>
        <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <?php include "menu.php"; ?>
                </div>
            </div>
            <div class="card border-info mb-4">
                <div class="card-header bg-info text-white">
                    <h4 class="m-0">Data Pengguna</h4>
                </div>
                <div class="card-body text-success">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "config/koneksi.php";
                                    $i = 0;
                                    $tampil = mysqli_query($koneksi, "SELECT username, nama_lengkap, level FROM tbl_user");
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['nama_lengkap'] ?></td>
                                            <td><?= $data['level'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>
