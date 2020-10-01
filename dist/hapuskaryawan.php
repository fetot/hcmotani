<?php
  $id = $_GET['id'];

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
?>