<?php
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['password']) || $_SESSION['level'] !== 'admin') {
    echo "<script>alert('Anda tidak memiliki akses'); window.location = '../dashboard.php'</script>";
} else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data matakuliah</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu_matakuliah.php"; ?>
            </div>
        </div>
        <div class="card border-danger mb-4">
            <div class="card-header bg-danger text-white">
                <h4 class="m-0">Tambah Mata Kuliah</h4>
            </div>
            <div class="card-body">
                <form action="insert_matakuliah.php" method="POST">
                    <div class="mb-3">
                                <label for="kode_matakuliah" class="form-label">Kode Mata Kuliah:</label>
                                <input type="text" name="kode_matakuliah" class="form-control" id="kode_matakuliah"
                                    placeholder="Masukkan Kode Mata Kuliah" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama_matakuliah" class="form-label">Nama Mata Kuliah:</label>
                                <input type="text" name="nama_matakuliah" class="form-control" id="nama_matakuliah"
                                    placeholder="Masukkan Nama Mata Kuliah" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="sks" class="form-label">SKS:</label>
                                <input type="text" name="sks" class="form-control" id="sks"
                                    placeholder="Masukkan Jumlah SKS" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Mata Kuliah:</label>
                                <select name="jenis" class="form-control" id="jenis" required>
                                    <option value="">-- Pilih Jenis Mata Kuliah --</option>
                                    <option value="Wajib">Wajib</option>
                                    <option value="Pilihan">Pilihan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <a href="../tampil_matakuliah.php" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php 
}
?>