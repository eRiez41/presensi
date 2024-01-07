<?php
include "../config/koneksi.php";

// Memasukkan setiap data inputan ke dalam setiap variabel
$nidn_tmp = $_POST['nidn_tmp'];
$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama_dosen'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$gelar = $_POST['gelar'];
$prodi = $_POST['prodi'];

// Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tbl_dosen SET
  nidn='$nidn',
  nama_dosen='$nama_dosen',
  jenis_kelamin='$jenis_kelamin',
  alamat='$alamat',
  no_hp='$no_hp',
  pendidikan_terakhir='$pendidikan_terakhir',
  gelar='$gelar',
  prodi='$prodi'
  WHERE nidn='$nidn_tmp'
");

if ($update) {
    // Jika proses update berhasil
    header("location:../tampil_dosen.php");
} else {
    // Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='../tampil_dosen.php'>Coba Lagi</a>";
}
?>
