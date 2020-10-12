<?php 
include "uiheader.php";
$id = $_GET['id'];
?>

<main>

    <?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                            $tabel = $tampil -> fetch_assoc();
                        ?>

    <div class="container-fluid">
        <div class="row mt-4 align-items-center">
            <h1 class="col-md-4">Info Karyawan</h1>
            <div class="btn-toolbar col-md-3 offset-md-5 justify-content-end">
                <div class="dropdown">
                    <a
                        class="btn btn-outline-secondary dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-cog fa-fw mr-1"></i>Opsi
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a
                            href="ubahkaryawan?id=<?php echo $tabel['id_karyawan']; ?>"
                            class="dropdown-item text-primary">
                            <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                        <a
                            href="tambahcuti?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                            class="dropdown-item text-primary">
                            <i class="fas fa-check fa-fw mr-1"></i>Izin Cuti</a>
                        <a
                            href="tambahsp?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                            class="dropdown-item text-warning">
                            <i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Beri SP</a>
                        <a
                            href="ubahkaryawan?id=<?php echo $tabel['id_karyawan']; ?>"
                            data-toggle="modal"
                            data-target="#modalDelKonfirmasi"
                            class="dropdown-item text-danger">
                            <i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus Karyawan</a>
                    </div>
                </div>
                <div class="btn-group ml-2">
                    <button onClick="window.print();" class="btn btn-outline-secondary">
                        <i class="fas fa-print fa-fw mr-1"></i>Cetak</button>
                </div>

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
                        <button type="submit" name="Hapus" id="btnTambah" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

    <?php
                        if(isset($_POST['Hapus'])){
                          include_once("koneksi.php");

                          $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_masterkaryawan WHERE id_karyawan=$id");
                          if($queryhapus){
                            $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan WHERE id=$id");

                            if ($queryhapus2) {
                              echo "<script>alert('Data Karyawan berhasil dihapus!')</script>";
                              echo "<script>location='index'</script>";
                              
                            } else {
                                var_dump($queryhapus2);
                            }
                          } else {
                              var_dump($queryhapus);echo "query1";
                          }
                        }
                      ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index">Tampil Data Karyawan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Info Karyawan</li>
            </ol>
        </nav>

        <div class="card mb-4 mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link active"
                            id="info-tab"
                            data-toggle="tab"
                            href="#info"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true">
                            <i class="fas fa-user-check mr-1"></i>
                            Info Karyawan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="hubkel-tab"
                            data-toggle="tab"
                            href="#hubkel"
                            role="tab"
                            aria-controls="hubkel"
                            aria-selected="false">
                            <i class="fas fa-user-friends mr-1"></i>
                            Hubungan Keluarga<span class="badge badge-info ml-1">0</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="sp-tab"
                            data-toggle="tab"
                            href="#sp"
                            role="tab"
                            aria-controls="sp"
                            aria-selected="false">
                            <i class="fas fa-user-clock mr-1"></i>
                            Riwayat SP<span class="badge badge-info ml-1">0</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="cuti-tab"
                            data-toggle="tab"
                            href="#cuti"
                            role="tab"
                            aria-controls="cuti"
                            aria-selected="false">
                            <i class="fas fa-user-clock mr-1"></i>
                            Riwayat Cuti<span class="badge badge-info ml-1">0</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body tab-content" id="myTabContent">

              <!-- tab info karyawan -->
                <div
                    class="tab-pane fade show active"
                    id="info"
                    role="tabpanel"
                    aria-labelledby="info-tab">

                    <table class="table table-sm table-borderless p-2">
                        <tbody style="font-size: 0.9rem">
                            <form
                                method="post"
                                action="detail?id=<?php echo $id; ?>"
                                name="form1">
                                <tr>
                                    <th scope="row">ID Karyawan</th>
                                    <td>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                id="idkaryawan"
                                                name="inputNama"
                                                class="form-control form-control-sm mb-1 border-0 bg-light"
                                                placeholder="Nama Lengkap"
                                                value="<?php echo $tabel['id_karyawan']; ?>"
                                                required="required"
                                                autofocus="autofocus"
                                                readonly="readonly">
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-sm btn-primary mb-1"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Salin ID"
                                                    type="button"
                                                    onclick="copy_text()">
                                                    <i class="fas fa-clipboard fa-fw mr-1"></i>Salin</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputNama"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Nama Lengkap"
                                            value="<?php echo $tabel['nama']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Bagian</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputBagian"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Bagian"
                                            value="<?php echo $tabel['bagian']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Badge</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputBadge"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Badge"
                                            value="<?php echo $tabel['badge']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Masuk Bekerja</th>
                                    <td>
                                        <input
                                            type="date"
                                            name="inputTglMskKerja"
                                            disabled="disabled"
                                            value="<?php echo $tabel['tgl_masukkerja']; ?>"
                                            class="form-control form-control-sm mb-1"
                                            required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputStatus"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Status"
                                            value="<?php echo $tabel['status']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3"><hr></th>
                                </tr>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputNIK"
                                            class="form-control form-control-sm mb-1"
                                            placeholder=""
                                            value="<?php echo $tabel['nik']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>
                                        <div class="form-check form-check-inline mb-1">
                                            <input
                                                class="for1m-check-input mr-1"
                                                type="radio"
                                                name="jeniskelamin"
                                                id="inlineRadio1"
                                                value="Pria"
                                                required="required"
                                                <?php if($tabel['jenis_kelamin'] == "Pria"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio1">Pria</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input mr-1"
                                                type="radio"
                                                name="jeniskelamin"
                                                id="inlineRadio2"
                                                value="Wanita"
                                                required="required"
                                                <?php if($tabel['jenis_kelamin'] == "Wanita"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat, Tanggal Lahir</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputTtl"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Tempat, Tanggal Lahir"
                                            value="<?php echo $tabel['ttl']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Ponsel</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputHP"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Nomor Ponsel"
                                            value="<?php echo $tabel['no_hp']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>
                                        <textarea
                                            name="inputAlamat"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Alamat Lengkap"
                                            row="3"
                                            disabled="disabled"
                                            required="required"
                                            autofocus="autofocus"><?php echo $tabel['alamat']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputAgama"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Agama"
                                            value="<?php echo $tabel['agama']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status Pernikahan</th>
                                    <td>
                                        <div class="form-check form-check-inline mb-1">
                                            <input
                                                class="for1m-check-input mr-1"
                                                type="radio"
                                                name="statusnikah"
                                                id="inlineRadio1"
                                                value="Lajang"
                                                required="required"
                                                <?php if($tabel['status_nikah'] == "Lajang"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio1">Lajang</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input mr-1"
                                                type="radio"
                                                name="statusnikah"
                                                id="inlineRadio2"
                                                value="Menikah"
                                                required="required"
                                                <?php if($tabel['status_nikah'] == "Menikah"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio2">Menikah</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input mr-1"
                                                type="radio"
                                                name="statusnikah"
                                                id="inlineRadio3"
                                                value="Menikah"
                                                required="required"
                                                <?php if($tabel['status_nikah'] == "Janda"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio3">Janda</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Pendidikan Terakhir</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputPendidikan"
                                            class="form-control form-control-sm"
                                            placeholder="Pendidikan Terakhir"
                                            value="<?php echo $tabel['pendidikan']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>

                            </tbody>
                        </form>
                    </table>

                </div>
              <!-- end tab info karyawan -->
              <!-- tab hubungan keluarga -->
                <div
                    class="tab-pane fade"
                    id="hubkel"
                    role="tabpanel"
                    aria-labelledby="hubkel-tab">

                      ini hub kel

                </div>
              <!-- end tab hubungan keluarga -->
              <!-- tab riwayat sp -->
                <div
                    class="tab-pane fade table-responsive"
                    id="sp"
                    role="tabpanel"
                    aria-labelledby="sp-tab">

                    <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_sp WHERE tbl_sp.id_karyawan='$id'");
                                                $tabel = $tampil -> fetch_assoc();
                                                $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                                                $tabel2 = $tampil2 -> fetch_assoc();   
                                            ?>

                <?php if(empty($tabel)): echo '<div class="text-center m-4"><h6 class="text-secondary">Karyawan ini tidak memiliki Riwayat SP.</h6></div>'?>
                <?php else: ?>
                    <table
                        class="table table-bordered table-hover"
                        width="100%"
                        cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>SP</th>
                                <th>Tanggal Diberikan SP</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><?php echo $tabel2['nama']; ?></td>
                                <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['jenissp']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_sp'])); ?></td>
                                <td><?php echo $tabel['keterangan']; ?></td>
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
                                                href="ubahsp?inputID=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <button
                                                class="dropdown-item text-danger"
                                                data-toggle="modal"
                                                data-target="#modalDelKonfirmasi">
                                                <i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus SP</button>
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
                                                        href="hapussp?id=<?php echo $tabel['id_karyawan']; ?>"
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
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
              <!-- end tab riwayat sp -->
              <!-- tab riwayat cuti -->
                <div
                    class="tab-pane fade table-responsive"
                    id="cuti"
                    role="tabpanel"
                    aria-labelledby="cuti-tab">

                    <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_cuti WHERE tbl_cuti.id_karyawan='$id'");
                                                $tabel = $tampil -> fetch_assoc();
                                                $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                                                $tabel2 = $tampil2 -> fetch_assoc();          
                                            ?>

                <?php if(empty($tabel)): echo '<div class="text-center m-4"><h6 class="text-secondary">Karyawan ini tidak memiliki Riwayat Cuti.</h6></div>'?>
                <?php else: ?>
                    <table
                        class="table table-bordered table-hover"
                        width="100%"
                        cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Izin Cuti</th>
                                <th>Cuti Sampai</th>
                                <th>Alasan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><?php echo $tabel2['nama']; ?></td>
                                <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_izincuti'])); ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_akhircuti'])); ?></td>
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
                                                href="ubahcuti?inputID=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <button
                                                class="dropdown-item text-danger"
                                                data-toggle="modal"
                                                data-target="#modalDelKonfirmasi">
                                                <i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus Cuti</button>
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
                                                        href="hapuscuti?id=<?php echo $tabel['id_karyawan']; ?>"
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
                        </tbody>
                    </table>
                    <?php endif ?>

                </div>
              <!-- end tab riwayat cuti -->

            </div>
            <!-- end card body -->
        </div>
    </div>

</main>

<?php include "footer.php" ?>