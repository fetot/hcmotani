<?php 
include "uiheader.php";
?>

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tampil Data</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> -->
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tampil Data SP</li>
                            </ol>
                        </nav>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data SP
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>ID Karyawan</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>SP</th>
                                                <th>Tanggal Diberikan SP</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>ID Karyawan</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>SP</th>
                                                <th>Tanggal Diberikan SP</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_sp, tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = tbl_sp.id_karyawan AND tbl_infokaryawan.id_karyawan = tbl_sp.id_karyawan ORDER BY tbl_sp.no");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                    
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $nomor; ?></td>
                                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                                <td><?php echo $tabel['nama']; ?></td>
                                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                                <td class="text-center"><?php echo $tabel['jenissp']; ?></td>
                                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_sp'])); ?></td>
                                                <td><?php echo $tabel['keterangan']; ?></td>
                                            </tr>
                                                <?php $nomor++; ?>
                                                <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php include "footer.php"; ?>