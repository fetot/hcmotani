<?php 
  include "uiheader.php";
  if(empty($_GET['inputID'])){
    $keyword = "";
  }else{
    $keyword = $_GET['inputID'];
  }

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Data</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Cuti</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user mr-1"></i>
                Izin Cuti
            </div>
            <div class="card-body">

                <?php 
                            // $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                            // $tabel = $tampil -> fetch_assoc();
                        ?>

                <table class="table table-sm table-borderless p-2">
                    <tbody style="font-size: 0.9rem">
                        <tr>
                            <th scope="row">ID Karyawan</th>
                            <td>
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            id="inputID"
                                            name="inputID"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="ID Karyawan"
                                            value="<?php if(empty($_GET['inputID'])){echo "";}else{$inputID = $_GET['inputID']; echo $inputID;} ?>"
                                            autocomplete="off"
                                            required="required"
                                            autofocus="autofocus">
                                        <div class="input-group-append">
                                            <button
                                                class="btn btn-sm btn-primary mb-1"
                                                name="Cari"
                                                id="btnCari"
                                                type="submit">
                                                <i class="fas fa-search fa-fw mr-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                        <?php
      if(isset($_GET['Cari'])) {
        $keyword = $_GET['inputID'];
        $sqlcari = $koneksi -> query("SELECT * FROM tbl_infokaryawan JOIN tbl_masterkaryawan WHERE tbl_infokaryawan.id_karyawan = $keyword AND tbl_masterkaryawan.id_karyawan = $keyword");
        $hasilcari = $sqlcari -> fetch_assoc();
      }
    ?>

                        <?php if(empty($hasilcari)): ?>
                    <?php else: ?>
                        <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td>
                                <input
                                    type="text"
                                    name="inputNama"
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Nama Lengkap"
                                    value="<?php echo $hasilcari['nama']; ?>"
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
                                    value="<?php echo $hasilcari['bagian']; ?>"
                                    required="required"
                                    autofocus="autofocus"
                                    disabled="disabled">
                            </td>
                        </tr>
                        <?php endif ?>

                        <tr>
                            <th scope="row" colspan="3"><hr></th>
                        </tr>

                        <form method="post" action="tambahcuti" name="form1">
                            <input
                                type="hidden"
                                name="aidi"
                                value="<?php echo $keyword; ?>"
                                readonly="true"
                                autocomplete="off"
                                required="">
                            <tr>
                                <th scope="row">Tanggal Izin Cuti</th>
                                <td>
                                    <input
                                        type="date"
                                        id="inputTglIzinCuti"
                                        name="inputTglIzinCuti"
                                        class="form-control form-control-sm mb-1"
                                        value="<?php echo date("Y-m-d"); ?>">
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Tanggal Akhir Cuti</th>
                                <td>
                                    <input
                                        type="date"
                                        id="inputTglAkhirCuti"
                                        name="inputTglAkhirCuti"
                                        class="form-control form-control-sm mb-1"
                                        value="<?php $date = date("Y-m-d");
                                                      $date1 = str_replace('-', '/', $date);
                                                      $tomorrow = date('Y-m-d',strtotime($date1 . "+1 days")); echo $tomorrow;
                                                ?>">
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Alasan</th>
                                <td>
                                    <textarea
                                        id="inputAlasan"
                                        name="inputAlasan"
                                        class="form-control form-control-sm mb-1"
                                        placeholder="Alasan Cuti"
                                        row="3"
                                        required="required"
                                        autofocus="autofocus"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <button
                                        class="btn btn-primary mt-3"
                                        type="button"
                                        data-toggle="modal"
                                        data-target="#modalKonfirmasi">
                                        <i class="fas fa-check fa-fw mr-1"></i>Beri Izin Cuti</button>
                                </td>
                                <td></td>

                                <div
                                    class="modal fade"
                                    id="modalKonfirmasi"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <i class="fas fa-exclamation-circle fa-fw mr-1 text-warning"></i>Konfirmasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin data yang diinput sudah benar?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <button type="submit" name="Submit" id="btnTambah" class="btn btn-primary">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal -->
                            </tr>

                        </tbody>
                    </form>
                </table>

                <?php
    if(isset($_POST['Submit'])){
        $idkaryawan = $_POST['aidi'];
        $tglcuti = $_POST['inputTglIzinCuti'];
        $tglakhir = $_POST['inputTglAkhirCuti'];
        $alasan = $_POST['inputAlasan'];

        $hariini = date('Y-m-d');
        $hariini_time = strtotime($hariini);
        $akhircuti_time = strtotime($tglakhir);
        
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "INSERT INTO tbl_cuti (id_karyawan,tgl_izincuti,tgl_akhircuti,alasan,waktudibuat,terakhirdiubah) VALUES ('$idkaryawan','$tglcuti','$tglakhir','$alasan',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");
        
        if($query1){
          echo "<script>alert('Izin cuti berhasil ditambahkan!')</script>";
          echo "<script>location='datacuti'</script>";

          //jika akhir cuti > tanggal hari ini maka status karyawan menjadi cuti
          if($akhircuti_time > $hariini_time){
            $query2 = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET status='Cuti',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$idkaryawan");
          }
        }
    }
?>

            </div>
            <!-- end card body -->
        </div>
    </div>

</main>

<?php 
    include "footer.php" 
?>