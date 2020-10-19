<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../401");
    }

    include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Hubungan Keluarga Harlep PT. OTANI (<?php echo date('d-M-Y');?>)</title>
        <link
            rel="icon"
            href="../assets/img/favicon.ico"
            type="image/png"
            sizes="16x16">

        <!-- Bootstrap CSS -->
        <link href="../css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../assets/datatables.css"/>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../bootstrap/font/css/fontawesome-all.min.css">
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index">HCM Otani</a>
            <button
                class="btn btn-link btn-sm order-1 order-lg-0"
                id="sidebarToggle"
                href="#">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        id="userDropdown"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Pengaturan</a> <div
                        class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="../logout">Keluar</a>
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
                            <a class="nav-link" href="../index">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-home fa-fw"></i>
                                </div>
                                Dashboard
                            </a>
                            <a
                                class="nav-link collapsed"
                                href="#"
                                data-toggle="collapse"
                                data-target="#collapseLayouts"
                                aria-expanded="false"
                                aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-database fa-fw"></i>
                                </div>
                                Tampil Data
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div
                                class="collapse"
                                id="collapseLayouts"
                                aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../datakaryawan">Karyawan</a>
                                    <a class="nav-link" href="../datahubkel">Hubungan Keluarga</a>
                                    <a class="nav-link" href="../datasp">SP</a>
                                    <a class="nav-link" href="../datacuti">Cuti</a>
                                    <a class="nav-link" href="../dataresign">Resign</a>
                                </nav>
                            </div>
                            <a
                                class="nav-link collapsed"
                                href="#"
                                data-toggle="collapse"
                                data-target="#tambahData"
                                aria-expanded="false"
                                aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-plus-square fa-fw"></i>
                                </div>
                                Tambah Data
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div
                                class="collapse"
                                id="tambahData"
                                aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../tambahkaryawan">Karyawan</a>
                                    <a class="nav-link" href="../tambahhubkel">Hubungan Keluarga</a>
                                    <a class="nav-link" href="../tambahsp">SP</a>
                                    <a class="nav-link" href="../tambahcuti">Cuti</a>
                                    <a class="nav-link" href="../tambahresign">Resign</a>
                                </nav>
                            </div>
                        </div>
                    </nav>
                </div>

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            <div class="row mt-4 align-items-center">
                                <h1 class="col-md-3">Cetak Data</h1>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../index">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="../datahubkel">Tampil Data Hubungan Keluarga</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Cetak Data Hubungan Keluarga</li>
                                </ol>
                            </nav>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    Data Hubungan Keluarga (<?php echo date("d/m/Y"); ?>)
                                </div>
                                <div class="card-body">
                                    <div style="table-responsive">
                                        <table
                                            class="table table-sm table-bordered table-hover"
                                            id="cetaktabel"
                                            width="100%"
                                            cellspacing="0"
                                            style="font-size:10pt">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Bagian</th>
                                                    <th>Dengan ID</th>
                                                    <th>Dengan Nama</th>
                                                    <th>Dari Bagian</th>
                                                    <th>Hubungan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_hubkel, tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = tbl_hubkel.id_karyawan AND tbl_infokaryawan.id_karyawan = tbl_hubkel.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                    $id2 = $tabel['id_karyawan_rel'];
                                                     $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = $id2 AND tbl_infokaryawan.id_karyawan = $id2");
                                                     $tabel2 = $tampil2 -> fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $nomor; ?></td>
                                                    <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                                    <td>
                                                        <a class="text-dark" href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel['nama']; ?></a>
                                                    </td>
                                                    <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                                    <td class="text-center"><?php echo $tabel['id_karyawan_rel']; ?></td>
                                                    <td>
                                                        <a class="text-dark" href="detail?id=<?php echo $tabel['id_karyawan_rel']; ?>"><?php echo $tabel2['nama']; ?></a>
                                                    </td>
                                                    <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
                                                    <td class="text-center"><?php echo $tabel['hubungan']; ?></td>

                                                </tr>
                                                <?php $nomor++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Human Capital Management Otani
                            <?php echo date("Y");?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../bootstrap/js/jquery.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script type="text/javascript" src="../assets/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#cetaktabel').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print',
                    'excel', {
                        extend: 'pdfHtml5',
                        pageSize: 'LEGAL'
                    }
                ],
                paging: false
            });
        });
    </script>
    <script src="../js/scripts.js"></script>

    <script type="text/javascript">
        function copy_text() {
            /* Get the text field */
            var copyText = document.getElementById("idkaryawan");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999);/*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("ID Karyawan berhasil dicopy: " + copyText.value);
        }
    </script>
</body>
</html>