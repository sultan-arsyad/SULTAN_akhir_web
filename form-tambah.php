<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa | SMK Negeri 4 Tanjungpinang</title>
</head>
<body>
    <h3>Tambah Data Siswa</h3>
    <form action="proses-tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin" style="width: 100%" required>
                        <option value="" selected disabled>-- Pilih Salah Satu --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempat_lahir"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" style="width: 100%"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"></textarea></td>
            </tr>
        </table>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </form>
</body>
</html>