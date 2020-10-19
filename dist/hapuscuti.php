<?php
  if(empty($_GET['id'])){
    echo "<script>alert('Silahkan pilih Data Cuti yang ingin dihapus!')</script>";
    echo "<script>location='datacuti'</script>";
  
    }else{
      $id = $_GET['id'];

    include_once("koneksi.php");

    $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE no=$id");
    if($queryhapus){
      echo "<script>alert('Data Cuti berhasil dihapus!')</script>";
      echo "<script>location='datacuti'</script>";
    } else {
        var_dump($queryhapus);echo "query1";
    }
    }
?>