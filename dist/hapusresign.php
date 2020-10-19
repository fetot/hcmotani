<?php
if(empty($_GET['id'])){
  echo "<script>alert('Silahkan pilih Data Resign yang ingin dihapus!')</script>";
  echo "<script>location='dataresign'</script>";

  }else{
  $id = $_GET['id'];

    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_resign WHERE no=$id");
    if($queryhapus){
      echo "<script>alert('Data Resign berhasil dihapus!')</script>";
      echo "<script>location='dataresign'</script>";
    } else {
        var_dump($queryhapus);echo "query1";
    }
  }
?>