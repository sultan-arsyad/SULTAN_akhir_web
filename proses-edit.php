<?php
session_start(); // Mulai sesi
include("config.php");

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // Buat query untuk memperbarui data siswa
    $sql = "UPDATE tb_siswa SET
            nis='$nis',
            nama_lengkap='$nama_lengkap',
            jenis_kelamin='$jk',
            tempat_lahir='$tempat_lahir',
            tanggal_lahir='$tanggal_lahir',
            alamat='$alamat'
            WHERE id=$id";

    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data siswa berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data siswa gagal diperbarui!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>