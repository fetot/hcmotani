<?php
  $id = $_GET['id'];

    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_resign WHERE id_karyawan=$id");
    if($queryhapus){
      echo "<script>alert('Data Resign berhasil dihapus!')</script>";
      echo "<script>location='dataresign'</script>";
    } else {
        var_dump($queryhapus);echo "query1";
    }
?>