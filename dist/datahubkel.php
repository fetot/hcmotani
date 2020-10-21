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
                    <a href="cetak/cetakdatahubkel" class="btn btn-outline-secondary">
                        <i class="fas fa-print fa-fw mr-1"></i>Cetak/Eksport</a>
                </div>

            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tampil Data Hubungan Keluarga</li>
            </ol>
        </nav>

        <div class="row mb-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-info text-info">
                                    <div class="card-body align-items-center justify-content-center">
                                    
                                        <h1 class="font-weight-bolder"><?php 
                                                $datahubkel = $koneksi -> query("SELECT * FROM tbl_hubkel");
                                                $jlhhubkel = mysqli_num_rows($datahubkel);
                                                echo $jlhhubkel;
                                        ?></h1>
                                        <div class="small">Total Hubungan Keluarga</div>
                                    </div>
                                </div>
                            </div>
        </div>

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
                                <td>
                                    <a class="text-dark" href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel2['nama']; ?></a>
                                </td>
                                <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan_rel']; ?></td>
                                <td>
                                    <a class="text-dark" href="detail?id=<?php echo $tabel['id_karyawan_rel']; ?>"><?php echo $tabel3['nama']; ?></a>
                                </td>
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
                                            
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapus" id="formhapus" action="datahubkel?id=<?php echo $tabel['id']; ?>">
                                            <button type="submit" name="Hapus" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                            mr-1"></i>Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                    

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

<?php
                                        if(isset($_POST['Hapus'])){
                                        include_once("koneksi.php");

                                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id=$id");
                                            if($queryhapus){
                                            echo "<script>alert('Data Hubungan Keluarga berhasil dihapus!')</script>";
                                            echo "<script>location='datahubkel'</script>";
                                            } else {
                                                var_dump($queryhapus);echo "query1";
                                        }
                                        }
                                    ?>
<?php include "footer.php"; ?>