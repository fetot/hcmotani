<?php
  $id = $_GET['id'];

    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id_karyawan=$id");
    if($queryhapus){
      echo "<script>alert('Data Hubungan Keluarga berhasil dihapus!')</script>";
      echo "<script>location='datahubkel'</script>";
    } else {
        var_dump($queryhapus);echo "query1";
    }
?>