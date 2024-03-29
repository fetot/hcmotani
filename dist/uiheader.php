<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="assets/img/favicon.ico" type="image/png" sizes="16x16">
        <title>HCM Otani</title>
        
        <!-- Bootstrap CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="assets/datatables.css"/>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/font/css/fontawesome-all.min.css">
    </head>
    <body class="sb-nav-fixed">
        <?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../401");
        }
        ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index">HCM Otani</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="ubahpassword?id=<?php echo $_SESSION['username']['id']; ?>">Ubah Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout">Keluar</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-footer">
                                <div class="small">Masuk sebagai:</div>
                                <?php echo strtoupper($_SESSION['username']['username']); ?>
                            </div>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class ="nav-link" href="index">
                                <div class="sb-nav-link-icon"><i class="fas fa-home fa-fw"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" style="cursor: pointer" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-database fa-fw"></i></div>
                                Tampil Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="datakaryawan">Karyawan</a>
                                    <a class="nav-link" href="datahubkel">Hubungan Keluarga</a>
                                    <a class="nav-link" href="datasp">SP</a>
                                    <a class="nav-link" href="datacuti">Cuti</a>
                                    <a class="nav-link" href="dataresign">Resign</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" style="cursor: pointer" data-toggle="collapse" data-target="#tambahData" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus-square fa-fw"></i></div>
                                Tambah Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="tambahData" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tambahkaryawan">Karyawan</a>
                                    <a class="nav-link" href="tambahhubkel">Hubungan Keluarga</a>
                                    <a class="nav-link" href="tambahsp">SP</a>
                                    <a class="nav-link" href="tambahcuti">Cuti</a>
                                    <a class="nav-link" href="tambahresign">Resign</a>
                                </nav>
                            </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">