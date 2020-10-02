<?php 
  include "uiheader.php";
  if(empty($_GET['inputID'])){

  }else{
    $keyword = $_GET['inputID'];
  }

?>

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Data</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user mr-1"></i>
                                Surat Peringatan
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
        $sqlcari = $koneksi -> query("SELECT * FROM tbl_infokaryawan WHERE tbl_infokaryawan.id_karyawan = $keyword");
        $hasilcari = $sqlcari -> fetch_assoc();
        if($sqlcari){
          $sqlcari2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan WHERE tbl_masterkaryawan.id_karyawan = $keyword");
          $hasilcari2 = $sqlcari2 -> fetch_assoc();
        }
      }

      else {
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
        <input type="text" name="inputBagian" class="form-control form-control-sm mb-1" placeholder="Bagian" value="<?php echo $hasilcari2['bagian']; ?>" required autofocus disabled>
      </td>
    </tr>
    <?php endif ?>
<!-- <a href="tambahsp.php">Reset</a> -->

    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <form method="post" action="tambahsp.php" name="form1">

    <tr>
      <th scope="row">Tanggal Diberikan SP</th>
      <td>
        <input type="date" id="inputTglSP" name="inputTglSP" class="form-control form-control-sm mb-1" required value="<?php echo date("Y-m-d"); ?>">
      </td>
    </tr>

    <tr>
      <th scope="row">Jenis SP</th>
      <td>
      <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="jenissp" id="jenissp1" value="I" required>
            <label class="form-check-label" for="jenissp1">I</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="jenissp" id="jenissp2" value="II" required>
            <label class="form-check-label" for="jenissp2">II</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="jenissp" id="jenissp3" value="III" required>
            <label class="form-check-label" for="jenissp3">III</label>
        </div>
      </td>
    </tr>

    <tr>
      <th scope="row">Keterangan</th>
      <td>
        <textarea id="inputKet" name="inputKet" class="form-control form-control-sm mb-1" placeholder="Keterangan SP" row="3" required autofocus></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
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
        $id = $_POST['inputNama'];
        $bagian = $_POST['inputBagian'];
        $badge = $_POST['inputBadge'];
        $tglmskkerja = $_POST['inputTglMskKerja'];
        $nik = $_POST['inputNIK'];
        $jeniskelamin = $_POST['jeniskelamin'];
        $ttl = $_POST['inputTtl'];
        $nohp = $_POST['inputHP'];
        $alamat = $_POST['inputAlamat'];
        $agama = $_POST['inputAgama'];
        $statusnikah = $_POST['statusnikah'];
        $pendidikan = $_POST['inputPendidikan'];
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "INSERT INTO tbl_masterkaryawan (tgl_masukkerja,bagian,badge,status) VALUES ('$tglmskkerja','$bagian','$badge','Aktif')");
        if ($query1) {
            $last_id = mysqli_query($koneksi, "SELECT id_karyawan FROM tbl_masterkaryawan ORDER BY id_karyawan DESC");
            $row_last = $last_id->fetch_assoc();
            $id = $row_last['id_karyawan'];
            $query2 = mysqli_query($koneksi, "INSERT INTO tbl_infokaryawan(id_karyawan,nama,jenis_kelamin,ttl,alamat,agama,status_nikah,no_hp,pendidikan,nik) VALUES('$id','$nama','$jeniskelamin','$ttl','$alamat','$agama','$statusnikah','$nohp','$pendidikan','$nik')");
        
            if ($query2) {
                echo "Karyawan berhasil ditambahkan.";
            } else {
                var_dump($query2);
            }
        } else {
            var_dump($badge);
            var_dump($query1);echo "query1";
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