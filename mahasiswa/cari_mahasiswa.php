<?php
include "../config/koneksi.php";
$i = 0;
$keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa
WHERE nim like '%$keyword%' OR
nama_mahasiswa like '%$keyword%' OR
jenis_kelamin like '%$keyword%' OR
tempat_lahir like '%$keyword%' OR
tanggal_lahir like '%$keyword%' OR
tahun_masuk like '%$keyword%' OR
prodi like '%$keyword%'"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data Mahasiswa</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu_mahasiswa.php"; ?>
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header">Hasil Pencarian : keyword
                "<b>
                    <?= $keyword ?>
                </b>"</div>
            <div class="card-body text-success">
                <div class="row">
                    <div class="col-md-6 mb-2 ">
                        <a href='../tampil_mahasiswa.php' class='btn btn-warning'> Kembali</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="cari_mahasiswa.php" method="GET">
                            <div class="btn-group float-end" role="group">

                                <input type="text" name="keyword" class="form-control" placeholder="Masukan keyword">

                                <button type="button" class="btn btn-primary">Pencarian</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tahun Masuk</th>
                                    <th>Prodi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            </tbody>
                            <?php
                            while ($data = mysqli_fetch_array($tampil)) {
                                $i++;
                                ?>
                                <tr>
                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?= $data['nim'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_mahasiswa'] ?>
                                    </td>
                                    <td>
                                        <?= $data['jenis_kelamin'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tempat_lahir'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tanggal_lahir'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tahun_masuk'] ?>
                                    </td>
                                    <td>
                                        <?= $data['prodi'] ?>
                                    </td>
                                    <td>
                                        <a href="edit_mahasiswa.php?nim=<?= $data['nim'] ?>" class='btn btn-primary'>Edit</a>
                                        <a href="delete_mahasiswa.php?nim=<?= $data['nim'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">Hapus</a>
                                    </td>
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
    </div>
    </div>
</body>

</html>