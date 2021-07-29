<?php
include "../../../koneksi.php";
$no_pendaftaran = $_POST['no_pendaftaran'];
$harga_tindakan = $_POST['harga_tindakan'];
$id_obat = $_POST['id_obat'];
$dosis = $_POST['dosis'];
$jumlah = $_POST['jumlah'];

$cari_harga = "SELECT harga_obat FROM `obat` WHERE id_obat = $id_obat";
$cari_harga_sql = mysqli_query($connect,$cari_harga);

while($isi = mysqli_fetch_array($cari_harga_sql)) 
{
    $harga_obat = $isi['harga_obat'];
}

$subTotal = $harga_tindakan + ($harga_obat * $jumlah);
    
$insertDetail = "INSERT INTO detail values ($no_pendaftaran,$id_obat,'$dosis',$jumlah,$subTotal)";
$insertDetail_query = mysqli_query($connect,$insertDetail);

if ($insertDetail_query)
{
    header('location:../../../dashboard.php?tabel_detail=$tabel_detail');
}
else
{
    echo "Insert gagal dijalankan";
}
?>