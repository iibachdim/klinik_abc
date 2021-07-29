<?php
include "../../../../koneksi.php";
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

session_start();
if($_SESSION['level']=="Admin")
{
$updateLogin = "UPDATE useradmin set id_user='$id_user', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password', level='$level' where id_user='$id_user'";

}
else
{
$updateLogin = "UPDATE useradmin set id_user='$id_user', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password' where id_user='$id_user'";
}

$updateLogin_query = mysqli_query($connect,$updateLogin);

if ($updateLogin_query)
{
	if($_SESSION['level']!="Admin")
	{
	header('location:../../../../dashboard.php?informasi_akun=$informasi_akun');
	}
	else
	{
	header('location:../../../../dashboard.php?tabel_user=$tabel_user');
	}
}
else
{
	echo "Update gagal dijalankan";
}

?>