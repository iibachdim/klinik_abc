<?php
include "../../../koneksi.php";
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$gender_pasien = $_POST['gender_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];
$telepon_pasien = $_POST['telepon_pasien'];
$umur_pasien = $_POST['umur_pasien'];

$insertLogin = "INSERT INTO pasien values ('$id_pasien','$nama_pasien','$alamat_pasien','$gender_pasien','$umur_pasien','$telepon_pasien')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../dashboard.php?tabel_pasien=$tabel_pasien');
}
else
{
	echo "Insert gagal dijalankan";
}

?>