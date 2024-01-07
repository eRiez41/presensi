<?php
include "../config/koneksi.php";
/* memasukan setiap data inputan kedalam
setiap variabel
*/
$nim_tmp = $_POST['nim_tmp'];
$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];

$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tahun_masuk = $_POST['tahun_masuk'];
$prodi = $_POST['prodi'];
//Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET
nim='$nim',
nama_mahasiswa='$nama_mahasiswa',
jenis_kelamin='$jenis_kelamin',
tempat_lahir='$tempat_lahir',
tanggal_lahir='$tanggal_lahir',
tahun_masuk='$tahun_masuk',
prodi='$prodi'
WHERE nim='$nim_tmp'
");
if ($update) {
    //Jika proses delete berhasil
    header("location:../tampil_mahasiswa.php");
} else {
    //Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='../tampil_mahasiswa.php'>Coba Lagi</a>";
}
?>