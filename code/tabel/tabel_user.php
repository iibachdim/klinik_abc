<main>
<div class="card-body">
    <form action="dashboard.php?tabel_user=$tabel_user" method="post">
        <a href="dashboard.php?formulir_user=$formulir_user"><input class="btn btn-dark" type="button" value="Tambah"></a>
    </form>

    <br>
    <div class="table-responsive">
        <table id="daftar-table" class="table table-bordered table-striped">
            <tr>
                <th class="normal">ID User</th>
                <th class="normal">Nama</th>
                <th class="normal">Jenis Kelamin</th>
                <th class="normal">Alamat</th>
                <th class="normal">Telepon</th>
                <th class="normal">Username</th>
                <th class="normal">Level User</th>
                <th class="normal">Tools</th>
            </tr>

            <?php
            include "koneksi.php";

            $tampilkan_isi = "select * from useradmin";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $id_user = $isi['id_user'];
                $nama = $isi['nama'];
                $jenis_kelamin = $isi['jenis_kelamin'];
                $alamat = $isi['alamat'];
                $no_telp = $isi['no_telp'];
                $username = $isi['username'];
                $password = $isi['password'];
                $level = $isi['level'];

            ?>
                <tr class="isi" align='left'>
                    <td><?php echo $id_user ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php
                        if ($jenis_kelamin == "L") {
                            echo "Laki-Laki";
                        } else {
                            echo "Perempuan";
                        }
                        ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $no_telp ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $level ?></td>
                    <td>
                        <form action="dashboard.php?aksi_user=$aksi_user" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                            <input class="btn btn-info" name="proses" type="submit" value="Update">
                            <input class="btn btn-danger" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data account bernama <?php echo $nama; ?> ?')">
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