<main>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $id_user = $_POST['id_user'];


    if ($aksi == "delete") {
        $delete_login = "DELETE from useradmin where id_user='$id_user'";

        $delete_login_query = mysqli_query($connect, $delete_login);

        if ($delete_login_query) {
            header("location:dashboard.php?tabel_user=$tabel_user");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from useradmin where id_user='$id_user'");
    ?>
    <div class="card">
        <div class="card-header">
            <br>
            <center>
                <h2>Update Data User</h2>
            </center>
        </div>
        <div class="card-body">
            <form action="code/proses/update-delete/update/update_user.php" method="POST">

                <table id="tabel-user" class="table">
                    <?php
                    while ($isi = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><b>ID User</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name='id_user' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $id_user; ?>" readonly></td>
                        </tr>

                        <tr>
                            <td><b>Nama</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name="nama" size="25px" maxlength="40" placeholder="Nama" value="<?php echo $isi['nama']; ?>" required></td>
                        </tr>

                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($isi['jenis_kelamin'] == "P") { ?>
                                    <input type="radio" name="jenis_kelamin" value="P" checked>&nbsp;Perempuan&nbsp;&nbsp;
                                    <input type="radio" name="jenis_kelamin" value="L">&nbsp;Laki-Laki</td>
                        <?php
                                } else { ?>
                            <input type="radio" name="jenis_kelamin" value="P">&nbsp;Perempuan&nbsp;&nbsp;
                            <input type="radio" name="jenis_kelamin" value="L" checked>&nbsp;Laki-Laki</td>
                        <?php
                                } ?>
                        </tr>

                        <tr>
                            <td><b>Alamat</b></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" name="alamat" cols="28" rows="5" maxlength="50" placeholder="Alamat" required><?php echo $isi['alamat']; ?></textarea></td>
                        </tr>

                        <tr>
                            <td><b>No Telepon</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name='no_telp' size="25px" maxlength="13" value="<?php echo $isi['no_telp']; ?>"></td>
                        </tr>

                        <tr>
                            <td><b>Username</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name='username' size="25px" maxlength="13" value="<?php echo $isi['username']; ?>"></td>
                        </tr>

                        <tr>
                            <td><b>Password</b></td>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="password" name='password' size="25px" maxlength="13" value="<?php echo $isi['password']; ?>">
                                <?php
                                if ($_SESSION['level'] != "Admin") {
                                ?>
                                    &nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update">
                                <?php } ?></td>
                        </tr>

                        <?php
                        if ($_SESSION['level'] == "Admin") {
                        ?>
                            <tr>
                                <td><b>Level User</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="level">
                                        <option value="" disabled selected>Pilih Level User</option>
                                        <?php if ($isi['level'] == "Admin") { ?>
                                            <option value="Admin" selected>Admin</option>
                                            <option value="Dokter">Dokter</option>
                                        <?php
                                        } else if ($isi['level'] == "Dokter") { ?>
                                            <option value="Admin">Admin</option>
                                            <option value="Dokter" selected>Dokter</option>
                                        <?php
                                        } ?>
                                    </select>&nbsp;&nbsp;&nbsp; <input class="btn btn-success" type="submit" value="Update">
                                </td>
                            </tr>

                        <?php } ?>
                </table><?php } ?>
            <?php
            }
            ?>
            </form>
        </div>
    </div>
</main>