<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>401 Akses ditolak - HCM Otani</title>
        <link href="dist/css/styles.css" rel="stylesheet" />
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="icon" href="dist/assets/img/favicon.ico" type="image/png" sizes="16x16">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    </head>
    <body>
    <script>
        setTimeout(function () {
        window.location.href= 'dist/login?p=belum_login'; // the redirect goes here

        },3500); //duration
    </script>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <h1 class="display-1">401</h1>
                                    <img class="mb-2 img-error" src="/hcmotani/dist/assets/img/401.png" />
                                    <p class="lead">Tidak memiliki akses</p>
                                    <p>Akses ditolak, silahkan login terlebih dahulu.</p>
                                    <a href="dist/login">
                                        <i class="fas fa-arrow-left mr-1"></i>
                                        Kembali ke halaman Login.
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Human Capital Management Otani <?php echo date("Y");?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="dist/assets/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="dist/js/scripts.js"></script>
    </body>
</html>
