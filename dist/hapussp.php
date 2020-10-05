<?php
  $id = $_GET['id'];

    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE id_karyawan=$id");
    if($queryhapus){
      echo "<script>alert('SP berhasil dihapus!')</script>";
      echo "<script>location='datasp.php'</script>";
    } else {
        var_dump($queryhapus);echo "query1";
    }
?>