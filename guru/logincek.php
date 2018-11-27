<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM guru WHERE username='$user' AND password='$pass' AND aktif='Y'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['idgkasis'] 		= $b['nip'];
	$_SESSION['usergkasis']		= $b['username'];
	$_SESSION['namagkasis']		= $b['nama'];
	$_SESSION['emailgkasis'] 	= $b['email'];
	$_SESSION['mengajargkasis'] = $b['mengajar'];
	if($b['foto']==""){
		$_SESSION['fotogkasis'] = "0.jpg";
	}else{
		$_SESSION['fotogkasis'] = $b['foto'];
	}
	header('location: index.php?m=awal');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
?>
