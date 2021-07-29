<main>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $id_pasien = $_POST['id_pasien'];


    if ($aksi == "Delete") {
        $delete_login = "DELETE from pasien where id_pasien='$id_pasien'";

        $delete_login_query = mysqli_query($connect, $delete_login);

        if ($delete_login_query) {
            header("location:dashboard.php?tabel_pasien=$tabel_pasien");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "SELECT * from pasien where id_pasien='$id_pasien'");
    ?>
    <div class="card">
        <div class="card-header">
            <br>
            <center>
                <h2>Update Data Pasien</h2>
            </center>
        </div>
        <div class="card-body">
            <form action="code/proses/update-delete/update/update_pasien.php" method="POST">

                <table id="tabel-pasien" class="table">
                    <?php
                    while ($isi = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><b>ID Pasien</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name='id_pasien' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $id_pasien; ?>" readonly></td>
                        </tr>

                        <tr>
                            <td><b>Nama Pasien</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name="nama_pasien" size="25px" maxlength="40" placeholder="Nama Pasien" value="<?php echo $isi['nama_pasien']; ?>" required></td>
                        </tr>

                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($isi['gender_pasien'] == "P") { ?>
                                    <input type="radio" name="gender_pasien" value="P" checked>&nbsp;Perempuan&nbsp;&nbsp;
                                    <input type="radio" name="gender_pasien" value="L">&nbsp;Laki-Laki</td>
                        <?php
                                } else { ?>
                            <input type="radio" name="gender_pasien" value="P">&nbsp;Perempuan&nbsp;&nbsp;
                            <input type="radio" name="gender_pasien" value="L" checked>&nbsp;Laki-Laki</td>
                        <?php
                                } ?>
                        </tr>

                        <tr>
                            <td><b>Alamat</b></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" name="alamat_pasien" cols="28" rows="5" maxlength="50" placeholder="Alamat" required><?php echo $isi['alamat_pasien']; ?></textarea></td>
                        </tr>

                        <tr>
                            <td><b>Umur</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name='umur_pasien' size="25px" maxlength="4" value="<?php echo $isi['umur_pasien']; ?>"></td>
                        </tr>

                        <tr>
                            <td><b>Telepon</b></td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" type="text" name='telepon_pasien' size="25px" maxlength="13" value="<?php echo $isi['telepon_pasien']; ?>">&nbsp;&nbsp;&nbsp; 
                            </td>
                        </tr>
                        <tr>
                            <td><input class="btn btn-success" type="submit" value="Update"></td>
                        </tr>                        
                </table><?php } ?>
            <?php
            }
            ?>
            </form>
        </div>
    </div>
</main>