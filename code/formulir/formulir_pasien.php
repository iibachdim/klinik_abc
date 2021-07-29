<main>
<div class="card">
    <div class="card-header">
        <br>
        <center>
            <h2>Tambah Data Pasien</h2>
        </center>
    </div>
    <div class="card-body">
        <form action="code/proses/input/input_pasien.php" method="POST">
            <table id="tabel-pasien" class="table" >
                <tr>
                    <td><b>ID Pasien</b></td>
                </tr>

                <tr>
                    <td>

                        <?php include "koneksi.php";
                        $tampilkan_isi = "select count(id_pasien) as jumlah from pasien;";
                        $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                        $no = 1;

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $jumlah = $isi['jumlah'];
                        ?>

                            <input class="form-control" type="text" name='id_pasien' maxlength="5" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

                    </td>
                </tr>
                <?php   } ?>

                <tr>
                    <td><b>Nama Pasien</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="nama_pasien" maxlength="30" placeholder="Nama Pasien" required></td>
                </tr>

                <tr>
                    <td><b>Jenis Kelamin</b></td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="gender_pasien" value="P" required>&nbsp;Perempuan&nbsp;&nbsp;
                        <input type="radio" name="gender_pasien" value="L">&nbsp;Laki-Laki</td>
                </tr>

                <tr>
                    <td><b>Umur Pasien</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="umur_pasien" size="25px" maxlength="20" placeholder="Umur Pasien" required></td>
                </tr>

                <tr>
                    <td><b>Alamat</b></td>
                </tr>

                <tr>
                    <td><textarea class="form-control" name="alamat_pasien" cols="28" rows="5" maxlength="50" placeholder="Alamat" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td><b>Telepon</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="telepon_pasien" size="25px" maxlength="13" placeholder="No Telepon" required></td>
                </tr>

                <tr>
                    <td><input class="btn btn-success" type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</main>