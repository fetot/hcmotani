<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Human Capital Management Otani
                <?php echo date("Y");?></div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js">
$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})

$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript" src="assets/datatables.js"></script>
<script type="text/javascript" src="js/datatables.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript" src="assets/chart/Chart.js"></script>
<script>
// Set new default font family and font color to mimic Bootstrap's default
// styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",' +
    'Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("chartJumlahKaryawanBaru");
var myLineChart = new Chart(ctx, {
type: 'line',
data: {
    labels: [
        "<?php $tahun = date(" Y ",strtotime(" - 5 year ")); echo $tahun; ?>",
        "<?php $tahun = date(" Y ",strtotime(" - 4 year ")); echo $tahun; ?>",
        "<?php $tahun = date(" Y ",strtotime(" - 3 year ")); echo $tahun; ?>",
        "<?php $tahun = date(" Y ",strtotime(" - 2 year ")); echo $tahun; ?>",
        "<?php $tahun = date(" Y ",strtotime(" - 1 year ")); echo $tahun; ?>",
        "<?php $tahun = date(" Y "); echo $tahun; ?>"
    ],
    datasets: [
        {
            label: "Jumlah",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: [
                <?php 
                    $tahun = date("Y",strtotime("-5 year"));
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_masterkaryawan WHERE YEAR(tgl_masukkerja) = $tahun");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
                    $tahun = date("Y",strtotime("-4 year"));
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_masterkaryawan WHERE YEAR(tgl_masukkerja) = $tahun");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
                    $tahun = date("Y",strtotime("-3 year"));
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_masterkaryawan WHERE YEAR(tgl_masukkerja) = $tahun");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
                    $tahun = date("Y",strtotime("-2 year"));
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_masterkaryawan WHERE YEAR(tgl_masukkerja) = $tahun");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
                    $tahun = date("Y",strtotime("-1 year"));
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_masterkaryawan WHERE YEAR(tgl_masukkerja) = $tahun");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
                    $tahun = date("Y");
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_masterkaryawan WHERE YEAR(tgl_masukkerja) = $tahun");
                    echo mysqli_num_rows($satu);
				?>
            ]
        }
    ]
},
options: {
    scales: {
        xAxes: [
            {
                time: {
                    unit: 'year'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 12
                }
            }
        ],
        yAxes: [
            {
                ticks: {
                    min: 0,
                    max: 50,
                    maxTicksLimit: 10
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)"
                }
            }
        ]
    },
    legend: {
        display: false
    }
}
});
</script>
<?php $tahunini = date('Y'); ?>
<script>
// Set new default font family and font color to mimic Bootstrap's default
// styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",' +
    'Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("chartJumlahKaryawanResign");
var myLineChart = new Chart(ctx, {
type: 'bar',
data: {
    labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep",
        "Okt",
        "Nop",
        "Des"
    ],
    datasets: [
        {
            label: "Jumlah",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 1");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 2");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 3");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 4");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 5");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 6");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 7");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 8");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 9");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 10");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 11");
                    echo mysqli_num_rows($satu);
				?>,
                <?php 
					$satu = mysqli_query($koneksi, "SELECT * FROM tbl_resign WHERE YEAR(tgl_resign) = $tahunini AND MONTH(tgl_resign) = 12");
                    echo mysqli_num_rows($satu);
				?>
            ]
        }
    ]
},
options: {
    scales: {
        xAxes: [
            {
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 12
                }
            }
        ],
        yAxes: [
            {
                ticks: {
                    min: 0,
                    max: 30,
                    maxTicksLimit: 5
                },
                gridLines: {
                    display: true
                }
            }
        ]
    },
    legend: {
        display: false
    }
}
});
</script>
<!-- Optional JavaScript -->
<!-- <script> setTimeout(function() { window.location.href="logout.php";
alert('Anda terlalu lama diam. Silahkan login kembali!') }, 30000); </script>
-->

<script type="text/javascript">
function copy_text() {
/* Get the text field */
var copyText = document.getElementById("idkaryawan");

/* Select the text field */
copyText.select();
copyText.setSelectionRange(0, 99999);/*For mobile devices*/

/* Copy the text inside the text field */
document.execCommand("copy");

/* Alert the copied text */
alert("ID Karyawan berhasil dicopy: " + copyText.value);
}
</script>
</body>
</html>