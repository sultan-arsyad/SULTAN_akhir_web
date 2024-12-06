<?php
//menentukan nama host, biasanya "localhost"
$server = "localhost";
//kata sandi untuk pengguna mysql(default: root)
$user = "root";
//kata sandi untuk pengguna mysql
$password = "";
//nama basis data yang akan dihubungakan 
$nama_database = "data_siswa";
//mencoba untuk membuat koneksi basisdata 
$db = mysqli_connect ($server,$user,$password,$nama_database);
//memeriksa apakah koneksi berhasil 
if (!$db){
    die ("gagal terhubung dengan database:". mysqli_connect_eror());

}
?>
