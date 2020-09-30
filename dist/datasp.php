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
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>Badge</th>
                                                <th>Tanggal Masuk Kerja</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>Badge</th>
                                                <th>Tanggal Masuk Kerja</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_infokaryawan.id_karyawan = tbl_masterkaryawan.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $tabel['nama']; ?></td>
                                                <td><?php echo $tabel['bagian']; ?></td>
                                                <td><?php echo $tabel['badge']; ?></td>
                                                <td><?php echo date("d-M-Y", strtotime($tabel['tgl_masukkerja'])); ?></td>
                                                <td><?php echo $tabel['status']; ?></td>
                                                <td>
                                                    <a href="detail.php?id=<?php echo $tabel['id_karyawan']; ?>" class="btn btn-primary">Detil</a>
                                                </td>
                                            </tr>
                                                <?php $nomor++; ?>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php include "footer.php"; ?>