<?php
include "../../../koneksi.php";
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$insertLogin = "INSERT INTO useradmin values ('$id_user','$nama','$jenis_kelamin','$alamat','$no_telp','$username','$password','$level')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../dashboard.php?tabel_user=$tabel_user');
}
else
{
	echo "Insert gagal dijalankan";
}

?>