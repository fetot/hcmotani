<?php 
  include "uiheader.php";
  if(empty($_GET['id'])){
    $no = '1';
    echo "<script>alert('Silahkan pilih Data SP yang ingin diubah!')</script>";
    echo "<script>location='datasp'</script>";
  }else{
    $no = $_GET['id'];
  }

?>

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Ubah Data</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="dataresign">Tampil Data Resign</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ubah Data Resign</li>
                            </ol>
                        </nav>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1"></i>
                                Data Resign
                            </div>
                            <div class="card-body">

                            
                        <?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_resign, tbl_infokaryawan_res WHERE tbl_infokaryawan_res.id_karyawan = tbl_resign.id_karyawan AND tbl_resign.no='$no'");
                            $tabel = $tampil -> fetch_assoc();
                            $idkaryawan = $tabel['id_karyawan'];
                        ?>


<table class="table table-sm table-borderless p-2">
<form method="post" action="ubahresign?id=<?php echo $no; ?>" name="form1">
  <tbody style="font-size: 0.9rem">
  
  <tr>
      <th scope="row">ID Karyawan</th>
      <td>
          <input type="text" id="inputID" name="inputID" class="form-control form-control-sm mb-1" placeholder="ID Karyawan" value="<?php echo $idkaryawan; ?>" autocomplete="off" required disabled>
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
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <tr>
      <th scope="row">Tanggal Resign</th>
      <td>
        <input type="date" id="inputTglResign" name="inputTglResign" class="form-control form-control-sm mb-1" required value="<?php echo $tabel['tgl_resign']; ?>">
      </td>
    </tr>

    <tr>
      <th scope="row">Alasan Resign</th>
      <td>
        <textarea id="inputAlasan" name="inputAlasan" class="form-control form-control-sm mb-1" placeholder="Alasan Resign" row="3" required autofocus><?php echo $tabel['alasan']; ?></textarea>
      </td>
    </tr>

    <tr>
        <th scope="row">
        </th>
        <td>
          <a class="btn btn-outline-secondary mt-3" type="button" href="dataresign">Batal</a>
          <button class="btn btn-primary mt-3 ml-2" type="button" data-toggle="modal" data-target="#modalKonfirmasi"><i class="fas fa-edit fa-fw mr-1"></i>Ubah</button>
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
        $tglresign = $_POST['inputTglResign'];
        $alasan = $_POST['inputAlasan'];
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "UPDATE tbl_resign SET tgl_resign='$tglresign',alasan='$alasan',terakhirdiubah=CURRENT_TIMESTAMP() WHERE no=$no");

        if($query1){
            echo "<script>alert('Data Resign berhasil diubah!')</script>";
            echo "<script>location='dataresign'</script>";
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