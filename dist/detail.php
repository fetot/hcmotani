<?php 
include "uiheader.php";
$id = $_GET['id'];
?>

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Info Karyawan</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> -->
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Info Karyawan</li>
                            </ol>
                        </nav>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users mr-1"></i>
                                Info Karyawan
                            </div>
                            <div class="card-body">

                            
                        <?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                            $tabel = $tampil -> fetch_assoc();
                        ?>

<table class="table table-sm table-borderless p-2">
  <tbody style="font-size: 0.9rem">
    <form method="post" action="detail.php?id=<?php echo "$id"; ?>" name="form1">
    <tr>
      <th scope="row">ID Karyawan</th>
      <td>
        <div class="input-group">
          <input type="text" id="idkaryawan" name="inputNama" class="form-control form-control-sm mb-1 border-0 bg-light" placeholder="Nama Lengkap" value="<?php echo $tabel['id_karyawan']; ?>" required autofocus readonly>
          <div class="input-group-append">
            <button class="btn btn-sm btn-primary mb-1" type="button" onclick="copy_text()"><i class="fas fa-clipboard fa-fw mr-1"></i>Copy</button>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Nama Lengkap</th>
      <td>
        <input type="text" name="inputNama" class="form-control form-control-sm mb-1" placeholder="Nama Lengkap" value="<?php echo $tabel['nama']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" name="inputBagian" class="form-control form-control-sm mb-1" placeholder="Bagian" value="<?php echo $tabel['bagian']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Badge</th>
      <td>
        <input type="text" name="inputBadge" class="form-control form-control-sm mb-1" placeholder="Badge" value="<?php echo $tabel['badge']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Tanggal Masuk Bekerja</th>
      <td>
        <input type="date" name="inputTglMskKerja" disabled value="<?php echo $tabel['tgl_masukkerja']; ?>" class="form-control form-control-sm mb-1" required>
      </td>
    </tr>
    <tr>
      <th scope="row">Status</th>
      <td>
        <input type="text" name="inputStatus" class="form-control form-control-sm mb-1" placeholder="Status" value="<?php echo $tabel['status']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>
    <tr>
      <th scope="row">NIK</th>
      <td>
        <input type="text" name="inputNIK" class="form-control form-control-sm mb-1" placeholder="" value="<?php echo $tabel['nik']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Jenis Kelamin</th>
      <td>
        <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio1" value="Pria" required <?php if($tabel['jenis_kelamin'] == "Pria"){echo "checked";}; ?> disabled>
            <label class="form-check-label" for="inlineRadio1">Pria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio2" value="Wanita" required <?php if($tabel['jenis_kelamin'] == "Wanita"){echo "checked";}; ?> disabled>
            <label class="form-check-label" for="inlineRadio2">Wanita</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Tempat, Tanggal Lahir</th>
      <td>
        <input type="text" name="inputTtl" class="form-control form-control-sm mb-1" placeholder="Tempat, Tanggal Lahir" value="<?php echo $tabel['ttl']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Nomor Ponsel</th>
      <td>
        <input type="text" name="inputHP" class="form-control form-control-sm mb-1" placeholder="Nomor Ponsel" value="<?php echo $tabel['no_hp']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>
        <textarea name="inputAlamat" class="form-control form-control-sm mb-1" placeholder="Alamat Lengkap" row="3" disabled required autofocus><?php echo $tabel['alamat']; ?></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">Agama</th>
      <td>
        <input type="text" name="inputAgama" class="form-control form-control-sm mb-1" placeholder="Agama" value="<?php echo $tabel['agama']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Status Pernikahan</th>
      <td>
      <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="statusnikah" id="inlineRadio1" value="Lajang" required <?php if($tabel['status_nikah'] == "Lajang"){echo "checked";}; ?> disabled>
            <label class="form-check-label" for="inlineRadio1">Lajang</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="inlineRadio2" value="Menikah" required <?php if($tabel['status_nikah'] == "Menikah"){echo "checked";}; ?> disabled>
            <label class="form-check-label" for="inlineRadio2">Menikah</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="inlineRadio3" value="Menikah" required <?php if($tabel['status_nikah'] == "Janda"){echo "checked";}; ?> disabled>
            <label class="form-check-label" for="inlineRadio3">Janda</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Pendidikan Terakhir</th>
      <td>
        <input type="text" name="inputPendidikan" class="form-control form-control-sm" placeholder="Pendidikan Terakhir" value="<?php echo $tabel['pendidikan']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
        <th scope="row">
        </th>
        <td>
            <a href="ubahkaryawan.php?id=<?php echo $tabel['id_karyawan']; ?>" class="btn btn-primary mt-2 mr-2"><i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
            <a href="tambahsp.php?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari=" class="btn btn-warning mt-2 mr-2"><i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Beri SP</a>
            <a href="ubahkaryawan.php?id=<?php echo $tabel['id_karyawan']; ?>" data-toggle="modal" data-target="#modalDelKonfirmasi" class="btn btn-danger mt-2 mr-2"><i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus Karyawan</a>
            
        </td>
        <td></td>
    </tr>

    <!-- modal delete -->
      <div class="modal fade" id="modalDelKonfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
            Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.
          </div>
          <div class="modal-footer">
            <button type="submit" name="Hapus" id="btnTambah" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>   
  <!-- end modal -->

  </tbody>
  </form>
</table>

<?php
  if(isset($_POST['Hapus'])){
    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_masterkaryawan WHERE id_karyawan=$id");
    if($queryhapus){
      $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan WHERE id=$id");

      if ($queryhapus2) {
        echo "<script>alert('Data Karyawan berhasil dihapus!')</script>";
        echo "<script>location='index.php'</script>";
        
      } else {
          var_dump($queryhapus2);
      }
    } else {
        var_dump($queryhapus);echo "query1";
    }
  }
?>

                            </div> <!-- end card body -->
                        </div>
                    </div>


                </main>
                
<?php include "footer.php" ?>