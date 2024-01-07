<?php


// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Ambil nama lengkap dari sesi
    $nama_lengkap = isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : '';

    // Jika nama lengkap tidak tersedia, gunakan username
    $nama_tampilan = !empty($nama_lengkap) ? $nama_lengkap : $_SESSION['username'];
} else {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php">CRUD | Hallo <?php echo ucwords($nama_tampilan); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Semua Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="tampil_mahasiswa.php">Data Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="tampil_dosen.php">Data Dosen</a></li>
                        <li><a class="dropdown-item" href="tampil_matakuliah.php">Data Mata Kuliah</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn" href="logout.php" style="background-color: red; color: white;">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
