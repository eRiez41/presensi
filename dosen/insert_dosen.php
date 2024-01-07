<?php
include "../config/koneksi.php";

// Memasukkan setiap data inputan ke dalam setiap variabel
$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama_dosen'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$gelar = $_POST['gelar'];
$prodi = $_POST['prodi'];

// Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tbl_dosen
(nidn,
nama_dosen,
jenis_kelamin,
alamat,
no_hp,
pendidikan_terakhir,
gelar,
prodi)
VALUES
('$nidn',
'$nama_dosen',
'$jenis_kelamin',
'$alamat',
'$no_hp',
'$pendidikan_terakhir',
'$gelar',
'$prodi')");

if ($insert) {
    // Jika proses insert berhasil
    header("location:../tampil_dosen.php");
} else {
    // Jika proses insert gagal
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    echo "<p>Gagal Menyimpan!</p>";
    echo "<a href='../tampil_dosen.php'>Coba Lagi</a>";
}

?>
