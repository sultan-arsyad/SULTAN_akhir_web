<?php
// Termasuk file konfigurasi
include("config.php");

// Mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// Mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM tb_siswa WHERE id = '$id'");
$siswa = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa | SMK Negeri 4 Tanjungpinang</title>
</head>
<body>
    <h3>Edit Data Siswa</h3>
    <form action="proses-edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
        <table border="0">
            <tr>
                <td>NIS</td>
                <td>
                    <input type="text" name="nis" value="<?php echo $siswa['nis']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <input type="text" name="nama_lengkap" value="<?php echo $siswa['nama_lengkap']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin" style="width: 100%" required>
                        <option value="" disabled>-- Pilih Salah Satu --</option>
                        <option value="L" <?php echo ($siswa['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?php echo ($siswa['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>
                    <input type="text" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir']; ?>">
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    <input type="date" name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir']; ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat"><?php echo $siswa['alamat']; ?></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
