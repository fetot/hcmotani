<?php 
    include "uiheader.php";
?>

<main>
    <div class="container-fluid">
        <div class="row mt-4 align-items-center">
            <h1 class="col-md-3">Dashboard</h1>
            <div class="btn-toolbar col-md-3 offset-md-6 justify-content-end">
                <!-- <div class="text-secondary"><?php echo date('M Y'); ?></div> -->

            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-primary text-primary mb-4">
                                    <div class="text-center card-body align-items-center justify-content-center">
                                        <h1 class="font-weight-bolder">
                                        <?php 
                                                $dataharlep = $koneksi -> query("SELECT * FROM tbl_masterkaryawan");
                                                $jlhharlep = mysqli_num_rows($dataharlep);
                                                echo $jlhharlep;
                                        ?>
                                        </h1>
                                        <div class="small">Total Karyawan Harlep</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-primary stretched-link" href="datakaryawan">Lihat data</a>
                                        <div class="small text-primary"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-info text-info mb-4">
                                    <div class="text-center card-body align-items-center justify-content-center">
                                    
                                        <h1 class="font-weight-bolder"><?php 
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_cuti");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?></h1>
                                        <div class="small">Total Izin Cuti</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-info stretched-link" href="datacuti">Lihat data</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card border-warning text-warning mb-4">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                    
                                    <h1 class="font-weight-bolder"><?php 
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_sp");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?></h1>
                                        <div class="small">Total Surat Peringatan</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-warning stretched-link" href="datasp">Lihat data</a>
                                        <div class="small text-warning"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card border-danger text-danger mb-4">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                    
                                    <h1 class="font-weight-bolder"><?php 
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_resign");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?></h1>
                                        <div class="small">Total Karyawan Resign</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-danger stretched-link" href="dataresign">Lihat data</a>
                                        <div class="small text-danger"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>
</main>

<?php 
    include "footer.php";
?>