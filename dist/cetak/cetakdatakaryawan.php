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
        <style type="text/css" media="print">
            @page {
                size: landscape;
            }
            body {
                writing-mode: tb-rl;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak - HCM Otani</title>
        <link
            rel="icon"
            href="../assets/img/favicon.ico"
            type="image/png"
            sizes="16x16">

        <!-- Bootstrap CSS -->
        <link href="../css/styles.css" rel="stylesheet"/>
        <link
            href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
            rel="stylesheet"
            crossorigin="anonymous"/>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../bootstrap/font/css/fontawesome-all.min.css">
    </head>
    <body>
        <main>
            <div class="container-fluid">
                <div class="row ml-4">
                    <div class="col text-left">
                        <h4>DATA KARYAWAN HARLEP<br>PT. OTANI</h4>
                        <p>
                            Tanggal cetak :
                            <?php echo date("d/m/Y"); ?><br>
                            <small class="text-muted">Copyright &copy; Human Capital Management Otani
                                <?php echo date("Y");?></small>
                        </p>
                    </div>
                </div>
                <div class="row ml-4">
                    <div class="col">
                        <a href="" onClick="window.print();" class="btn btn-sm btn-outline-secondary"><i class="fas fa-print fa-fw"></i></a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div>
                            <table
                                class="table table-sm table-bordered table-hover"
                                id="dataTable"
                                width="100%"
                                cellspacing="0"
                                >
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Bagian</th>
                                        <th>Badge</th>
                                        <th>Tanggal Masuk Kerja</th>
                                        <th>Tempat/Tgl Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Status Nikah</th>
                                        <th>No HP</th>
                                        <th>Pendidikan</th>
                                        <th>NIK</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_infokaryawan.id_karyawan = tbl_masterkaryawan.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $nomor; ?></td>
                                        <td><?php echo $tabel['nama']; ?></td>
                                        <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                        <td class="text-center"><?php echo $tabel['badge']; ?></td>
                                        <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_masukkerja'])); ?></td>
                                        <td class="text-center"><?php echo $tabel['ttl']; ?></td>
                                        <td class="text-center"><?php echo $tabel['jenis_kelamin']; ?></td>
                                        <td class="text-center"><?php echo $tabel['alamat']; ?></td>
                                        <td class="text-center"><?php echo $tabel['agama']; ?></td>
                                        <td class="text-center"><?php echo $tabel['status_nikah']; ?></td>
                                        <td class="text-center"><?php echo $tabel['no_hp']; ?></td>
                                        <td class="text-center"><?php echo $tabel['pendidikan']; ?></td>
                                        <td class="text-center"><?php echo $tabel['nik']; ?></td>
                                        <td class="text-center"><?php echo $tabel['status']; ?></td>

                                    </tr>
                                    <?php $nomor++ ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
            crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
        <script src="../../bootstrap/js/jquery.min.js"></script>
        <script src="../../bootstrap/js/popper.min.js"></script>
        <script>
            window.print();
        </script>
    </body>
</html>