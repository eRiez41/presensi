<?php
include "../config/koneksi.php";
$i = 0;
$keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dosen
WHERE nidn like '%$keyword%' OR
nama_dosen like '%$keyword%' OR
jenis_kelamin like '%$keyword%' OR
alamat like '%$keyword%' OR
no_hp like '%$keyword%' OR
pendidikan_terakhir like '%$keyword%' OR
gelar like '%$keyword%' OR
prodi like '%$keyword%'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data dosen</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu_dosen.php"; ?>
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
                        <a href='../tampil_dosen.php' class='btn btn-warning'> Kembali</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="cari_dosen.php" method="GET">
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
                                    <th>NIDN</th>
                                    <th>Nama Dosen</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Gelar</th>
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
                                        <?= $data['nidn'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_dosen'] ?>
                                    </td>
                                    <td>
                                        <?= $data['jenis_kelamin'] ?>
                                    </td>
                                    <td>
                                        <?= $data['alamat'] ?>
                                    </td>
                                    <td>
                                        <?= $data['no_hp'] ?>
                                    </td>
                                    <td>
                                        <?= $data['pendidikan_terakhir'] ?>
                                    </td>
                                    <td>
                                        <?= $data['gelar'] ?>
                                    </td>
                                    <td>
                                        <?= $data['prodi'] ?>
                                    </td>
                                    <td>
                                        <a href="edit_dosen.php?nim=<?= $data['nim'] ?>" class='btn btn-primary'>Edit</a>
                                        <a href="delete_dosen.php?nim=<?= $data['nim'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">Hapus</a>
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