<?php
include "../../../koneksi.php";
$id_tindakan = $_POST['id_tindakan'];
$nama_tindakan = $_POST['nama_tindakan'];
$harga_tindakan = $_POST['harga_tindakan'];

$insertLogin = "INSERT INTO tindakan values ('$id_tindakan','$nama_tindakan','$harga_tindakan')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../dashboard.php?tabel_tindakan=$tabel_tindakan');
}
else
{
	echo "Insert gagal dijalankan";
}

?>