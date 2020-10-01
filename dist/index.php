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
                                <li class="breadcrumb-item active" aria-current="page">Tampil Data Karyawan</li>
                            </ol>
                        </nav>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Karyawan Harlep
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>Badge</th>
                                                <th>Tanggal Masuk Kerja</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>Badge</th>
                                                <th>Tanggal Masuk Kerja</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_infokaryawan.id_karyawan = tbl_masterkaryawan.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                                <td><?php echo $tabel['nama']; ?></td>
                                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                                <td class="text-center"><?php echo $tabel['badge']; ?></td>
                                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_masukkerja'])); ?></td>
                                                <td class="text-center"><?php echo $tabel['jenis_kelamin']; ?></td>
                                                <td class="text-center"><?php echo $tabel['agama']; ?></td>
                                                <td class="text-center"><?php echo $tabel['status']; ?></td>
                                                <td class="text-center">
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Opsi
                                                        </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item text-primary" href="detail.php?id=<?php echo $tabel['id_karyawan']; ?>"><i class="fas fa-eye fa-fw mr-1"></i>Detil</a>
                                                                <a class="dropdown-item text-primary" href="ubahkaryawan.php?id=<?php echo $tabel['id_karyawan']; ?>"><i class="fas fa-edit fa-fw mr-1"></i>Ubah</a>
                                                                <button class="dropdown-item text-danger" data-toggle="modal" data-target="#modalDelKonfirmasi"><i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus</button>
                                                            </div>
                                                    </div>

                                                    <!-- modal delete -->
                                                    <div class="modal fade" id="modalDelKonfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="hapuskaryawan.php?id=<?php echo $tabel['id_karyawan']; ?>" class="btn btn-danger">Hapus</a>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <!-- end modal -->
                                                </td>        
                                            </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php 
    include "footer.php";
?>