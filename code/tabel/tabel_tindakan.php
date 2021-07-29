<main>
<div class="card-body">
    <form action="dashboard.php?tabel_tindakan=$tabel_tindakan" method="post">
        <a href="dashboard.php?formulir_tindakan=$formulir_tindakan"><input class="btn btn-dark" type="button" value="Tambah"></a>
    </form>

    <br>
    <div class="table-responsive">
        <table id="daftar-table" class="table table-bordered table-striped">
            <tr>
                <th>ID Tindakan</th>
                <th>Nama Tindakan</th>
                <th>Harga Tindakan</th>
                <th>Tools</th>
            </tr>

            <?php
            include "koneksi.php";

            $tampilkan_isi = "select * from tindakan";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $id_tindakan = $isi['id_tindakan'];
                $nama_tindakan = $isi['nama_tindakan'];
                $harga_tindakan = $isi['harga_tindakan'];
            ?>
                <tr class="isi">
                    <td><?php echo $id_tindakan ?></td>
                    <td><?php echo $nama_tindakan ?></td>
                    <td>Rp. <?php echo $harga_tindakan ?></td>
                    <td>
                        <form action="dashboard.php?aksi_tindakan=$aksi_tindakan" method="post">
                            <input type="hidden" name="KodePasien" value="<?php echo $id_tindakan; ?>">
                            <input class="btn btn-info" name="proses" type="submit" value="Update">
                            <input class="btn btn-danger" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data pasien bernama <?php echo $nama_pasien; ?> ?')">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</main>