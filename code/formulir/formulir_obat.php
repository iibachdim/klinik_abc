<main>
<div class="card">
    <div class="card-header">
        <br>
        <center>
            <h2>Tambah Data Obat</h2>
        </center>
    </div>
    <div class="card-body">
        <form action="code/proses/input/input_obat.php" method="POST">
            <table id="tabel-obat" class="table" >
                <tr>
                    <td><b>ID Obat</b></td>
                </tr>

                <tr>
                    <td>

                        <?php include "koneksi.php";
                        $tampilkan_isi = "select count(id_obat) as jumlah from obat;";
                        $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                        $no = 1;

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $jumlah = $isi['jumlah'];
                        ?>

                            <input class="form-control" type="text" name='id_obat' maxlength="5" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

                    </td>
                </tr>
                <?php   } ?>

                <tr>
                    <td><b>Nama Obat</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="nama_obat" maxlength="30" placeholder="Nama Obat" required></td>
                </tr>

                <tr>
                    <td><b>Jenis Obat</b></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="text" name="jenis_obat" maxlength="30" placeholder="Jenis Obat" required></td>
                </tr>

                <tr>
                    <td><b>Kategori</b></td>
                </tr>

                <tr>
                    <td>
                        <input type="radio" name="kategori" value="Bebas" required>&nbsp;Bebas&nbsp;&nbsp;
                        <input type="radio" name="kategori" value="Resep Dokter" required>&nbsp;Resep Dokter
                    </td>
                </tr>

                <tr>
                    <td><b>Harga Obat</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="number" name="harga_obat" size="25px" maxlength="13" placeholder="Harga Obat" required></td>
                </tr>

                <tr>
                    <td><b>Stok Obat</b></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="number" name="stok_obat" size="25px" maxlength="20" placeholder="Stok Obat" required></td>
                </tr>

                <tr>
                    <td><input class="btn btn-success" type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</main>