<main>
<div class="card-body">
    <form action="dashboard.php?tabel_obat=$tabel_obat" method="post">
        <a href="dashboard.php?formulir_obat=$formulir_obat"><input class="btn btn-dark" type="button" value="Tambah"></a>
    </form>

    <br>
    <div class="table-responsive">
        <table id="daftar-table" class="table table-bordered table-striped">
            <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Jenis Obat</th>
                <th>kategori</th>
                <th>Harga Obat</th>
                <th>Stok</th>
                <?php
                if ($_SESSION['level'] == "Admin") {
                ?>
                    <th>Tools</th>
                <?php } ?>
	        </tr>

            <?php
            include "koneksi.php";

            $tampilkan_isi = "select * from obat";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $id_obat = $isi['id_obat'];
                $nama_obat = $isi['nama_obat'];
                $jenis_obat = $isi['jenis_obat'];
                $kategori = $isi['kategori'];
                $harga_obat = $isi['harga_obat'];
                $stok_obat = $isi['stok_obat'];

            ?>
                <tr class="isi">
                    <td><?php echo $id_obat ?></td>
                    <td><?php echo $nama_obat ?></td>
                    <td><?php echo $jenis_obat ?></td>
                    <td><?php echo $kategori ?></td>
                    <td>Rp. <?php echo $harga_obat ?></td>
                    <td><?php echo $stok_obat ?></td>
                    <?php
                    if ($_SESSION['level'] == "Admin") {
                    ?>
                    <td>
                        <form action="dashboard.php?aksi_obat=$aksi_obat" method="post">
                            <input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>">
                            <input class="btn btn-info" name="proses" type="submit" value="Update">
                            <input class="btn btn-danger" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data obat <?php echo $nama_obat; ?> ?')">
                        </form>
                    </td>
                <?php } ?>
		        </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</main>