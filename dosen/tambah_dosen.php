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
    <title>Tambah Data Dosen</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu_dosen.php"; ?>
            </div>
        </div>
        <div class="card border-warning mb-4">
            <div class="card-header bg-warning text-white">
                <h4 class="m-0">Tambah Dosen</h4>
            </div>
            <div class="card-body">
                <form action="insert_dosen.php" method="POST">
                    <div class="mb-3">
                                <label for="nidn" class="form-label">NIDN:</label>
                                <input type="text" name="nidn" class="form-control" id="nidn" placeholder="Masukkan NIDN" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama" class="form-label">Nama Dosen:</label>
                                <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Masukkan Nama Dosen" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp:</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan No Hp" required>
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
                                <input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir"
                                    placeholder="Masukkan Pendidikan Terakhir" required>
                            </div>
                            <div class="mb-3">
                                <label for="gelar" class="form-label">Gelar:</label>
                                <input type="text" name="gelar" class="form-control" id="gelar" placeholder="Masukkan Gelar" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi:</label>
                                <select name="prodi" class="form-control" id="prodi" required>
                                    <option value="">-- Pilih Prodi --</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                    <option value="Agro Teknologi">Agro Teknologi</option>
                                    <option value="Agri Bisnis">Agri Bisnis</option>
                                </select>
                            </div>
                                <a href="../tampil_dosen.php" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
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