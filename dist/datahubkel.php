<?php 
include "uiheader.php";
?>

<main>
    <div class="container-fluid">
    <div class="row mt-4 align-items-center">
            <h1 class="col-md-3">Tampil Data</h1>
            <div class="btn-toolbar col-md-3 offset-md-6 justify-content-end">
                <div class="btn-group ml-2">
                    <a
                        href="cetak/cetakdatahubkel"
                        class="btn btn-outline-secondary">
                        <i class="fas fa-print fa-fw mr-1"></i>Cetak/Eksport</a>
                </div>

            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> -->
                <li class="breadcrumb-item">
                    <a href="index">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tampil Data Hubungan Keluarga</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-friends mr-1"></i>
                Data Hubungan Keluarga
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover"
                        id="dataTable"
                        width="100%"
                        cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Dengan ID</th>
                                <th>Dengan Nama</th>
                                <th>Dari Bagian</th>
                                <th>Hubungan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Dengan ID</th>
                                <th>Dengan Nama</th>
                                <th>Dari Bagian</th>
                                <th>Hubungan</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_hubkel");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                    $id = $tabel['id'];
                                                    $idkar = $tabel['id_karyawan'];
                                                    $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = $idkar AND tbl_infokaryawan.id_karyawan = $idkar");
                                                     $tabel2 = $tampil2 -> fetch_assoc();
                                                    $idkar2 = $tabel['id_karyawan_rel'];
                                                     $tampil3 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = $idkar2 AND tbl_infokaryawan.id_karyawan = $idkar2");
                                                     $tabel3 = $tampil3 -> fetch_assoc();
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><a class="text-dark" href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel2['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan_rel']; ?></td>
                                <td><a class="text-dark" href="detail?id=<?php echo $tabel['id_karyawan_rel']; ?>"><?php echo $tabel3['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel3['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['hubungan']; ?></td>
                                <td>
                                    <div class="dropdown show">
                                        <a
                                            class="btn btn-secondary dropdown-toggle"
                                            href="#"
                                            role="button"
                                            id="dropdownMenuLink"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Opsi
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahhubkel?id=<?php echo $tabel['id']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <button
                                                class="dropdown-item text-danger"
                                                data-toggle="modal"
                                                data-target="#modalDelKonfirmasi">
                                                <i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus</button>
                                        </div>
                                    </div>

                                    <!-- modal delete -->
                                    <div
                                        class="modal fade"
                                        id="modalDelKonfirmasi"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        <i class="fas fa-exclamation-circle fa-fw mr-1 text-danger"></i>Konfirmasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat
                                                    dikembalikan.
                                                </div>
                                                <div class="modal-footer">
                                                    <a
                                                        href="hapushubkel?id=<?php echo $tabel['id']; ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->

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