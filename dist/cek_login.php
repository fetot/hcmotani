<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from tbl_user where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$username = $data -> fetch_assoc();
	$_SESSION['username'] = $username; 
	$_SESSION['status'] = "login";

	//otomasi update status karyawan ketika admin login (semi-realtime)
	//jika tanggal akhir cuti < tanggal hari ini maka status karyawan menjadi Aktif
	$cuti = mysqli_query($koneksi,"SELECT * from tbl_cuti JOIN tbl_masterkaryawan ON tbl_cuti.id_karyawan = tbl_masterkaryawan.id_karyawan");
	while($tblcuti = $cuti -> fetch_assoc()){
		$hariini= date("Y-m-d");
		$akhircuti = $tblcuti['tgl_akhircuti'];
		$hariini_time = strtotime($hariini);
		$akhircuti_time = strtotime($akhircuti);
		$id = $tblcuti['id_karyawan'];
		
		if($akhircuti_time < $hariini_time){
			$updatestatus = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET status='Aktif',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$id");
		}
	}

	header("location:index");
}else{
	header("location:login?p=gagal");
}
?>