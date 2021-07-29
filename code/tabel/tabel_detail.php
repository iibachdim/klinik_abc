<main>
<div class="card-body">
    <form action="dashboard.php?tabel_detail=$tabel_detail" method="post">
    </form>

    <br>
    <div class="table-responsive">
        <table id="daftar-table" class="table table-bordered table-striped">
            <tr>
                <th>No Pendaftaran</th>
                <th>Nama Pasien</th>
                <th>Nama Obat</th>
                <th>Dosis</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tools</th>
            </tr>

            <?php
            include "koneksi.php";

            $tampilkan_isi = "SELECT detail.no_pendaftaran, pasien.nama_pasien, obat.nama_obat, 
            detail.dosis, detail.jumlah, detail.subTotal 
            FROM detail
            LEFT JOIN pendaftaran ON detail.no_pendaftaran = pendaftaran.no_pendaftaran
            LEFT JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
            LEFT JOIN obat ON detail.id_obat = obat.id_obat";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $no_pendaftaran = $isi['no_pendaftaran'];
                $nama_pasien = $isi['nama_pasien'];
                $nama_obat = $isi['nama_obat'];
                $dosis = $isi['dosis'];
                $jumlah = $isi['jumlah'];
                $subTotal = $isi['subTotal'];

            ?>
                <tr class="isi">
                    <td><?php echo $no_pendaftaran ?></td>
                    <td><?php echo $nama_pasien ?></td>
                    <td><?php echo $nama_obat ?></td>
                    <td><?php echo $dosis ?></td>
                    <td><?php echo $jumlah ?></td>
                    <td><?php echo $subTotal ?></td>
                    <td>
                        <form action="dashboard.php?aksi_user=$aksi_user" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                            <input class="btn btn-info" name="proses" type="submit" value="Checkout">
                        </form>
                    </td>
                </tr>
                </form>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</main>