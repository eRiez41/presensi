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
    <title>Tambah Data Mahasiswa</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php include "menu_mahasiswa.php"; ?>
            </div>
        </div>
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Tambah Mahasiswa</h4>
            </div>
            <div class="card-body">

            <form action="insert_mahasiswa.php" method="POST">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                </div>
                <div class="mb-3">
                    <label for="nama_mahasiswa" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value=""> -- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki"> Laki-laki</option>
                        <option value="Perempuan"> Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan Tahun Masuk" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select class="form-control" id="prodi" name="prodi" required>
                        <option value=""> -- Pilih Prodi --</option>
                        <option value="Teknik Informatika"> Teknik Informatika</option>
                        <option value="Teknik Sipil"> Teknik Sipil</option>
                        <option value="Agro Teknologi"> Agro Teknologi</option>
                        <option value="Agri Bisnis"> Agri Bisnis</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
            </form>
            </div>
            </div>
        </div>
    </div>
</body>


</html>

<?php 
}
?>
