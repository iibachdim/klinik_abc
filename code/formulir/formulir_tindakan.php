<main>
<div class="card">
    <div class="card-header">
        <br>
        <center>
            <h2>Tambah Data Tindakan</h2>
        </center>
    </div>
    <div class="card-body">
        <form action="code/proses/input/input_tindakan.php" method="POST">
            <table id="tabel-tindakan" class="table" >
                <tr>
                    <td><b>ID Tindakan</b></td>
                </tr>

                <tr>
                    <td>

                        <?php include "koneksi.php";
                        $tampilkan_isi = "select count(id_tindakan) as jumlah from tindakan;";
                        $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                        $no = 1;

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $jumlah = $isi['jumlah'];
                        ?>

                            <input class="form-control" type="text" name='id_tindakan' maxlength="5" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

                    </td>
                </tr>
                <?php   } ?>

                <tr>
                    <td><b>Nama Tindakan</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="nama_tindakan" maxlength="30" placeholder="Nama Tindakan" required></td>
                </tr>

                <tr>
                    <td><b>Harga Tindakan</b></td>
                </tr>
                
                <tr>
                    <td><input class="form-control" type="number" name="harga_tindakan" maxlength="30" placeholder="Nama Tindakan" required></td>
                </tr>

                <tr>
                    <td><input class="btn btn-success" type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</main>