<?php
    include "koneksi.php";
    session_start();
    if(isset($_SESSION['username'])){
        echo "<script>location='index'</script>";
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HCM Otani - Masuk</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" href="assets/img/favicon.ico" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/font/css/fontawesome-all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><i class="fas fa-user-tie fa-fw mr-1"></i>HCM Otani</h3></div>
                                    <div class="card-body">
                                        <form name="form1" method="post" action="cek_login.php">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" name="username" id="inputEmailAddress" type="text" placeholder="Masukkan username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Masukkan password" />
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <input type="submit" class="btn btn-block btn-primary" value="Masuk">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- pesan notif -->
                                    <div class="card-footer text-center">
                                        <div class="small">
                                        <?php 
                                            if(isset($_GET['pesan'])){
                                                if($_GET['pesan'] == "gagal"){
                                                    echo "Username atau Password salah!";
                                                }else if($_GET['pesan'] == "logout"){
                                                    echo "Anda telah berhasil keluar.";
                                                }else if($_GET['pesan'] == "belum_login"){
                                                    echo "Anda harus masuk terlebih dahulu.";
                                                }
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Human Capital Management Otani <?php echo date("Y");?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
