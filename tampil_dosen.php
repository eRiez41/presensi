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
        <title>Data Dosen</title>
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
            <div class="card border-warning mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="m-0">Data Dosen</h4>
                </div>
                <div class="card-body text-success">
                    <?php
                    if ($level == 'admin') {
                        // Jika level admin, tampilkan tombol Tambah Data
                        ?>
                        <div class="row">
                            <div class="col-md-6 mb-3 ">
                                <a href='dosen/tambah_dosen.php' class='btn btn-primary'>Tambah Data</a>
                            </div>
                            <div class="col-md-6 ">
                                <form action="dosen/cari_dosen.php" method="GET">
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
                                        <th>NIDN</th>
                                        <th>Nama Dosen</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Gelar</th>
                                        <th>Prodi</th>
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
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dosen");
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data['nidn'] ?></td>
                                            <td><?= $data['nama_dosen'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td><?= $data['pendidikan_terakhir'] ?></td>
                                            <td><?= $data['gelar'] ?></td>
                                            <td><?= $data['prodi'] ?></td>
                                            <?php
                                            if ($level == 'admin') {
                                                // Jika level admin, tampilkan tombol Edit dan Hapus
                                                echo "<td>
                                                    <a href='dosen/edit_dosen.php?nidn={$data['nidn']}' class='btn btn-primary'>Edit</a>
                                                    <a href='dosen/delete_dosen.php?nidn={$data['nidn']}' class='btn btn-danger' onclick=\"return confirm('Apakah anda yakin ingin menghapus ini ?')\">Hapus</a>
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
