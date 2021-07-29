<?php
include "../../../koneksi.php";
$id_obat = $_POST['id_obat'];
$nama_obat = $_POST['nama_obat'];
$jenis_obat = $_POST['jenis_obat'];
$kategori = $_POST['kategori'];
$harga_obat = $_POST['harga_obat'];
$stok_obat = $_POST['stok_obat'];

$insertLogin = "INSERT INTO obat values ('$id_obat','$nama_obat','$jenis_obat','$kategori','$harga_obat','$stok_obat')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../dashboard.php?tabel_obat=$tabel_obat');
}
else
{
	echo "Insert gagal dijalankan";
}

?>