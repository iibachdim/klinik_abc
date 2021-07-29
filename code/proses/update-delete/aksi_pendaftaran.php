<main>
    <?php 
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $no_pendaftaran = $_POST['no_pendaftaran'];

    if ($aksi == "proses") {
        include "koneksi.php";

        $query = mysqli_query($connect, "SELECT pendaftaran.no_pendaftaran, pasien.id_pasien, 
        pasien.nama_pasien, tindakan.id_tindakan, tindakan.nama_tindakan, tindakan.harga_tindakan
        FROM pendaftaran 
        LEFT JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
        LEFT JOIN tindakan ON pendaftaran.id_tindakan = tindakan.id_tindakan 
        WHERE no_pendaftaran='$no_pendaftaran'");

    ?>
    <div class="card">
        <div class="card-header">
            <br>
            <center>
                <h2>Proses Pendaftaran</h2>
            </center>
        </div>
        <div class="card-body">
            <form action="code/proses/input/input_detail.php" method="POST">
                <table id="tabel-detail" class="table" >
                    <?php 
                    while ($isi = mysqli_fetch_array($query)) {
                        $no_pendaftaran = $isi['no_pendaftaran'];
                        $id_pasien = $isi['id_pasien'];
                        $nama_pasien = $isi['nama_pasien'];
                        $harga_tindakan = $isi['harga_tindakan'];
                        $nama_tindakan = $isi['nama_tindakan'];
                    ?>
                    <tr>
                        <td><b>No Pendaftaran</b></td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control" type="text" name='no_pendaftaran' style="background-color:#E0DFDF" value="<?php echo $no_pendaftaran ?>" readonly>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><b>Nama Pasien</b></td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control" type="text" name='nama_pasien' style="background-color:#E0DFDF" value="<?php echo $nama_pasien ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Tindakan</b></td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control" type="text" name='nama_tindakan' style="background-color:#E0DFDF" value="<?php echo $nama_tindakan ?>" readonly>
                        </td>
                        <tr>
                        <td>
                            <input class="form-control" type="text" name='harga_tindakan' style="background-color:#E0DFDF" value="<?php echo $harga_tindakan ?>" readonly>
                        </td>
                    </tr>
                    </tr>

                    <tr>
                        <td><b>Nama Obat</b></td>
                    </tr>

                    <tr>
                        <td><select class="form-control" name="id_obat" required>
                            <option value="" disabled selected>Pilih Obat</option>

                            <?php 
                            include "koneksi.php";
                            $tampilkan_isi = "SELECT * FROM `obat`";
                            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                            while($obat = mysqli_fetch_array($tampilkan_isi_sql)) {
                                $id_obat = $obat['id_obat'];
                                $nama_obat = $obat['nama_obat'];
                                $harga_obat = $obat['harga_obat'];
                            ?>
                            <option value="<?php echo $id_obat ?>"><?php echo $nama_obat ?> | <?php echo $harga_obat ?>
                            <?php } ?>
                            </option>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Jumlah Obat</b></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="number" name="jumlah" size="25px" placeholder="Jumlah" required></td>
                    </tr>
                    <tr>
                        <td><b>Dosis</b></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="dosis" size="25px" placeholder="Dosis" required></td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-info" type="submit" value="Simpan"></td>
                    </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
    </div>
    <?php } ?>
</main>