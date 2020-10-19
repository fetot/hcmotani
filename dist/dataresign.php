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
                        href="cetak/cetakdataresign"
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
                <li class="breadcrumb-item active" aria-current="page">Tampil Data Resign</li>
            </ol>
        </nav>

        <div class="row mb-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-danger text-danger">
                                    <div class="card-body align-items-center justify-content-center">
                                    
                                        <h1 class="font-weight-bolder"><?php 
                                                $datasp = $koneksi -> query("SELECT * FROM tbl_resign");
                                                $jlhsp = mysqli_num_rows($datasp);
                                                echo $jlhsp;
                                        ?></h1>
                                        <div class="small">Total Resign Karyawan Harlep</div>
                                    </div>
                                </div>
                            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Resign
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
                                <th>Tanggal Resign</th>
                                <th>Alasan Resign</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Tanggal Resign</th>
                                <th>Alasan Resign</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_resign JOIN tbl_infokaryawan_res WHERE tbl_infokaryawan_res.id_karyawan = tbl_resign.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><?php echo $tabel['nama']; ?></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_resign'])); ?></td>
                                <td><?php echo $tabel['alasan']; ?></td>
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
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Info Karyawan</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahresign?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <button
                                                class="dropdown-item text-danger"
                                                data-toggle="modal"
                                                data-target="#modalDelKonfirmasi">
                                                <i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus Resign</button>
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
                                                    dikembalikan. <br>Menghapus data resign tidak mengembalikan data karyawan kedalam data karyawan yang aktif.
                                                </div>
                                                <div class="modal-footer">
                                                    <a
                                                        href="hapusresign?id=<?php echo $tabel['no']; ?>"
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
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>