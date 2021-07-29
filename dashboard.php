<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	echo "<script type='text/javascript'>
	alert('SILAKAN LOGIN TERLEBIH DAHULU!')
	window.location='index.php';
	</script>";
} else {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Klinik ABC Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Klinik ABC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <!-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><p class="dropdown-item"><?php echo $_SESSION['nama']; ?>&nbsp;</p></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php" onClick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['nama']; ?>?')">Logout</a></li>
                    </ul>
                </li>
            </ul> -->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"><?php echo $_SESSION['nama']; ?>&nbsp;</div>
                            <a class="nav-link" href="dashboard.php?home=$home">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="dashboard.php?tabel_user=$tabel_user">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Manajemen User
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                                Pasien
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="dashboard.php?tabel_pasien=$tabel_pasien">Data Pasien</a>
                                    <a class="nav-link" href="dashboard.php?formulir_pasien=$formulir_pasien">Tambah Pasien</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="dashboard.php?tabel_obat=$tabel_obat">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                                Obat
                            </a>
                            <a class="nav-link" href="dashboard.php?tabel_pendaftaran=$tabel_pendaftaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-server"></i></div>
                                Pendaftaran
                            </a>
                            <a class="nav-link" href="dashboard.php?tabel_tindakan=$tabel_tindakan">
                                <div class="sb-nav-link-icon"><i class="fas fa-stethoscope"></i></div>
                                Tindakan
                            </a>
                            <a class="nav-link" href="dashboard.php?tabel_detail=$tabel_detail">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Checkout
                            </a>
                            <div class="sb-sidenav-menu-heading">Statistik</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Statistik Klinik
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="logout.php" onClick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['nama']; ?>?')">
                                <div class="sb-nav-link-icon"><i class="fas fa-share"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>

            <?php

			$aksi_detail = "code/proses/update-delete/aksi_detail.php";
			$aksi_user = "code/proses/update-delete/aksi_user.php";
			$aksi_obat = "code/proses/update-delete/aksi_obat.php";
			$aksi_pasien = "code/proses/update-delete/aksi_pasien.php";
            $aksi_tindakan = "code/proses/update-delete/aksi_tindakan.php";
			$home = "index-dashboard.php";
			$formulir_detail = "code/formulir/formulir_detail.php";
			$formulir_user = "code/formulir/formulir_user.php";
			$formulir_obat = "code/formulir/formulir_obat.php";
			$formulir_pasien = "code/formulir/formulir_pasien.php";
			$formulir_pendaftaran = "code/formulir/formulir_pendaftaran.php";
            $formulir_tindakan = "code/formulir/formulir_tindakan.php";
			$informasi_akun = "code/informasi/informasi_akun.php";
			$tabel_detail = "code/tabel/tabel_detail.php";
			$tabel_user = "code/tabel/tabel_user.php";
			$tabel_obat = "code/tabel/tabel_obat.php";
			$tabel_pasien = "code/tabel/tabel_pasien.php";
			$tabel_pendaftaran = "code/tabel/tabel_pendaftaran.php";
            $tabel_tindakan = "code/tabel/tabel_tindakan.php";

			?>

            <div id="layoutSidenav_content">
                <?php
				if (isset($_GET['home'])) {
					require_once $home;
				} else if (isset($_GET['aksi_detail'])) {
					require_once $aksi_detail;
				} else if (isset($_GET['aksi_user'])) {
					require_once $aksi_user;
				} else if (isset($_GET['aksi_obat'])) {
					require_once $aksi_obat;
				} else if (isset($_GET['aksi_pasien'])) {
					require_once $aksi_pasien;
                } else if (isset($_GET['aksi_tindakan'])) {
                    require_once $aksi_tindakan;
				} else if (isset($_GET['formulir_detail'])) {
					require_once $formulir_detail;
				} else if (isset($_GET['formulir_user'])) {
					require_once $formulir_user;
				} else if (isset($_GET['formulir_obat'])) {
					require_once $formulir_obat;
				} else if (isset($_GET['formulir_pasien'])) {
					require_once $formulir_pasien;
				} else if (isset($_GET['formulir_pendaftaran'])) {
					require_once $formulir_pendaftaran;
                } else if (isset($_GET['formulir_tindakan'])) {
					require_once $formulir_tindakan;
				} else if (isset($_GET['informasi_akun'])) {
					require_once $informasi_akun;
				} else if (isset($_GET['tabel_detail'])) {
					require_once $tabel_detail;
				} else if (isset($_GET['tabel_user'])) {
					require_once $tabel_user;
				} else if (isset($_GET['tabel_obat'])) {
					require_once $tabel_obat;
				} else if (isset($_GET['tabel_pasien'])) {
					require_once $tabel_pasien;
				} else if (isset($_GET['tabel_pendaftaran'])) {
					require_once $tabel_pendaftaran;
                } else if (isset($_GET['tabel_tindakan'])) {
					require_once $tabel_tindakan;
				}
				?>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4" id="footer">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Klinik ABC 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php } ?>