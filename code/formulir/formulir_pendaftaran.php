<main>
<div class="card">
    <div class="card-header">
        <br>
        <center>
            <h2>Tambah Data Pendaftaran</h2>
        </center>
    </div>
    <div class="card-body">
        <form action="code/proses/input/input_pendaftaran.php" method="POST">
            <table id="tabel-pendaftaran" class="table" >
                <tr>
                    <td><b>No Pendaftaran</b></td>
                </tr>

                <tr>
                    <td>

                        <?php include "koneksi.php";

                        $tampilkan_isi = "SELECT count(no_pendaftaran) as jumlah 
                        FROM pendaftaran";

                        $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                        $no = 1;

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $jumlah = $isi['jumlah'];
                        ?>

                            <input class="form-control" type="text" name='no_pendaftaran' maxlength="5" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

                    </td>
                </tr>
                <?php   } ?>

                <tr>
                    <td><b>Tindakan</b></td>
                </tr>

                <tr>
                    <td><select class="form-control" name="id_tindakan" required>
                        <option value="" disabled selected>Pilih Tindakan</option>

                        <?php include "koneksi.php";
                        $tampilkan_isi = "SELECT * from `tindakan`";
                        $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $id_tindakan = $isi['id_tindakan'];
                            $nama_tindakan = $isi['nama_tindakan'];
                        ?>
                            <option value="<?php echo $id_tindakan ?>"><?php echo $nama_tindakan ?>
                            <?php
                        }
                            ?>
                        </option>
                    </td>
                </tr>

                <tr>
                    <td><b>Nama Pasien</b></td>
                </tr>

                <tr>
                    <td>
                        <select class="form-control" name="id_pasien" required>
                        <option value="" disabled selected>Nama Pasien</option>

                        <?php include "koneksi.php";
                        $tampilkan_isi = "SELECT * from `pasien`";
                        $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $id_pasien = $isi['id_pasien'];
                            $nama_pasien = $isi['nama_pasien'];
                        ?>
                            <option value="<?php echo $id_pasien ?>"><?php echo $nama_pasien ?>
                            <?php
                        }
                            ?>
                        </option>
                    </td>
                </tr>
                <tr>
                    <td><input class="btn btn-success" type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</main>