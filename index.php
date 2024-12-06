<?php
// menghubungkan file config dengan index 
include ("config.php");
session_start(); //mulai sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data siswa | SMK Negeri 4 TanjungPinang</title>
    <style>
        /* membuat styling pada table*/
        table,th,td{
     border: 1px solid;
     border-collapse: collapse;
     padding: 10px;
        }
    </style>      
</head>
<body>
<h2>Data Siswa</h2>
<!-- Tampilkan Notifikasi Jika Ada -->
<?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- Hapus notifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
<?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>L/P</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th><a href="form-tambah.php">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM tb_siswa");
        /* perulangan while akan terus berjalan (menampilkan data) 
        selama kondisi $query bernilai true (adanya data pada 
        table tb_siswa) */
        while ($siswa = $query->fetch_assoc()){
            /* fungsi fetch_assoc digunakan untuk mengambil 
            data perulangan dalam bentuk array */
        ?>
        <!-- kode PHP ditutup untuk menyiapkan kode HTML
        yang akan di looping menggunakan while loop -->

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $siswa['nis']?></td>
            <td><?php echo $siswa['nama_lengkap']?></td>
            <td><?php echo $siswa ['jenis_kelamin']?></td>
            <td><?php echo $siswa['tempat_lahir']?></td>

            <td><?php echo date ("d-m-Y",
            strtotime($siswa['tanggal_lahir']));?>
            </td>
            <td><?php echo $siswa['alamat']?></td>
        
        <td align="center">
            <!-- URL ke halaman edit data dengan menggunakan 
            parameter id pada kolom table -->
            <a href="form-edit.php?id=<?php echo $siswa['id'] ?>">Edit</a>
            <!-- URL untuk menghapus data dengan menggunakan parameter id 
            pada kolom table dan alert konfirmasi hapus data -->
            <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="hapus.php?id=<?php echo $siswa['id'] ?>">Hapus</a>
        </td>
    </tr>
<?php
    } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
?>
</tbody>
</table>
<!-- Menghitung jumlah baris yang ada pada table (calon_siswa) -->
<p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>