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
                        <h1 class="mt-4">Ubah Data</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="datacuti">Tampil Data Cuti</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ubah Data Cuti</li>
                            </ol>
                        </nav>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1"></i>
                                Izin Cuti
                            </div>
                            <div class="card-body">

                            
                        <?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_cuti WHERE tbl_cuti.id_karyawan='$keyword'");
                            $tabel = $tampil -> fetch_assoc();
                            $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$keyword'");
                            $tabel2 = $tampil2 -> fetch_assoc();
                        ?>


<table class="table table-sm table-borderless p-2">
<form method="post" action="ubahcuti?inputID=<?php echo $keyword; ?>" name="form1">
  <tbody style="font-size: 0.9rem">
  
  <tr>
      <th scope="row">ID Karyawan</th>
      <td>
          <input type="text" id="inputID" name="inputID" class="form-control form-control-sm mb-1" placeholder="ID Karyawan" value="<?php echo $tabel['id_karyawan']; ?>" autocomplete="off" required disabled>
      </td>
    </tr>

    <tr>
      <th scope="row">Nama Lengkap</th>
      <td>
        <input type="text" name="inputNama" class="form-control form-control-sm mb-1" placeholder="Nama Lengkap" value="<?php echo $tabel2['nama']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" name="inputBagian" class="form-control form-control-sm mb-1" placeholder="Bagian" value="<?php echo $tabel2['bagian']; ?>" required autofocus disabled>
      </td>
    </tr>

    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <tr>
      <th scope="row">Tanggal Izin Cuti</th>
      <td>
        <input type="date" id="inputTglIzinCuti" name="inputTglIzinCuti" class="form-control form-control-sm mb-1" required value="<?php echo $tabel['tgl_izincuti']; ?>">
      </td>
    </tr>

    <tr>
      <th scope="row">Tanggal Akhir Cuti</th>
      <td>
        <input type="date" id="inputTglAkhirCuti" name="inputTglAkhirCuti" class="form-control form-control-sm mb-1" required value="<?php echo $tabel['tgl_akhircuti']; ?>">
      </td>
    </tr>

    <tr>
      <th scope="row">Alasan</th>
      <td>
        <textarea id="inputAlasan" name="inputAlasan" class="form-control form-control-sm mb-1" placeholder="Alasan Cuti" row="3" required autofocus><?php echo $tabel['alasan']; ?></textarea>
      </td>
    </tr>

    <tr>
        <th scope="row">
        </th>
        <td>
            <a class="btn btn-outline-secondary mt-3" type="button" href="datacuti">Batal</a>
            <button class="btn btn-primary mt-3 ml-2" type="button" data-toggle="modal" data-target="#modalKonfirmasi"><i class="fas fa-edit fa-fw mr-1"></i>Ubah Cuti</button>
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
        $tglcuti = $_POST['inputTglIzinCuti'];
        $tglakhir = $_POST['inputTglAkhirCuti'];
        $alasan = $_POST['inputAlasan'];

        $hariini = date('Y-m-d');
        $hariini_time = strtotime($hariini);
        $akhircuti_time = strtotime($tglakhir);
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "UPDATE tbl_cuti SET tgl_izincuti='$tglcuti',tgl_akhircuti='$tglakhir',alasan='$alasan',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$keyword");

        if($query1){
            echo "<script>alert('Data Cuti berhasil diubah!')</script>";
            echo "<script>location='datacuti'</script>";

            //jika tanggal akhir cuti > tanggal hari ini maka status karyawan menjadi cuti
            if($akhircuti_time > $hariini_time){
              $query2 = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET status='Cuti',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$keyword");
          }else{
            $query2 = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET status='Aktif',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$keyword");
          }
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