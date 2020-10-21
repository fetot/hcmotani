<?php 
    include "uiheader.php";
    if(empty($_GET['id'])){
      $id = '1';
      echo "<script>alert('Silahkan pilih Data Karyawan Resign yang ingin diubah!')</script>";
      echo "<script>location='dataresign'</script>";
    }else{
      $id = $_GET['id'];
    }
?>

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Ubah Data</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                  <li class='breadcrumb-item'><a href='dataresign'>Tampil Data Resign</a></li>
                                  <li class='breadcrumb-item'><a href='detailres?id=<?php echo $id; ?>'>Info Karyawan Resign</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ubah Data Karyawan Resign</li>
                            </ol>
                        </nav>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user-edit mr-1"></i>
                                Karyawan Harlep (Sudah Resign)
                            </div>
                            <div class="card-body">

                            
                        <?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_infokaryawan_res WHERE tbl_infokaryawan_res.id_karyawan='$id'");
                            $tabel = $tampil -> fetch_assoc();
                        ?>


<table class="table table-sm table-borderless p-2">
  <tbody style="font-size: 0.9rem">
    <form method="post" action="ubahkaryawanres?id=<?php echo $id; ?>" name="form1">
    <tr>
      <th scope="row">Nama Lengkap</th>
      <td>
        <input type="text" id="inputNama" name="inputNama" class="form-control form-control-sm mb-1" value="<?php echo $tabel['nama']; ?>" placeholder="Nama Lengkap" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" id="inputBagian" name="inputBagian" class="form-control form-control-sm mb-1" value="<?php echo $tabel['bagian']; ?>" placeholder="Bagian" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Badge</th>
      <td>
        <input type="text" id="inputBadge" name="inputBadge" class="form-control form-control-sm mb-1" value="<?php echo $tabel['badge']; ?>" placeholder="Badge" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Tanggal Masuk Bekerja</th>
      <td>
        <input type="date" id="inputTglMskKerja" name="inputTglMskKerja" class="form-control form-control-sm mb-1" value="<?php echo date("Y-m-d", strtotime($tabel['tgl_masukkerja'])); ?>" required disabled>
      </td>
    </tr>
    
    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <tr>
      <th scope="row">NIK</th>
      <td>
        <input type="text" id="inputNIK" name="inputNIK" class="form-control form-control-sm mb-1" value="<?php echo $tabel['nik']; ?>" placeholder="NIK" autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Jenis Kelamin</th>
      <td>
        <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio1" value="Pria" <?php if($tabel['jenis_kelamin'] == "Pria"){echo "checked";}; ?> required>
            <label class="form-check-label" for="inlineRadio1">Pria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio2" value="Wanita" <?php if($tabel['jenis_kelamin'] == "Wanita"){echo "checked";}; ?> required>
            <label class="form-check-label" for="inlineRadio2">Wanita</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Tempat, Tanggal Lahir</th>
      <td>
        <input type="text" id="inputTtl" name="inputTtl" class="form-control form-control-sm mb-1" placeholder="Tempat, Tanggal Lahir" value="<?php echo $tabel['ttl']; ?>" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Nomor Ponsel</th>
      <td>
        <input type="tel" id="inputHP" name="inputHP" class="form-control form-control-sm mb-1" placeholder="Nomor Ponsel" value="<?php echo $tabel['no_hp']; ?>" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>
        <textarea id="inputAlamat" name="inputAlamat" class="form-control form-control-sm mb-1" placeholder="Alamat Lengkap" row="3" required autofocus><?php echo $tabel['alamat']; ?></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">Agama</th>
      <td>
        <select id="inputAgama" name="inputAgama" class="form-control form-control-sm mb-1" required autofocus>
            <option value="Islam" <?php if ($tabel['agama'] == 'Islam'){echo "selected";}; ?>>Islam</option>
            <option value="Kristen" <?php if ($tabel['agama'] == 'Kristen'){echo "selected";}; ?>>Kristen</option>
            <option value="Katolik" <?php if ($tabel['agama'] == 'Katolik'){echo "selected";}; ?>>Katolik</option>
            <option value="Buddha" <?php if ($tabel['agama'] == 'Buddha'){echo "selected";}; ?>>Buddha</option>
            <option value="Hindu" <?php if ($tabel['agama'] == 'Hindu'){echo "selected";}; ?>>Hindu</option>
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row">Status Pernikahan</th>
      <td>
      <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah1" value="Lajang" required <?php if($tabel['status_nikah'] == "Lajang"){echo "checked";}; ?>>
            <label class="form-check-label" for="sttsnikah1">Lajang</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah2" value="Menikah" required <?php if($tabel['status_nikah'] == "Menikah"){echo "checked";}; ?>>
            <label class="form-check-label" for="sttsnikah2">Menikah</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah3" value="Menikah" required <?php if($tabel['status_nikah'] == "Janda"){echo "checked";}; ?>>
            <label class="form-check-label" for="sttsnikah3">Janda</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Pendidikan Terakhir</th>
      <td>
        <input type="text" value="<?php echo $tabel['pendidikan']; ?>" id="inputPendidikan" name="inputPendidikan" class="form-control form-control-sm" placeholder="Pendidikan Terakhir" required autofocus>
      </td>
    </tr>
    <tr>
        <th scope="row">
        </th>
        <td>
          <a class="btn btn-outline-secondary mt-3" type="button" href="detailres?id=<?php echo $id ?>">Batal</a>
          <button class="btn btn-primary mt-3 ml-2" type="button" data-toggle="modal" data-target="#modalKonfirmasi">Ubah</button>
        </td>
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
        $nik = $_POST['inputNIK'];
        $jeniskelamin = $_POST['jeniskelamin'];
        $ttl = $_POST['inputTtl'];
        $nohp = $_POST['inputHP'];
        $alamat = $_POST['inputAlamat'];
        $agama = $_POST['inputAgama'];
        $statusnikah = $_POST['statusnikah'];
        $pendidikan = $_POST['inputPendidikan'];
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "UPDATE tbl_infokaryawan_res SET jenis_kelamin='$jeniskelamin',ttl='$ttl',alamat='$alamat',agama='$agama',status_nikah='$statusnikah',no_hp='$nohp',pendidikan='$pendidikan',nik='$nik',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$id");
        if ($query1) {
              echo "<script>alert('Data Karyawan Resign berhasil diubah!')</script>";
              echo "<script>location='detailres?id=$id'</script>";
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