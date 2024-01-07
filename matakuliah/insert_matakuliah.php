<?php
include "../config/koneksi.php";

// Memasukkan setiap data inputan ke dalam setiap variabel
$kode_matakuliah = $_POST['kode_matakuliah'];
$nama_matakuliah = $_POST['nama_matakuliah'];
$sks = $_POST['sks'];
$jenis = $_POST['jenis'];


// Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tbl_matakuliah
(kode_matakuliah,
nama_matakuliah,
sks,
jenis)
VALUES
('$kode_matakuliah',
'$nama_matakuliah',
'$sks',
'$jenis')");

if ($insert) {
    // Jika proses insert berhasil
    header("location:../tampil_matakuliah.php");
} else {
    // Jika proses insert gagal
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    echo "<p>Gagal Menyimpan!</p>";
    echo "<a href='../tampil_matakuliah.php'>Coba Lagi</a>";
}

?>
