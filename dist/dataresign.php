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
                        href="cetak/cetakdataresign"
                        class="btn btn-outline-secondary">
                        <i class="fas fa-print fa-fw mr-1"></i>Cetak/Eksport</a>
                </div>

            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
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
                                <td><a href="detailres?id=<?php echo $tabel['id_karyawan']; ?>" style="color:black;"><?php echo $tabel['nama']; ?></td>
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
                                                href="detailres?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Info Karyawan</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahresign?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan. SEMUA data yang menyangkut karyawan ini juga akan ikut terhapus!');" name="formhapus" id="formhapus" action="dataresign?id=<?php echo $tabel['no']; ?>">
                                                <button type="submit" name="Hapus" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                                mr-1"></i>Hapus</button>
                                            </form>
                                        </div>
                                    </div>
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

<?php
                                        if(isset($_POST['Hapus'])){
                                            include_once("koneksi.php");
                                            
                                            $resign = $koneksi -> query("SELECT * FROM tbl_resign WHERE no=$id");
                                            $tbl = $resign -> fetch_assoc();
                                            $idkar = $tbl['id_karyawan'];
                                            if(!empty($idkar)){
                                                $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_resign WHERE no=$id");
                                                $hapuskaryawan = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan_res WHERE id_karyawan=$idkar");
                                                $hapuscuti = mysqli_query($koneksi, "DELETE FROM tbl_cuti_res WHERE id_karyawan=$idkar");
                                                $hapussp = mysqli_query($koneksi, "DELETE FROM tbl_sp_res WHERE id_karyawan=$idkar");
                                                $hapushubkelres = mysqli_query($koneksi, "DELETE FROM tbl_hubkel_res WHERE id_karyawan=$idkar OR id_karyawan_rel=$idkar");
                                                if($queryhapus){
                                                echo "<script>alert('Data Resign berhasil dihapus!')</script>";
                                                echo "<script>location='dataresign'</script>";
                                                    } else {
                                                        var_dump($queryhapus);echo "query1";
                                            }
                                            }
                                    
                                        }
                                    ?>

<?php include "footer.php"; ?>