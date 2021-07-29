<main>
<?php 
    
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total Pasien</div>
                    <?php include "koneksi.php";
                        $pasien = "SELECT count(id_pasien) as total from pasien;";
                        $pasien_sql = mysqli_query($connect, $pasien);

                        while ($isi = mysqli_fetch_array($pasien_sql)) {
                            $total = $isi['total'];
                        ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white stretched-link"><?php echo $total ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total Pasien Yang Sudah Antri</div>
                    <?php include "koneksi.php";
                        $pendaftaran = "SELECT count(no_pendaftaran) as total from pendaftaran;";
                        $pendaftaran_sql = mysqli_query($connect, $pendaftaran);

                        while ($isi = mysqli_fetch_array($pendaftaran_sql)) {
                            $total = $isi['total'];
                        ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white stretched-link"><?php echo $total ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Tindakan</div>
                    <?php include "koneksi.php";
                        $tindakan = "SELECT count(id_tindakan) as total from tindakan;";
                        $tindakan_sql = mysqli_query($connect, $tindakan);

                        while ($isi = mysqli_fetch_array($tindakan_sql)) {
                            $total = $isi['total'];
                        ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white stretched-link"><?php echo $total ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Pendapatan</div>
                    <?php include "koneksi.php";
                        $pendapatan = "SELECT SUM(subTotal) as total from detail;";
                        $pendapatan_sql = mysqli_query($connect, $pendapatan);

                        while ($isi = mysqli_fetch_array($pendapatan_sql)) {
                            $total = $isi['total'];
                        ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white stretched-link">Rp. <?php echo $total ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>