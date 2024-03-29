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
                        href="cetak/cetakdatasp"
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
                <li class="breadcrumb-item active" aria-current="page">Tampil Data SP</li>
            </ol>
        </nav>

        <div class="row mb-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-info text-info">
                                    <div class="card-body align-items-center justify-content-center">
                                    
                                        <h1 class="font-weight-bolder"><?php 
                                                $datasp = $koneksi -> query("SELECT * FROM tbl_sp");
                                                $jlhsp = mysqli_num_rows($datasp);
                                                echo $jlhsp;
                                        ?></h1>
                                        <div class="small">Total Surat Peringatan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-warning text-warning">
                                    <div class="card-body align-items-center justify-content-center">
                                        <h1 class="font-weight-bolder"><?php
                                                $datasp = $koneksi -> query("SELECT DISTINCT id_karyawan FROM tbl_sp");
                                                $jlhsp = mysqli_num_rows($datasp);
                                                echo $jlhsp;
                                        ?></h3>
                                        <div class="small">Jumlah karyawan yang memiliki SP</div>
                                    </div>
                                </div>
                            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data SP
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
                                <th>SP</th>
                                <th>Tanggal Diberikan SP</th>
                                <th>Keterangan</th>
                                <th></th>
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
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_sp, tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = tbl_sp.id_karyawan AND tbl_infokaryawan.id_karyawan = tbl_sp.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                    
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><a
                                                style="color: black;"
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
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
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Info Karyawan</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahsp?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>

                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapus" id="formhapus" action="datasp?id=<?php echo $tabel['no']; ?>">
                                            <button type="submit" name="Hapus" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                            mr-1"></i>Hapus SP</button>
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

                                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE no=$id");
                                            if($queryhapus){
                                            echo "<script>alert('SP berhasil dihapus!')</script>";
                                            echo "<script>location='datasp'</script>";
                                            } else {
                                                var_dump($queryhapus);echo "query1";
                                        }
                                        }
                                    ?>

<?php include "footer.php"; ?>