<main>
<div class="card-body">
    <form action="dashboard.php?tabel_pasien=$tabel_pasien" method="post">
        <a href="dashboard.php?formulir_pasien=$formulir_pasien"><input class="btn btn-dark" type="button" value="Tambah"></a>
    </form>

    <br>
    <div class="table-responsive">
        <table id="daftar-table" class="table table-bordered table-striped">
            <tr>
                <th>Kode Pasien</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Telepon</th>
                <th>Tools</th>
            </tr>

            <?php
            include "koneksi.php";

            $tampilkan_isi = "select * from pasien";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $id_pasien = $isi['id_pasien'];
                $nama_pasien = $isi['nama_pasien'];
                $alamat_pasien = $isi['alamat_pasien'];
                $gender_pasien = $isi['gender_pasien'];
                $umur_pasien = $isi['umur_pasien'];
                $telepon_pasien = $isi['telepon_pasien'];

            ?>
                <tr class="isi">
                    <td><?php echo $id_pasien ?></td>
                    <td><?php echo $nama_pasien ?></td>
                    <td><?php echo $alamat_pasien ?></td>
                    <td><?php
                        if ($gender_pasien == "L") {
                            echo "Laki-Laki";
                        } else {
                            echo "Perempuan";
                        }
                        ?></td>
                    <td><?php echo $umur_pasien ?></td>
                    <td><?php echo $telepon_pasien ?></td>
                    <td>
                        <form action="dashboard.php?aksi_pasien=$aksi_pasien" method="post">
                            <input type="hidden" name="KodePasien" value="<?php echo $id_pasien; ?>">
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