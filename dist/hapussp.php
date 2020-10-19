<?php
if(empty($_GET['id'])){
  echo "<script>alert('Silahkan pilih Data SP yang ingin dihapus!')</script>";
  echo "<script>location='datasp'</script>";

  }else{
  $id = $_GET['id'];

    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE no=$id");
    if($queryhapus){
      echo "<script>alert('SP berhasil dihapus!')</script>";
      echo "<script>location='datasp'</script>";
    } else {
        var_dump($queryhapus);echo "query1";
    }
  }
?>