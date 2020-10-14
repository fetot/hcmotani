<?php 
    include "uiheader.php";
    $id = $_GET['id'];
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ubah Password</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-lock mr-1"></i>
                Ubah Password
            </div>
            <div class="card-body">

                <form method="post" action="ubahpassword?id=<?php echo "$id"; ?>" name="form1">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Username</label>
                        <input
                            class="form-control py-4"
                            id="inputUsername"
                            name="inputUsername"
                            type="text"
                            aria-describedby="usernameHelp"
                            value="<?php print($_SESSION['username']['username']);?>"
                            disabled
                            />
                    </div>
                    <div class="form-row">
                    <div class="col">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password Lama</label>
                                <input
                                    class="form-control py-4"
                                    id="inputPasswordOld"
                                    name="inputPassOld"
                                    type="password"
                                    maxLength="16"
                                    required
                                    placeholder="Masukkan password lama"/>
                            </div>
                        </div>
                  </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password Baru</label>
                                <input
                                    class="form-control py-4"
                                    id="inputPassword"
                                    name="inputPassNew"
                                    type="password"
                                    maxLength="16"
                                    required
                                    placeholder="Masukkan password baru"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                    <div class="small text-danger ml-2">
                                        <?php 
                                            if(isset($_GET['p'])){
                                                if($_GET['p'] == "failed"){
                                                    echo "Password lama salah!";
                                                }
                                            }
                                        ?>
                                        </div>
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#modalKonfirmasi">Ubah Password</button>
                    </div>
                    

                    <div
                    class="modal fade"
                    id="modalKonfirmasi"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <i class="fas fa-exclamation-circle fa-fw mr-1 text-warning"></i>Konfirmasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin mengubah password?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <button type="submit" name="Submit" id="btnTambah" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->

                </form>

                

            <?php
    if(isset($_POST['Submit'])){
        $inputpassold = $_POST['inputPassOld'];
        $passold = $_SESSION['username']['password'];
        $passnew = $_POST['inputPassNew'];

        if($inputpassold == $passold){

          include_once("koneksi.php");
      
          $query1 = mysqli_query($koneksi, "UPDATE tbl_user SET password='$passnew',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id=$id");
          if ($query1) {
              echo "<script>alert('Password berhasil diubah! Silahkan login kembali.')</script>";
              echo "<script>location='logout'</script>";
          } else {
              var_dump($query1);echo "query1";
          }
        }else{
          echo "<script>alert('Password salah.')</script>";
          echo "<script>location='ubahpassword?id=$id&p=failed'</script>";
        }
        
    }
?>

            </div>
            <!-- end card body -->
        </div>
    </div>

</main>

<?php 
    include "footer.php" 
?>