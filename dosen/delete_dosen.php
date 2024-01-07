<?php
include "../config/koneksi.php";
/* Mengambil nilai nidn dari parameter get
yang dikirim dari tampil dosen
*/
$nidn = $_GET['nidn'];
//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tbl_dosen WHERE
nidn='$_GET[nidn]'");
if ($delete) {
    //Jika proses delete berhasil

    header("location:../tampil_dosen.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='../tampil_dosen.php'>Coba Lagi</a>";
}
?>