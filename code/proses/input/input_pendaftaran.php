<?php
include "../../../koneksi.php";
$no_pendaftaran = $_POST['no_pendaftaran'];
$id_tindakan = $_POST['id_tindakan'];
$id_pasien = $_POST['id_pasien'];
session_start();
$id_user = $_SESSION['id_user'];

$insertLogin = "INSERT INTO pendaftaran values ('$no_pendaftaran','$id_tindakan',now(),'$id_pasien','$id_user')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../dashboard.php?tabel_pendaftaran=$tabel_pendaftaran');
}
else
{
	echo "Insert gagal dijalankan";
}

?>