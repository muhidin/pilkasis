<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM siswa WHERE username='$user' AND password='$pass' AND aktif='Y'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['idskasis'] 		= $b['nis'];
	$_SESSION['userskasis']		= $b['username'];
	$_SESSION['namaskasis']		= $b['nama'];
	$_SESSION['emailskasis'] 	= $b['email'];
	if($b['foto']==""){
		$_SESSION['fotoskasis'] = "0.jpg";
	}else{
		$_SESSION['fotoskasis'] = $b['foto'];
	}
	$idkelas=$b['idkelas'];
	$sql2 = "SELECT * FROM kelas WHERE idkelas='$idkelas'";
	$aksi=mysqli_query($koneksi,$sql2);
	$c=mysqli_fetch_array($aksi);
	$_SESSION['kelasskasis'] 	= $c['kelas'];
	header('location: index.php?m=awal');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
?>
