<?php
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
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
        <title>Data Mata Kuliah</title>
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
            <div class="card border-danger mb-4">
                <div class="card-header bg-danger text-white">
                    <h4 class="m-0">Data Mata Kuliah</h4>
                </div>
                <div class="card-body text-success">
                    <?php
                    if ($level == 'admin') {
                        // Jika level admin, tampilkan tombol Tambah Data
                        ?>
                        <div class="row">
                            <div class="col-md-6 mb-3 ">
                                <a href='matakuliah/tambah_matakuliah.php' class='btn btn-primary'>Tambah Data</a>
                            </div>
                            <div class="col-md-6 ">
                                <form action="matakuliah/cari_matakuliah.php" method="GET">
                                    <div class="btn-group float-end" role="group">
                                        <input type="text" name="keyword" class="form-control" placeholder="Masukan keyword" required>
                                        <button type="submit" class="btn btn-primary">Pencarian</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Jenis</th>
                                        <?php
                                        if ($level == 'admin') {
                                            // Jika level admin, tampilkan kolom Aksi
                                            echo "<th>Aksi</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "config/koneksi.php";
                                    $i = 0;
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah");
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['kode_matakuliah'] ?></td>
                                            <td><?= $data['nama_matakuliah'] ?></td>
                                            <td><?= $data['sks'] ?></td>
                                            <td><?= $data['jenis'] ?></td>
                                            <?php
                                            if ($level == 'admin') {
                                                // Jika level admin, tampilkan tombol Edit dan Hapus
                                                echo "<td>
                                                    <a href='matakuliah/edit_matakuliah.php?kode_matakuliah={$data['kode_matakuliah']}' class='btn btn-primary'>Edit</a>
                                                    <a href='matakuliah/delete_matakuliah.php?kode_matakuliah={$data['kode_matakuliah']}' class='btn btn-danger' onclick=\"return confirm('Apakah anda yakin ingin menghapus ini ?')\">Hapus</a>
                                                </td>";
                                            }
                                            ?>
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
