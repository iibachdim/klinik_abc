<main>
<div class="card-body">
    <form action="dashboard.php?tabel_pendaftaran=$tabel_pendaftaran" method="post">
        <a href="dashboard.php?formulir_pendaftaran=$formulir_pendaftaran"><input class="btn btn-dark" type="button" value="Tambah"></a>
    </form>

    <br>
    <div class="table-responsive">
        <table id="daftar-table" class="table table-bordered table-striped">
            <tr>
                <th>No Pendaftaran</th>
                <th>Nama Tindakan</th>
                <th>Waktu Pendaftaran</th>
                <th>Nama Pasien</th>
                <th>Tools</th>
            </tr>

            <?php
            include "koneksi.php";

            $tampilkan_isi = "SELECT pendaftaran.no_pendaftaran, tindakan.nama_tindakan, pendaftaran.waktu_daftar, pasien.nama_pasien 
            FROM `pendaftaran` 
            LEFT JOIN tindakan ON pendaftaran.id_tindakan = tindakan.id_tindakan 
            LEFT JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien";

            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $no_pendaftaran = $isi['no_pendaftaran'];
                $nama_tindakan = $isi['nama_tindakan'];
                $waktu_daftar = $isi['waktu_daftar'];
                $nama_pasien = $isi['nama_pasien'];
            ?>
                <tr class="isi">
                    <td><?php echo $no_pendaftaran ?></td>
                    <td><?php echo $nama_tindakan ?></td>
                    <td><?php echo $waktu_daftar ?></td>
                    <td><?php echo $nama_pasien ?></td>
                    <td>
                        <form action="dashboard.php?aksi_pendaftaran=$aksi_pendaftaran" method="post">
                            <input type="hidden" name="KodePasien" value="<?php echo $no_pendaftaran; ?>">
                            <input class="btn btn-success" name="proses" type="submit" value="Proses">
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