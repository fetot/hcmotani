<?php
if(empty($_GET['id'])){
  echo "<script>alert('Silahkan pilih Data Hubungan Keluarga yang ingin dihapus!')</script>";
  echo "<script>location='datahubkel'</script>";

  }else{
  $id = $_GET['id'];

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