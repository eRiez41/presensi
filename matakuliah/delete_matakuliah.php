<?php
include "../config/koneksi.php";
/* Mengambil nilai kode_matakuliah dari parameter get
yang dikirim dari tampil matakuliah
*/
$kode_matakuliah = $_GET['kode_matakuliah'];
//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_matakuliah WHERE
kode_matakuliah='$_GET[kode_matakuliah]'");
if ($delete) {
    //Jika proses delete berhasil

    header("location:../tampil_matakuliah.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='../tampil_matakuliah.php'>Coba Lagi</a>";
}
?>