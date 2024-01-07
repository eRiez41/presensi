<?php
session_start();
if(empty($_SESSION['username']) AND empty($_SESSION['password']) ){
echo "<script>alert('Anda tidak memiliki akses'); window.location =
'../login.php'</script>";
}else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data matakuliah</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu_matakuliah.php"; ?>
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header">Edit Data matakuliah</div>
            <div class="card-body text-success">
                <div class="row">
                    <div class="col-md-5 ">
                        <form method="POST" action="update_matakuliah.php">
                            <?php
                            include "../config/koneksi.php";
                            $kode_matakuliah = $_GET['kode_matakuliah'];
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah WHERE kode_matakuliah='$kode_matakuliah'");

                            if (!$tampil) {
                                die("Query error: " . mysqli_error($koneksi));
                            }

                            $data = mysqli_fetch_array($tampil);

                            if (!$data) {
                                die("Data not found for kode_matakuliah=$kode_matakuliah");
                            }
                            ?>
                            <div class="mb-3 mt-3">
                                <label for="kode_matakuliah" class="form-label">kode_matakuliah :</label>
                                <input type="hidden" name="kode_matakuliah_tmp" value="<?= $data['kode_matakuliah'] ?>" class="form-control" id="kode_matakuliah_tmp" required>
                                <input type="text" name="kode_matakuliah" value="<?= $data['kode_matakuliah'] ?>" class="form-control" id="kode_matakuliah" placeholder="Masukan kode_matakuliah" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama_matakuliah" class="form-label">Nama Lengkap :</label>
                                <input type="text" name="nama_matakuliah" value="<?= $data['nama_matakuliah'] ?>"
                                    class="form-control" id="nama_matakuliah" placeholder="Masukan Nama matakuliah"
                                    required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="sks" class="form-label">SKS :</label>
                                <input type="text" name="sks" value="<?= $data['sks'] ?>"
                                    class="form-control" id="sks" placeholder="Masukan Jumlah SKS"
                                    required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="jenis" class="form-label">Jenis matakuliah :</label>
                                <select for="jenis" name="jenis" class="form-control"
                                    id="jenis">
                                    <option value="<?= $data['jenis'] ?>">
                                        <?= $data['jenis'] ?>
                                    </option>
                                    <option value=""> -- Pilih Jenis Mata Kuliah --</option>
                                    <option value="wajib"> Wajib</option>
                                    <option value="pilhan"> Pilihan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <a href="../tampil_matakuliah.php" class="btn btn-warning">Kembali</a> <button type="submit" 
                                    class="btn btn-primary">Perbaharui</button>
                            </div>
                        </form>
                    </div>
                </div>
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