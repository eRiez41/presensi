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
    <title>Edit Data dosen</title>
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
            <div class="card-header">Edit Data dosen</div>
            <div class="card-body text-success">
                <div class="row">
                    <div class="col-md-5 ">
                        <form method="POST" action="update_dosen.php">
                            <?php
                            include "../config/koneksi.php";
                            $nidn = $_GET['nidn'];
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dosen WHERE nidn='$nidn'");

                            if (!$tampil) {
                                die("Query error: " . mysqli_error($koneksi));
                            }

                            $data = mysqli_fetch_array($tampil);

                            if (!$data) {
                                die("Data not found for nidn=$nidn");
                            }
                            ?>
                            <div class="mb-3 mt-3">
                                <label for="nidn" class="form-label">NIDN :</label>
                                <input type="hidden" name="nidn_tmp" value="<?= $data['nidn'] ?>" class="form-control" id="nidn_tmp" required>
                                <input type="text" name="nidn" value="<?= $data['nidn'] ?>" class="form-control" id="nidn" placeholder="Masukan nidn" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="nama_dosen" class="form-label">Nama Lengkap :</label>
                                <input type="text" name="nama_dosen" value="<?= $data['nama_dosen'] ?>"
                                    class="form-control" id="nama_dosen" placeholder="Masukan Nama dosen"
                                    required>
                            </div>
                            <div class="mb-3 mt-3">

                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                                <select for="jenis_kelamin" name="jenis_kelamin" class="form-control"
                                    id="jenis_kelamin">
                                    <option value="<?= $data['jenis_kelamin'] ?>">
                                        <?= $data['jenis_kelamin'] ?>
                                    </option>
                                    <option value=""> -- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki"> Laki-laki</option>
                                    <option value="Perempuan"> Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <input type="text" name="alamat" value="<?= $data['alamat'] ?>"
                                    class="form-control" id="alamat" placeholder="Masukan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp:</label>
                                <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>"
                                    class="form-control" id="no_hp" placeholder="Masukan No HP"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
                                <input type="text" name="pendidikan_terakhir" value="<?= $data['pendidikan_terakhir'] ?>"
                                    class="form-control" id="pendidikan_terakhir" placeholder="Masukan Pendidikan terakhir " required>
                            </div>
                            <div class="mb-3">
                                <label for="gelar" class="form-label">Gelar:</label>
                                <input type="text" name="gelar" value="<?= $data['gelar'] ?>"
                                    class="form-control" id="gelar" placeholder="Masukan Gelar " required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi:</label>
                                <select name="prodi" class="form-control" id="prodi" required>
                                    <option value="<?= $data['prodi'] ?>">
                                        <?= $data['prodi'] ?>
                                    </option>
                                    <option value=""> -- Pilih Prodi --</option>
                                    <option value="Teknik Informatika"> Teknik Informatika</option>
                                    <option value="Teknik Sipil"> Teknik Sipil</option>
                                    <option value="Agro Teknologi"> Agro Teknologi</option>
                                    <option value="Agri Bisnis"> Agri Bisnis</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <a href="../tampil_dosen.php" class="btn btn-warning">Kembali</a> <button type="submit" 
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