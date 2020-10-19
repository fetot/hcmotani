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
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Data Hubungan Keluarga</li>
                            </ol>
                        </nav>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user-friends mr-1"></i>
                                Hubungan Keluarga
                            </div>
                            <div class="card-body">


<table class="table table-sm table-borderless p-2">
  <tbody style="font-size: 0.9rem">
  <tr>
      <th scope="row">ID Karyawan</th>
      <td>
        <form method="GET" action="" >
          <div class="input-group">
          <input type="text" id="inputID" name="inputID" class="form-control form-control-sm mb-1" placeholder="ID Karyawan" value="<?php if(empty($_GET['inputID'])){echo "";}else{$inputID = $_GET['inputID']; echo $inputID;} ?>" autocomplete="off" required autofocus>
            <div class="input-group-append">
              <button class="btn btn-sm btn-primary mb-1" name="Cari" id="btnCari" type="submit" ><i class="fas fa-search fa-fw mr-1"></i></button>
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
        <input type="text" name="inputNama" class="form-control form-control-sm mb-1" placeholder="Nama Lengkap" value="<?php echo $hasilcari['nama']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" name="inputBagian" class="form-control form-control-sm mb-1" placeholder="Bagian" value="<?php echo $hasilcari['bagian']; ?>" required autofocus disabled>
      </td>
    </tr>
    <?php endif ?>
    

    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <form method="post" action="tambahhubkel" name="form1">
    <input type="hidden" name="aidi" value="<?php echo $keyword; ?>" readonly="true" autocomplete="off" required="">
    <tr>
      <th scope="row">Dengan ID Karyawan</th>
      <td>
          <div class="input-group">
          <input type="text" id="inputID2" name="inputID2" class="form-control form-control-sm mb-1" placeholder="Dengan ID Karyawan" autocomplete="off" required autofocus>
          </div>
      </td>
    </tr>

    <tr>
      <th scope="row">Hubungan</th>
      <td>
        <input type="text" id="inputHub" name="inputHub" class="form-control form-control-sm mb-1" placeholder="Hubungan" required autofocus>
      </td>
    </tr>

    <tr>
        <th scope="row">
        </th>
        <td><button class="btn btn-primary mt-3" type="button" data-toggle="modal" data-target="#modalKonfirmasi">Tambah</button></td>
        <td></td>

    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle fa-fw mr-1 text-warning"></i>Konfirmasi</h5>
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
        $denganid = $_POST['inputID2'];
        $hubungan = $_POST['inputHub'];
        
        if(!empty($idkaryawan)){
          include_once("koneksi.php");
          $query1 = mysqli_query($koneksi, "INSERT INTO tbl_hubkel (id_karyawan,id_karyawan_rel,hubungan,waktudibuat,terakhirdiubah) VALUES ('$idkaryawan','$denganid','$hubungan',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");

          echo "<script>alert('Hubungan Keluarga berhasil ditambahkan!')</script>";
          echo "<script>location='datahubkel'</script>";
        }else{
          echo "<script>alert('ID Karyawan tidak boleh kosong!')</script>";
          echo "<script>location='tambahhubkel'</script>";
        }
    }
?>

                            </div> <!-- end card body -->
                        </div>
                    </div>

                    


                </main>

<?php 
    include "footer.php" 
?>