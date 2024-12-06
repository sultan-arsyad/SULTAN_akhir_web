<?php
session_start(); // Mulai sesi
// Menghubungkan file ini dengan file konfigurasi database
include("config.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if (isset($_POST['simpan'])) {
    /* Mengambil nilai dari form input
       dan menyimpannya ke dalam variabel */
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // Menyusun query SQL untuk menambahkan data ke tabel 'tb_siswa'
    $sql = "INSERT INTO tb_siswa 
            (nis, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
            VALUES ('$nis', '$nama_lengkap', '$jk', '$tempat_lahir', '$tanggal_lahir', '$alamat')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data siswa berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data siswa gagal ditambahkan!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>