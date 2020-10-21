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
                        href="cetak/cetakdatacuti"
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
                <li class="breadcrumb-item active" aria-current="page">Tampil Data Cuti</li>
            </ol>
        </nav>

        <div class="row mb-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-info text-info">
                                    <div class="card-body align-items-center justify-content-center">
                                    
                                        <h1 class="font-weight-bolder"><?php 
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_cuti");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?></h1>
                                        <div class="small">Total Izin Cuti</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-success text-success">
                                    <div class="card-body align-items-center justify-content-center">
                                        <h1 class="font-weight-bolder"><?php
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_masterkaryawan WHERE tbl_masterkaryawan.status = 'Cuti'");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?></h3>
                                        <div class="small">Izin Cuti yang aktif</div>
                                    </div>
                                </div>
                            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Izin Cuti
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
                                <th>Izin Cuti</th>
                                <th>Cuti Sampai</th>
                                <th>Alasan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
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
                        </tfoot>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_cuti, tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = tbl_cuti.id_karyawan AND tbl_infokaryawan.id_karyawan = tbl_cuti.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                    
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><a
                                                style="color:black"
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
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
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Info Karyawan</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahcuti?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapus" id="formhapus" action="datacuti?id=<?php echo $tabel['no']; ?>">
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
                                            
                                            $apdet = $koneksi -> query("SELECT * FROM tbl_cuti JOIN tbl_masterkaryawan ON tbl_masterkaryawan.id_karyawan = tbl_cuti.id_karyawan WHERE tbl_cuti.no = $id");
                                            $apdetst = $apdet -> fetch_assoc();
                                            $idkaryawan = $apdetst['id_karyawan'];

                                            $query2 = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET status='Aktif',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$idkaryawan");
                                            
                                            if($query2){
                                                $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE no=$id");
                                                if($queryhapus){
                                                echo "<script>alert('Data Cuti berhasil dihapus!')</script>";
                                                echo "<script>location='datacuti'</script>";
                                                } else {
                                                    var_dump($queryhapus);echo "queryhapus";
                                                }
                                            }else{
                                                var_dump($query2);echo "query2";
                                            }
                                        }
                                    ?>

<?php include "footer.php"; ?>