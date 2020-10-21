<?php 
    include "uiheader.php";
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<main>
    <div class="container-fluid">
        <div class="row mt-4 align-items-center">
            <h1 class="col-md-3">Tampil Data</h1>
            <div class="btn-toolbar col-md-3 offset-md-6 justify-content-end">
                <div class="btn-group ml-2">
                    <a
                        href="cetak/cetakdatakaryawan"
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
                <li class="breadcrumb-item active" aria-current="page">Tampil Data Karyawan</li>
            </ol>
        </nav>

        <div class="row mb-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-primary text-primary">
                                    <div class="card-body align-items-center justify-content-center">
                                        <h1 class="font-weight-bolder">
                                        <?php 
                                                $dataharlep = $koneksi -> query("SELECT * FROM tbl_masterkaryawan");
                                                $jlhharlep = mysqli_num_rows($dataharlep);
                                                echo $jlhharlep;
                                        ?>
                                        </h1>
                                        <div class="small">Total Karyawan Harlep</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-success text-success">
                                    <div class="card-body align-items-center justify-content-center">
                                        <h1 class="font-weight-bolder">
                                        <?php 
                                                $dataharlep = $koneksi -> query("SELECT * FROM tbl_masterkaryawan WHERE tbl_masterkaryawan.status = 'Aktif'");
                                                $jlhharlep = mysqli_num_rows($dataharlep);
                                                echo $jlhharlep;
                                        ?>
                                        </h1>
                                        <div class="small">Aktif</div>
                                    </div>
                                </div>
                            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users mr-1"></i>
                Data Karyawan Harlep
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover"
                        id="dataTable"
                        width="100%"
                        cellspacing="0">
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
                                <td><a
                                                style="color: black;"
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['badge']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_masukkerja'])); ?></td>
                                <td class="text-center"><?php echo $tabel['jenis_kelamin']; ?></td>
                                <td class="text-center"><?php echo $tabel['agama']; ?></td>
                                <td class="text-center"><?php echo $tabel['status']; ?></td>
                                <td class="text-center">
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
                                                <i class="fas fa-eye fa-fw mr-1"></i>Detil</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahkaryawan?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <a
                                                href="tambahcuti?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-primary">
                                                <i class="fas fa-check fa-fw mr-1"></i>Izin Cuti</a>
                                            <a
                                                href="tambahhubkel?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-primary">
                                                <i class="fas fa-plus fa-fw mr-1"></i>Hubungan Keluarga</a>
                                            <a
                                                href="tambahsp?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-warning">
                                                <i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Beri SP</a>
                                            <a
                                                href="tambahresign?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-danger">
                                                <i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Resign</a>
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan. SEMUA data yang menyangkut karyawan ini juga akan ikut terhapus!');" name="formhapus" id="formhapus" action="datakaryawan?id=<?php echo $tabel['id_karyawan']; ?>">
                                            <button type="submit" name="Hapus" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus Karyawan</a></button>
                                            </form>
                                        </div>
                                    </div>

                                    
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
                                        if(isset($_POST['Hapus'])){
                                        include_once("koneksi.php");

                                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_masterkaryawan WHERE id_karyawan=$id");
                                        if($queryhapus){
                                            $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan WHERE id=$id");

                                            if ($queryhapus2) {
                                                $hapuscuti = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE id_karyawan=$id");
                                                $hapussp = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE id_karyawan=$id");
                                                $hapushubkel = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id_karyawan=$idk OR id_karyawan_rel=$id");

                                            echo "<script>alert('Data Karyawan berhasil dihapus!')</script>";
                                            echo "<script>location='datakaryawan'</script>";
                                            
                                            } else {
                                                var_dump($queryhapus2);
                                            }
                                        } else {
                                            var_dump($queryhapus);echo "query1";
                                        }
                                        }
                                    ?>

<?php 
    include "footer.php";
?>