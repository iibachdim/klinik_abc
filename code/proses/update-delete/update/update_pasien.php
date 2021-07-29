<?php
include "../../../../koneksi.php";
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];
$gender_pasien = $_POST['gender_pasien'];
$umur_pasien = $_POST['umur_pasien'];
$telepon_pasien = $_POST['telepon_pasien'];

$updatePasien = "UPDATE pasien set id_pasien='$id_pasien' , nama_pasien='$nama_pasien', alamat_pasien='$alamat_pasien' , gender_pasien='$gender_pasien' , umur_pasien='$umur_pasien' , telepon_pasien='$telepon_pasien' where id_pasien='$id_pasien'";

$updatePasien_query = mysqli_query($connect,$updatePasien);

if ($updatePasien_query)
{
	header('location:../../../../dashboard.php?tabel_pasien=$tabel_pasien');
}
else
{
	echo "Update gagal dijalankan";
}

?>